<?php

namespace App\Http\Controllers\Owner;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller; // tambah ini buat yg folder per role

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('customer.products', [
            "TabTitle" => "Produk Lisahwan",
            "pageTitle" => '<mark class="px-2 text-yellow-500 bg-gray-800 rounded dark:bg-gray-800">Produk</mark> Kami',
            'pageDescription' => 'Jelajahi camilan terbaik di <span class="underline underline-offset-2 decoration-4 decoration-yellow-500">Lisahwan</span> dan pilih favorit Anda sekarang!',
            "active_2" => "text-white rounded md:bg-transparent md:text-yellow-500 md:p-0 md:dark:text-yellow-500",
            "products" => Product::all(),
        ]);
    }

    public function admin_products(Request $request)
    {
        $search = $request->input('search');

        $products = Product::when($search, function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('price', 'like', '%' . $search . '%')
                ->orWhere('weight', 'like', '%' . $search . '%')
                ->orWhere('stock', 'like', '%' . $search . '%')
                ->orWhere('discount', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhereHas('testimony', function ($query) use ($search) {
                    $query->where('rating', 'like', '%' . $search . '%');
                });
        })->paginate(10)->withQueryString();

        // Fetch user cart details
        $cart_user = Cart::where('user_id', Auth::user()->id)->first();
        $carts = $cart_user ? $cart_user->cart_detail : null;

        return view('admin.products', [
            "TabTitle" => "Daftar Seluruh Produk",
            "active_3" => "text-yellow-500",
            "products" => $products,
            "carts" => $carts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:products|max:30',
            'price' => 'required|numeric|min:1000',
            'stock' => 'required|numeric|min:1',
            'weight' => 'required|numeric|min:1',
            'discount' => 'required|numeric|between:0,100',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'special_status' => 'required|string'
        ], [
            'name.required' => 'Nama produk wajib diisi!',
            'name.string' => 'Nama produk wajib berupa karakter!',
            'name.unique' => 'Nama produk wajib berbeda dari produk yang sudah ada!',
            'name.max' => 'Nama produk maksimal 30 karakter!',
            'price.required' => 'Harga wajib diisi!',
            'price.numeric' => 'Harga wajib berupa angka!',
            'price.min' => 'Harga minimal Rp. 1.000!',
            'stock.required' => 'Stok wajib diisi!',
            'stock.numeric' => 'Stok wajib berupa angka!',
            'stock.min' => 'Stock minimal 1 buah!',
            'weight.required' => 'Berat wajib diisi!',
            'weight.numeric' => 'Berat wajib berupa angka!',
            'weight.min' => 'Berat minimal 1 gram!',
            'discount.required' => 'Diskon diisi!',
            'discount.numeric' => 'Diskon berupa angka!',
            'discount.between' => 'Diskon wajib berada dalam rentang 0 sampai 100!',
            'description.required' => 'Deskripsi wajib diisi!',
            'description.string' => 'Deskripsi wajib berupa karakter!',
            'description.max' => 'Deskripsi maksimal 255 karakter!',
            'image.required' => 'Gambar produk wajib diisi!',
            'image.image' => 'File wajib berupa gambar!',
            'image.mimes' => 'File gambar wajib berupa .jpeg, .jpg, .png!',
            'image.max' => 'Maksimal ukuran gambar 5MB!',
            'special_status.required' => 'Status spesial wajib diisi!',
            'special_status.string' => 'Status spesial wajib berupa karakter!'
        ]);

        // cek apakah ada inputan file berupa image, kalau ada file image dimasukkan ke folder image di public lalu pathnya masuk ke database
        if ($request->file('image')) {

            $validatedData['image'] = $request->file('image')->store('upload_images', ['disk' => 'public']);
            // disk public ini untuk membuat folder upload_images di folder storage/app/public
            // function store ini akan memasukkan gambar ke dalam storage/public/nama_folder_image
            // dengan nama file yang sudah merupakan string random sehingga memungkinkan kita untuk
            // memasukkan file gambar dengan nama yang sama tapii beda gambar.

            $product = Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'stock' => $validatedData['stock'],
                'weight' => $validatedData['weight'],
                'discount' => $validatedData['discount'],
                'image' => $validatedData['image'],
                'special_status' => $validatedData['special_status'],
            ]);

            Production::create([
                'date' => now(),
                'product_id' => $product->id,
                'quantity' => $validatedData['stock'],
                'type' => 'tambah'
            ]);
        } else {
            $product = Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'price' => $validatedData['price'],
                'stock' => $validatedData['stock'],
                'weight' => $validatedData['weight'],
                'discount' => $validatedData['discount'],
                'special_status' => $validatedData['special_status'],
            ]);

            Production::create([
                'date' => now(),
                'product_id' => $product->id,
                'quantity' => $validatedData['stock'],
                'type' => 'tambah'
            ]);
        }

        return redirect()->route('owner.admin_products')->with('addProduct_success', "{$product->name} berhasil ditambahkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('customer.orderdetail', [
            "TabTitle" => $product->name,
            // "active_2" => "text-white rounded md:bg-transparent md:text-yellow-500 md:p-0 md:dark:text-yellow-500",
            "product" => $product,
        ]);
    }

    public function detail($id) // show buat for admin
    {
        $productDetail = Product::where('id', $id)->first();

        // Mengambil total quantity dari tabel Production yang diinput hari ini dan bertipe restock
        $total_addProduct_today = Production::where('type', 'restock')
            ->whereDate('created_at', Carbon::today())
            ->where('product_id', $id)
            ->sum('quantity');

        // jumlah produk yang terjual hari ini
        $total_quantity_today = Production::whereDate('created_at', Carbon::today())
            ->where('product_id', $id)
            ->selectRaw('SUM(CASE WHEN type = "tambah" THEN quantity ELSE 0 END) as total_add')
            ->selectRaw('SUM(CASE WHEN type = "kurang" THEN quantity ELSE 0 END) as total_subtract')
            ->first();
        $total_quantity_today = $total_quantity_today->total_add - $total_quantity_today->total_subtract;

        // Mengambil record restock pertama kali hari ini berdasarkan created_at
        $first_restock = Production::where('type', 'restock')
            ->whereDate('created_at', Carbon::today())
            ->where('product_id', $id)
            ->orderBy('created_at', 'asc')
            ->first();
        $differenceQuantity_addProduct = 0;
        if ($first_restock) {
            // Menghitung jumlah produksi berdasarkan created_at setelah restock pertama kali
            $differenceQuantity = Production::where('created_at', '>', $first_restock->created_at)
                ->where('product_id', $id)
                ->selectRaw('SUM(CASE WHEN type = "tambah" THEN quantity ELSE 0 END) as total_add')
                ->selectRaw('SUM(CASE WHEN type = "kurang" THEN quantity ELSE 0 END) as total_subtract')
                ->first();
            $differenceQuantity_addProduct = $differenceQuantity->total_add - $differenceQuantity->total_subtract;
        }
        // Menghitung total difference
        $total_difference = $total_addProduct_today - abs($differenceQuantity_addProduct);

        return view('admin.production_detail', [
            "active_3" => "text-yellow-500",
            "productDetail" => $productDetail,
            "total_addProduct_today" => $total_addProduct_today,
            "total_quantity_today" => abs($total_quantity_today),
            "total_difference" => $total_difference,
        ]);
    }

    public function addStock(Request $request, $id)
    {
        $validatedData = $request->validate([
            'stock' => 'required|numeric',
        ]);

        $validatedData = $request->validate([
            'stock' => 'required|numeric|min:1',
        ], [
            'stock.required' => 'Jumlah stok wajib diisi!',
            'stock.numeric' => 'Jumlah stok wajib berupa angka!',
            'stock.min' => 'Jumlah stok minimal 1!',
        ]);

        $product = Product::find($id);

        $product->update([
            'stock' => $product->stock + $validatedData['stock'],
        ]);

        Production::create([
            'date' => now(),
            'product_id' => $product->id,
            'quantity' => $validatedData['stock'],
            'type' => 'restock'
        ]);

        return redirect()->route('owner.admin_products.detail', $product)->with('addStock_success', "Stok berhasil berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Product $product)
    // {
    //     $productEdit = Product::where('id', $product->id)->first();

    //     return view('admin.update_product', compact('productEdit'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name_edit' => 'required|string|max:30',
            'price_edit' => 'required|numeric|min:1000',
            'weight_edit' => 'required|numeric|min:1',
            'discount_edit' => 'required|numeric|between:0,100',
            'description_edit' => 'required|string|max:255',
            'special_status' => 'required|string'
        ], [
            'name_edit.required' => 'Nama produk wajib diisi!',
            'name_edit.string' => 'Nama produk wajib berupa karakter!',
            'name_edit.max' => 'Nama produk maksimal 30 karakter!',
            'price_edit.required' => 'Harga wajib diisi!',
            'price_edit.numeric' => 'Harga wajib berupa angka!',
            'price_edit.min' => 'Harga minimal Rp. 1.000!',
            'weight_edit.required' => 'Berat wajib diisi!',
            'weight_edit.numeric' => 'Berat wajib berupa angka!',
            'weight_edit.min' => 'Berat minimal 1 gram!',
            'discount_edit.required' => 'Diskon diisi!',
            'discount_edit.numeric' => 'Diskon berupa angka!',
            'discount_edit.between' => 'Diskon wajib berada dalam rentang 0 sampai 100!',
            'description_edit.required' => 'Deskripsi wajib diisi!',
            'description_edit.string' => 'Deskripsi wajib berupa karakter!',
            'description_edit.max' => 'Deskripsi maksimal 255 karakter!',
            'special_status.required' => 'Status spesial wajib diisi!',
            'special_status.string' => 'Status spesial wajib berupa karakter!'
        ]);

        $product = Product::find($id);

        $product->update([
            'name' => $validatedData['name_edit'],
            'description' => $validatedData['description_edit'],
            'price' => $validatedData['price_edit'],
            'weight' => $validatedData['weight_edit'],
            'discount' => $validatedData['discount_edit'],
            'special_status' => $validatedData['special_status'],
        ]);

        return back()->with('updateProduct_success', "{$product->name} berhasil diperbarui!");
    }

    public function updateImage(Request $request, $id)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5000'
        ], [
            'image.required' => 'Gambar produk wajib diisi!',
            'image.image' => 'File wajib berupa gambar!',
            'image.mimes' => 'File gambar wajib berupa .jpeg, .jpg, .png!',
            'image.max' => 'Maksimal ukuran gambar 5MB!',
        ]);

        // cek apakah ada inputan file berupa image, kalau ada file image dimasukkan ke folder image di public lalu pathnya masuk ke database
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::disk('public')->delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('upload_images', ['disk' => 'public']);
            // disk public ini untuk membuat folder upload_images di folder storage/app/public
            // function store ini akan memasukkan gambar ke dalam storage/public/nama_folder_image
            // dengan nama file yang sudah merupakan string random sehingga memungkinkan kita untuk
            // memasukkan file gambar dengan nama yang sama tapii beda gambar.

            $product = Product::find($id);

            $product->update([
                'image' => $validatedData['image'],
            ]);
        }

        return back()->with('updateProductImage_success', "Gambar {$product->name} berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product_name = $product->name;
        $product->delete();

        return redirect()->route('owner.admin_products')->with('deleteProduct_success', "{$product_name} berhasil dihapus!");
    }
}
