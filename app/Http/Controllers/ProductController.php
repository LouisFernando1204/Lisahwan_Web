<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Testimony;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart_user = Cart::where('user_id', 1)->first();
        if(empty($cart_user)){
            $carts = null;
        }
        else{
            $carts = $cart_user->cart_detail;
        }
        return view('customer.products', [
            "TabTitle" => "Produk Lisahwan",
            "pageTitle" => '<mark class="px-2 text-yellow-500 bg-gray-800 rounded dark:bg-gray-800">Produk</mark> Kami',
            'pageDescription' => 'Jelajahi camilan terbaik di <span class="underline underline-offset-2 decoration-4 decoration-yellow-500">Lisahwan</span> dan pilih favorit Anda sekarang!',
            "active_2" => "text-white rounded md:bg-transparent md:text-yellow-500 md:p-0 md:dark:text-yellow-500",
            "products" => Product::all(),
            "carts" => $carts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('index', [
        //     "carousel_1" => "/images/fotoproduk/GalleryCarousel_12.jpeg",
        //     "carousel_2" => "/images/fotoproduk/GalleryCarousel_3.jpg",
        //     "carousel_3" => "/images/fotoproduk/GalleryCarousel_10.jpg",
        //     "carousel_4" => "/images/fotoproduk/GalleryCarousel_11.jpg",
        //     "TabTitle" => "Lisahwan Snacks Surabaya",
        //     "active_1" => "text-white rounded md:bg-transparent md:text-yellow-500 md:p-0 md:dark:text-yellow-500",
        //     "products" => Product::where('best_seller', true)->get(),
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $testimonies = Testimony::where('product_id', $id)->paginate(4);
        $product = Product::find($id);
        $products_bestseller = OrderDetail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->take(4)
            ->get();
        $total_product = Product::count();
        return view('customer.orderdetail', [
            "TabTitle" => $product->name,
            "product" => $product,
            "total_product" => $total_product,
            "testimonies" => $testimonies,
            "products_bestseller" => $products_bestseller
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
