<?php

namespace App\Http\Controllers\Member;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Point;
use App\Models\Product;
use App\Models\Testimony;
use App\Models\CartDetail;
use App\Models\Production;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $submitButton = $request->input('submitButton');

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $product = Product::find($id);

        $validatedData = $request->validate([
            "quantity" => "required|not_in:0",
            "cost" => "required|not_in:0"
        ], [
            'quantity.required' => 'Oops! Anda lupa mengisikan jumlah pesanan!',
            'quantity.not_in' => 'Oops! Anda lupa mengisikan jumlah pesanan!',
            'cost.required' => 'Pastikan anda sudah mengisi jumlah pesanan!',
            'cost.not_in' => 'Pastikan anda sudah mengisi jumlah pesanan!',
        ]);

        // Membersihkan dari karakter non-numeric, termasuk pemisah ribuan
        $price_beforeConverted = filter_var($validatedData['cost'], FILTER_SANITIZE_NUMBER_INT);

        // Konversi ke integer
        $price_afterConverted = intval($price_beforeConverted);

        $total_weight = $product->weight * $validatedData['quantity'];

        if ($validatedData['quantity'] <= $product->stock) {
            if (!$cart) {
                $cart_new = Cart::create([
                    'user_id' => Auth::user()->id
                ]);
                CartDetail::create([
                    'cart_id' => $cart_new->id,
                    'product_id' => $id,
                    'quantity' => $validatedData['quantity'],
                    'price' => $price_afterConverted,
                    'weight' => $total_weight
                ]);
            } else {
                $cart_detail = $cart->cart_detail;
                $check_product = $cart_detail->where('product_id', $id)->first();

                if ($check_product) {
                    $check_product->update([
                        'quantity' => $check_product->quantity + $validatedData['quantity'],
                        'price' => $check_product->price + $price_afterConverted,
                        'weight' => $check_product->weight + $total_weight
                    ]);
                } else {
                    CartDetail::create([
                        'cart_id' => $cart->id,
                        'product_id' => $id,
                        'quantity' => $validatedData['quantity'],
                        'price' => $price_afterConverted,
                        'weight' => $total_weight
                    ]);
                }
            }
            $product->update([
                'stock' =>  $product->stock - $validatedData['quantity']
            ]);
            Production::create([
                'date' => now(),
                'product_id' => $id,
                'quantity' => $validatedData['quantity'],
                'type' => 'kurang'
            ]);
            if ($submitButton === 'submit1') {
                return redirect()->route('member.checkout');
            } else {
                return redirect()->route('products')->with('addCart_success', 'Pesanan ditambahkan ke keranjang!');
            }
        } else {
            return back()->with('over_quantity', 'Mohon maaf, pesanan anda melebihi stok!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cart_detail = CartDetail::where('product_id', $id)->first();

        if (!$cart_detail) {
            return redirect()->route('products')->with('deleteCart_success', 'Mohon maaf, keranjang anda kosong!');
        } else {
            $testimonies = Testimony::where('product_id', $id)->paginate(4);
            $products_bestseller = OrderDetail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
                ->groupBy('product_id')
                ->orderByDesc('total_quantity')
                ->take(4)
                ->get();
            $total_product = Product::count();

            // Query untuk mendapatkan cart_user yang lebih dari 7 hari
            $cart_user = Cart::where('user_id', Auth::user()->id)
                ->where('created_at', '<', Carbon::now()->subDays(7))
                ->first();
            // Jika cart_user ditemukan dan sudah lebih dari 7 hari, hapus
            if (!empty($cart_user)) {
                $cart_user->delete();
                $carts = null;
                $shipment_price = null;
                $admin_fee = null;
                $reward_now = null;
                $point = null;
            } else {
                // Jika tidak ditemukan cart_user yang lebih dari 7 hari, cari cart_user biasa
                $cart_user = Cart::where('user_id', Auth::user()->id)->first();
                if (empty($cart_user)) {
                    $carts = null;
                    $shipment_price = null;
                    $admin_fee = null;
                    $reward_now = null;
                    $point = null;
                } else {
                    $shipment_price = $cart_user->shipment_price;
                    $admin_fee = $cart_user->admin_fee;

                    // REWARD POIN SYSTEM
                    $point = Point::first();
                    if ($point) {
                        $total_price = $cart_user->cart_detail->sum('price');
                        $total_poin = $total_price * ($point->percentage_from_totalprice / 100);

                        // Membulatkan ke bawah ke kelipatan 1000 terdekat
                        $total_poin = floor($total_poin / 10) * 10; // Membulatkan ke kelipatan 10
                        $poin_to_money = $total_poin * $point->money_per_poin;

                        $cart_user->update([
                            'total_poin' => $total_poin
                        ]);

                        $customer = User::where('id', Auth::user()->id)->first();
                        $reward_now = $customer->reward * $point->money_per_poin;
                    } else {
                        $total_poin = 0;
                        $poin_to_money = 0;
                        $reward_now = 0;
                    }
                    //

                    $carts = $cart_user->cart_detail;
                }
            }

            return view(
                'customer.edit_orderdetail',
                [
                    "TabTitle" => $cart_detail->product->name,
                    "active_2" => "text-yellow-500 rounded md:bg-transparent md:p-0",
                    "total_product" => $total_product,
                    "testimonies" => $testimonies,
                    "products_bestseller" => $products_bestseller,
                    "carts" => $carts,
                    "cart_detail" => $cart_detail,
                    "shipment_price" => $shipment_price,
                    "admin_fee" => $admin_fee,
                    "reward_now" => $reward_now,
                    "point" => $point
                ]
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cart_detail = CartDetail::where('id', $id)->first();

        $validatedData = $request->validate([
            "quantity" => "required|not_in:0",
            "cost" => "required|not_in:0"
        ], [
            'quantity.required' => 'Oops! Anda lupa mengisikan jumlah pesanan!',
            'quantity.not_in' => 'Oops! Anda lupa mengisikan jumlah pesanan!',
            'cost.required' => 'Pastikan anda sudah mengisi jumlah pesanan!',
            'cost.not_in' => 'Pastikan anda sudah mengisi jumlah pesanan!',
        ]);

        // Membersihkan dari karakter non-numeric, termasuk pemisah ribuan
        $price_beforeConverted = filter_var($validatedData['cost'], FILTER_SANITIZE_NUMBER_INT);

        // Konversi ke integer
        $price_afterConverted = intval($price_beforeConverted);

        $total_weight = $cart_detail->product->weight * $validatedData['quantity'];

        if ($validatedData['quantity'] <= $cart_detail->product->stock) {
            $quantity_difference = $validatedData['quantity'] - $cart_detail->quantity;
            $product = $cart_detail->product;
            $product->update([
                'stock' => $cart_detail->product->stock - $quantity_difference
            ]);
            if ($validatedData['quantity'] < $cart_detail->quantity) {
                Production::create([
                    'date' => now(),
                    'product_id' => $product->id,
                    'quantity' => abs($quantity_difference),
                    'type' => 'tambah'
                ]);
            } else {
                Production::create([
                    'date' => now(),
                    'product_id' => $product->id,
                    'quantity' => abs($quantity_difference),
                    'type' => 'tambah'
                ]);
            }
            $cart_detail->update([
                'quantity' => $validatedData['quantity'],
                'price' => $price_afterConverted,
                'weight' => $total_weight
            ]);
            return redirect()->route('products')->with('updateCart_success', 'Pesanan berhasil diperbarui!');
        } else {
            return back()->with('over_quantity', 'Mohon maaf, pesanan anda melebihi stok!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        // Ambil data keranjang pengguna
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $courier = $cart ? $cart->courier : null;

        // Dapatkan URL sebelumnya
        $previousUrl = url()->previous();

        // Debug untuk memeriksa URL sebelumnya
        // dd($previousUrl);

        // Pengecekan kondisi untuk district_id dan courier hanya jika URL sebelumnya adalah member/checkout
        if (strpos($previousUrl, 'member/checkout') !== false) {
            if (!$request->district_id && !$courier) {
                return redirect()->back()->withErrors(['courierDistrictForgotten_error' => "Oops, anda lupa memilih jasa pengiriman dan kecamatan tujuan!"]);
            }
            if (!$request->district_id) {
                return redirect()->back()->withErrors(['districtForgotten_error' => "Oops, anda lupa memilih kecamatan tujuan!"]);
            }
            if (!$courier) {
                return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"]);
            }
        }

        // Ambil detail keranjang yang akan dihapus
        $cartDetail = $cart->cart_detail->where('id', $id)->first();
        if ($cartDetail) {
            // Temukan Cart yang sesuai dengan relasi
            $cart = $cartDetail->cart;

            // Update stock produk yang dihapus
            $cartDetail->product->update([
                'stock' => $cartDetail->product->stock + $cartDetail->quantity
            ]);

            // Pengecekan dan pemanggilan API RajaOngkir hanya jika URL adalah member/checkout
            $costs = null;
            if (strpos($previousUrl, 'member/checkout') !== false && $cart->cart_detail->count() > 0) {
                $origin_id = 5902;
                $destination_id = $request->district_id;

                $total_weight = $cart->cart_detail->sum('weight');

                try {
                    $responseCost = Http::withHeaders([
                        'key' => config('rajaongkir.api_key'),
                        'Content-Type' => 'application/x-www-form-urlencoded'
                    ])->asForm()->post('https://rajaongkir.komerce.id/api/v1/calculate/district/domestic-cost', [
                        'origin' => $origin_id,
                        'destination' => $destination_id,
                        'weight' => $total_weight,
                        'courier' => $courier
                    ]);
                    $body = $responseCost->json();
                    $costs = $body['data'] ?? [];
                } catch (\Exception $e) {
                    // Silent fail jika API error
                }
            }

            // Hapus CartDetail
            $cartDetail->delete();

            // Buat log produksi
            Production::create([
                'date' => now(),
                'product_id' => $cartDetail->product->id,
                'quantity' => $cartDetail->quantity,
                'type' => 'tambah'
            ]);

            // Refresh cart data after deleting cartDetail
            $cart->refresh();

            // Periksa apakah setelah menghapus CartDetail, tidak ada lagi cart_detail dalam keranjang
            if ($cart && $cart->cart_detail->isEmpty()) {
                // Jika tidak ada cart_detail, hapus juga keranjangnya
                $cart->delete();
            }

            return back()->with([
                'deleteCart_success' => 'Pesanan berhasil dihapus!',
                'costs' => $costs
            ]);
        }

        // Jika cartDetail tidak ditemukan
        return back()->withErrors(provider: ['error' => 'Detail keranjang tidak ditemukan']);
    }
}
