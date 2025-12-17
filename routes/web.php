<?php

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\User;
use App\Models\Point;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Owner\UserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Member\CartController as MemberCartController;
use App\Http\Controllers\Owner\OrderController as OwnerOrderController;
use App\Http\Controllers\Member\OrderController as MemberOrderController;
use App\Http\Controllers\Owner\ProductController as OwnerProductController;
use App\Http\Controllers\Member\ProductController as MemberProductController;
use App\Http\Controllers\Member\WishlistController as MemberWishlistController;
use App\Http\Controllers\Member\TestimonyController as MemberTestimonyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear-session', [LoginController::class, 'clearSession'])->name('clear.session');
// Route::get('/storage-link', function () {
//     $targetFolder = storage_path('app/public');
//     $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
//     symlink($targetFolder, $linkFoldder);
// });
//====================================== BISA DIAKSES SEMUA ROLE ======================================
Route::get('/', [ProductController::class, 'home']); // HOME PAGE (CHECKED)
Route::get('/products', [ProductController::class, 'index'])->name('products'); // PRODUCTS PAGE (CHECKED)
Route::get('/gallery', [GalleryController::class, 'index']); // GALLERY PAGE (CHECKED)
Route::get('/contactus', function () {
    if (Auth::check()) {
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
        $data = [
            "TabTitle" => "Kontak Lisahwan",
            "active_4" => "text-yellow-500 rounded md:bg-transparent md:p-0",
            "carts" => $carts,
            "shipment_price" => $shipment_price,
            "admin_fee" => $admin_fee,
            "reward_now" => $reward_now,
            "point" => $point
        ];
    } else {
        $data = [
            "TabTitle" => "Kontak Lisahwan",
            "active_4" => "text-yellow-500 rounded md:bg-transparent md:p-0",
        ];
    }
    return view('contact', $data);
}); // CONTACT PAGE (CHECKED)
//=====================================================================================================


//=================================== BISA DIAKSES ROLE ADMIN SAJA ===================================
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/admin', [AdminOrderController::class, 'index'])->name('admin');
    Route::put('/admin/update/{order}', [AdminOrderController::class, 'updateToday'])->name('admin.update');

    // Route::get('/order_history', [AdminOrderController::class, 'history'])->name('order_history');
    // Route::put('/order_history/update/{order}', [AdminOrderController::class, 'updateHistory'])->name('order_history.update');

    Route::get('/admin/productlist', [AdminOrderController::class, 'showAllProducts'])->name('products');
    Route::post('/admin/productlist/add/{product_id}', [AdminOrderController::class, 'addProduct'])->name('products.add');
    Route::put('/admin/produclist/edit/{cartdetail_id}', [AdminOrderController::class, 'editProduct'])->name('products.edit');
    Route::delete('/admin/produclist/delete/{cartdetail_id}', [AdminOrderController::class, 'deleteProduct'])->name('products.delete');

    Route::get('/admin/carts', [AdminOrderController::class, 'showCarts'])->name('carts');

    Route::post('/admin/checkout', [AdminOrderController::class, 'checkout'])->name('checkout');

    Route::get('/admin/print_struk/order/{order_id}', [AdminOrderController::class, 'generateReceipt_ORDER'])->name('printStrukOrder');
    Route::get('/admin/print_struk/cart/{user_id}', [AdminOrderController::class, 'generateReceipt_CART'])->name('printStrukCart');
    Route::get('/admin/print_label/{order_id}', [AdminOrderController::class, 'generateShipmentLabel'])->name('printLabelPengiriman');

    Route::get('/admin/activate_discount', [AdminOrderController::class, 'activateDiscount'])->name('aktifDiskon');
});
//====================================================================================================


//=================================== BISA DIAKSES ROLE MEMBER SAJA ===================================
Route::group([
    'middleware' => 'member',
    'prefix' => 'member',
    'as' => 'member.'
], function () {
    Route::get('/products/{product_id}', [MemberProductController::class, 'show'])->name('products.show'); // ORDERDETAIL PAGE (CHECKED)

    Route::post('/carts/add/{product_id}', [MemberCartController::class, 'store'])->name('carts.add'); // INSERT TO CART (CHECKED)
    Route::delete('/carts/delete/{cartdetail_id}', [MemberCartController::class, 'destroy'])->name('carts.destroy'); // DELETE CART (CHECKED)
    Route::get('/carts/edit/{product_id}', [MemberCartController::class, 'edit'])->name('carts.edit'); // EDIT CART (CHECKED)
    Route::patch('/carts/update/{product_id}', [MemberCartController::class, 'update'])->name('carts.update'); // UPDATE CART (CHECKED)

    // Route untuk AJAX RajaOngkir V2
    Route::get('/get-cities/{province_id}', [MemberOrderController::class, 'getCities'])->name('ajax.getCities');
    Route::get('/get-districts/{city_id}', [MemberOrderController::class, 'getDistricts'])->name('ajax.getDistricts');

    Route::get('/checkout', [MemberOrderController::class, 'index'])->name('checkout'); // CHECKOUT PAGE (CHECKED)
    Route::post('/checkout/payment', [MemberOrderController::class, 'store'])->name('checkout.store'); // CREATE ORDER (CHECKED)
    Route::get('/orderhistory', [MemberOrderController::class, 'show_orderhistory'])->name('orderhistory'); // ORDER HISTORY PAGE (CHECKED)
    Route::patch('/orderhistory/{order_id}', [MemberOrderController::class, 'update'])->name('orderhistory.update'); // CHANGE ACCEPT_BY_CUSTOMER STATUS (CHECKED)

    Route::post('/testimony/{product_id}', [MemberTestimonyController::class, 'store'])->name('testimony.store'); // CREATE TESTIMONY (CHECKED)
    Route::patch('/testimony/{product_id}', [MemberTestimonyController::class, 'update'])->name('testimony.update'); // UPDATE TESTIMONY (CHECKED)
    Route::delete('/testimony/{testimony_id}', [MemberTestimonyController::class, 'destroy'])->name('testimony.destroy'); // UPDATE TESTIMONY (CHECKED)

    Route::get('/wishlist', [MemberWishlistController::class, 'index'])->name('wishlist'); // WISHLIST PAGE (CHECKED)
    Route::post('/wishlist/{product_id}', [MemberWishlistController::class, 'store'])->name('wishlist.store'); // INSERT PRODUCT TO WISHLIST (CHECKED)

    Route::post('/check_coupon', [MemberOrderController::class, 'checkCoupon'])->name('cekKupon');
    Route::post('/choose_coupon/{coupon_id}', [MemberOrderController::class, 'chooseCoupon'])->name('pilihKupon');

    Route::post('/activate_point', [MemberOrderController::class, 'activatePoint'])->name('aktifPoin');

    Route::post('/check_shipmentprice', [MemberOrderController::class, 'checkShipmentPrice'])->name('cekOngkir');
    Route::post('/choose_shipmentprice/{shipmentprice_id}', [MemberOrderController::class, 'chooseShipmentPrice'])->name('pilihOngkir');

    Route::get('/processing_payment', [MemberOrderController::class, 'handleTransactionStatus'])->name('handleTransactionStatus');
});
//=====================================================================================================


//=================================== BISA DIAKSES ROLE OWNER SAJA ====================================
Route::group([
    'middleware' => 'owner',
    'prefix' => 'owner',
    'as' => 'owner.'
], function () {
    Route::get('/admin', [OwnerOrderController::class, 'index'])->name('admin');
    Route::put('/admin/update/{order}', [OwnerOrderController::class, 'updateToday'])->name('admin.update');

    Route::get('/order_history', [OwnerOrderController::class, 'history'])->name('order_history');
    Route::put('/order_history/update/{order}', [OwnerOrderController::class, 'updateHistory'])->name('order_history.update');

    Route::get('/admin_products', [OwnerProductController::class, 'admin_products'])->name('admin_products');
    Route::post('/admin_products', [OwnerProductController::class, 'store'])->name('admin_products.store');
    Route::get('/admin_products/detail/{product_id}', [OwnerProductController::class, 'detail'])->name('admin_products.detail');
    Route::put('/admin_products/update/{product_id}', [OwnerProductController::class, 'update'])->name('admin_products.update');
    Route::put('/admin_products/updateImage/{product_id}', [OwnerProductController::class, 'updateImage'])->name('admin_products.updateImage');
    Route::put('/admin_products/addStock/{product_id}', [OwnerProductController::class, 'addStock'])->name('admin_products.addStock');
    Route::delete('/admin_products/destroy/{product_id}', [OwnerProductController::class, 'destroy'])->name('admin_products.destroy');

    Route::get('/admin_users', [UserController::class, 'index'])->name('admin_users');

    Route::get('/admin/productlist', [OwnerOrderController::class, 'showAllProducts'])->name('products');
    Route::post('/admin/productlist/add/{product_id}', [OwnerOrderController::class, 'addProduct'])->name('products.add');
    Route::put('/admin/produclist/edit/{cartdetail_id}', [OwnerOrderController::class, 'editProduct'])->name('products.edit');
    Route::delete('/admin/produclist/delete/{cartdetail_id}', [OwnerOrderController::class, 'deleteProduct'])->name('products.delete');

    Route::get('/admin/carts', [OwnerOrderController::class, 'showCarts'])->name('carts');

    Route::post('/admin/checkout', [OwnerOrderController::class, 'checkout'])->name('checkout');

    Route::get('/admin/print_struk/order/{order_id}', [OwnerOrderController::class, 'generateReceipt_ORDER'])->name('printStrukOrder');
    Route::get('/admin/print_struk/cart/{user_id}', [OwnerOrderController::class, 'generateReceipt_CART'])->name('printStrukCart');
    Route::get('/admin/print_label/{order_id}', [OwnerOrderController::class, 'generateShipmentLabel'])->name('printLabelPengiriman');

    Route::post('/admin/set_point', [PointController::class, 'setPoint'])->name('aturPoin');
    Route::put('/admin/edit_point', [PointController::class, 'editPoint'])->name('ubahPoin');

    Route::post('/admin/set_coupon', [CouponController::class, 'setCoupon'])->name('aturKupon');
    Route::put('/admin/edit_coupon/{coupon_id}', [CouponController::class, 'editCoupon'])->name('ubahKupon');
    Route::delete('/admin/delete_coupon/{coupon_id}', [CouponController::class, 'deleteCoupon'])->name('hapusKupon');

    Route::get('/admin/activate_discount', [OwnerOrderController::class, 'activateDiscount'])->name('aktifDiskon');
});
//====================================================================================================


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
