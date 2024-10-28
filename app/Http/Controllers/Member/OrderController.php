<?php

namespace App\Http\Controllers\Member;

use Carbon\Carbon;
use Midtrans\Snap;
use App\Models\Cart;

use App\Models\User;
use App\Models\Order;
use App\Models\Point;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\UserCoupon;
use Midtrans\Notification;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function handleTransactionStatus(Request $request)
    {
        // Ambil semua parameter dari URL
        $parameters = $request->all();

        $orderId = $request->query('order_id');
        $statusCode = $request->query('status_code');
        $transactionStatus = $request->query('transaction_status');

        $order = Order::where('midtrans_order_id', $orderId)->first();
        $cart = Cart::where('user_id', optional($order)->user_id)->first();
        $customer = User::where('id', optional($order)->user_id)->first();

        // Logika untuk menampilkan pesan berdasarkan status transaksi
        if ($transactionStatus == 'capture') {
            if ($cart) {
                // Hapus semua sesi yang terkait dengan couponStatus
                $activeCoupons = Session::get('activeCoupons', []);
                foreach ($activeCoupons as $couponId) {
                    if (Session::has('couponStatus_' . $couponId)) {
                        Session::forget('couponStatus_' . $couponId);
                    }
                }
                // Hapus sesi activeCoupons
                if (Session::has('activeCoupons')) {
                    Session::forget('activeCoupons');
                }
                // Hapus semua sesi yang terkait dengan arraycourierStatus
                $activeCouriersStatus = Session::get('arraycourierStatus', []);
                foreach ($activeCouriersStatus as $courierStatus) {
                    if (Session::has('courierStatus_' . $courierStatus)) {
                        Session::forget('courierStatus_' . $courierStatus);
                    }
                }
                // Hapus sesi arraycourierStatus
                if (Session::has('arraycourierStatus')) {
                    Session::forget('arraycourierStatus');
                }
                // Mendapatkan semua sesi yang terkait dengan arraycostStatus
                $activeCostStatus = Session::get('arraycostStatus', []);
                // Menghapus semua sesi yang terkait dengan arraycostStatus
                foreach ($activeCostStatus as $costStatus) {
                    if (Session::has($costStatus)) {
                        Session::forget($costStatus); // Hapus sesi berdasarkan kunci yang disimpan
                    }
                }
                // Hapus sesi arraycostStatus
                if (Session::has('arraycostStatus')) {
                    Session::forget('arraycostStatus');
                }
                // Hapus sesi originalPrice yang mungkin ada
                foreach ($cart->cart_detail as $cart_detail) {
                    if (Session::has('originalPrice_' . $cart_detail->id)) {
                        Session::forget('originalPrice_' . $cart_detail->id);
                    }
                }
            }
            if (Session::has('checkout.address_id')) {
                Session::forget('checkout.address_id');
            }
            if (Session::has('checkout.address')) {
                Session::forget('checkout.address');
            }
            if (Session::has('checkout.city')) {
                Session::forget('checkout.city');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            $customer->update([
                'reward' => $customer->reward + $cart->total_poin
            ]);
            $cart->delete();
            return redirect()->route('member.orderhistory')->with('capturePayment_SUCCESSFULL', "Pesanan anda berhasil! Tinjau status pesanan anda disini!");
        } elseif ($transactionStatus == 'settlement') {
            if ($cart) {
                // Hapus semua sesi yang terkait dengan couponStatus
                $activeCoupons = Session::get('activeCoupons', []);
                foreach ($activeCoupons as $couponId) {
                    if (Session::has('couponStatus_' . $couponId)) {
                        Session::forget('couponStatus_' . $couponId);
                    }
                }
                // Hapus sesi activeCoupons
                if (Session::has('activeCoupons')) {
                    Session::forget('activeCoupons');
                }
                // Hapus semua sesi yang terkait dengan arraycourierStatus
                $activeCouriersStatus = Session::get('arraycourierStatus', []);
                foreach ($activeCouriersStatus as $courierStatus) {
                    if (Session::has('courierStatus_' . $courierStatus)) {
                        Session::forget('courierStatus_' . $courierStatus);
                    }
                }
                // Hapus sesi arraycourierStatus
                if (Session::has('arraycourierStatus')) {
                    Session::forget('arraycourierStatus');
                }
                // Mendapatkan semua sesi yang terkait dengan arraycostStatus
                $activeCostStatus = Session::get('arraycostStatus', []);
                // Menghapus semua sesi yang terkait dengan arraycostStatus
                foreach ($activeCostStatus as $costStatus) {
                    if (Session::has($costStatus)) {
                        Session::forget($costStatus); // Hapus sesi berdasarkan kunci yang disimpan
                    }
                }
                // Hapus sesi arraycostStatus
                if (Session::has('arraycostStatus')) {
                    Session::forget('arraycostStatus');
                }
                // Hapus sesi originalPrice yang mungkin ada
                foreach ($cart->cart_detail as $cart_detail) {
                    if (Session::has('originalPrice_' . $cart_detail->id)) {
                        Session::forget('originalPrice_' . $cart_detail->id);
                    }
                }
            }
            if (Session::has('checkout.address_id')) {
                Session::forget('checkout.address_id');
            }
            if (Session::has('checkout.address')) {
                Session::forget('checkout.address');
            }
            if (Session::has('checkout.city')) {
                Session::forget('checkout.city');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            $customer->update([
                'reward' => $customer->reward + $cart->total_poin
            ]);
            $cart->delete();
            return redirect()->route('member.orderhistory')->with('settlementPayment_SUCCESSFULL', "Pesanan anda berhasil! Tinjau status pesanan anda disini!");
        } elseif ($transactionStatus == 'pending') {
            $customer->update([
                'reward' => $customer->reward + $customer->old_reward
            ]);
            return redirect()->route('member.checkout')->withErrors(['pendingPayment_ERROR' => "Proses pembayaran anda belum selesai!"]);
        } elseif ($transactionStatus == 'deny') {
            $customer->update([
                'reward' => $customer->reward + $customer->old_reward
            ]);
            return redirect()->route('member.checkout')->withErrors(['denyPayment_ERROR' => "Pembayaran anda ditolak!"]);
        } elseif ($transactionStatus == 'expire') {
            $customer->update([
                'reward' => $customer->reward + $customer->old_reward
            ]);
            return redirect()->route('member.checkout')->withErrors(['expirePayment_ERROR'  => "Proses pembayaran anda sudah kedaluwarsa, mohon melakukan pembayaran ulang!"]);
        } elseif ($transactionStatus == 'cancel') {
            if ($cart) {
                // Hapus semua sesi yang terkait dengan couponStatus
                $activeCoupons = Session::get('activeCoupons', []);
                foreach ($activeCoupons as $couponId) {
                    if (Session::has('couponStatus_' . $couponId)) {
                        Session::forget('couponStatus_' . $couponId);
                    }
                }
                // Hapus sesi activeCoupons
                if (Session::has('activeCoupons')) {
                    Session::forget('activeCoupons');
                }
                // Hapus semua sesi yang terkait dengan arraycourierStatus
                $activeCouriersStatus = Session::get('arraycourierStatus', []);
                foreach ($activeCouriersStatus as $courierStatus) {
                    if (Session::has('courierStatus_' . $courierStatus)) {
                        Session::forget('courierStatus_' . $courierStatus);
                    }
                }
                // Hapus sesi arraycourierStatus
                if (Session::has('arraycourierStatus')) {
                    Session::forget('arraycourierStatus');
                }
                // Mendapatkan semua sesi yang terkait dengan arraycostStatus
                $activeCostStatus = Session::get('arraycostStatus', []);
                // Menghapus semua sesi yang terkait dengan arraycostStatus
                foreach ($activeCostStatus as $costStatus) {
                    if (Session::has($costStatus)) {
                        Session::forget($costStatus); // Hapus sesi berdasarkan kunci yang disimpan
                    }
                }
                // Hapus sesi arraycostStatus
                if (Session::has('arraycostStatus')) {
                    Session::forget('arraycostStatus');
                }
                // Hapus sesi originalPrice yang mungkin ada
                foreach ($cart->cart_detail as $cart_detail) {
                    if (Session::has('originalPrice_' . $cart_detail->id)) {
                        Session::forget('originalPrice_' . $cart_detail->id);
                    }
                }
            }
            if (Session::has('checkout.address_id')) {
                Session::forget('checkout.address_id');
            }
            if (Session::has('checkout.address')) {
                Session::forget('checkout.address');
            }
            if (Session::has('checkout.city')) {
                Session::forget('checkout.city');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            $customer->update([
                'reward' => $customer->reward + $customer->old_reward
            ]);
            foreach ($cart->cart_detail as $cart_detail) {
                $product = $cart_detail->product;
                $product->stock += $cart_detail->quantity;
                $product->save();
            }
            $cart->delete();
            $order->delete();
            return redirect()->route('products')->withErrors(['cancelPayment_ERROR' => "Pesanan anda dibatalkan! Silahkan menghubungi Lisahwan™ (082230308030)!"]);
        } elseif ($transactionStatus == 'failure') {
            if ($cart) {
                // Hapus semua sesi yang terkait dengan couponStatus
                $activeCoupons = Session::get('activeCoupons', []);
                foreach ($activeCoupons as $couponId) {
                    if (Session::has('couponStatus_' . $couponId)) {
                        Session::forget('couponStatus_' . $couponId);
                    }
                }
                // Hapus sesi activeCoupons
                if (Session::has('activeCoupons')) {
                    Session::forget('activeCoupons');
                }
                // Hapus semua sesi yang terkait dengan arraycourierStatus
                $activeCouriersStatus = Session::get('arraycourierStatus', []);
                foreach ($activeCouriersStatus as $courierStatus) {
                    if (Session::has('courierStatus_' . $courierStatus)) {
                        Session::forget('courierStatus_' . $courierStatus);
                    }
                }
                // Hapus sesi arraycourierStatus
                if (Session::has('arraycourierStatus')) {
                    Session::forget('arraycourierStatus');
                }
                // Mendapatkan semua sesi yang terkait dengan arraycostStatus
                $activeCostStatus = Session::get('arraycostStatus', []);
                // Menghapus semua sesi yang terkait dengan arraycostStatus
                foreach ($activeCostStatus as $costStatus) {
                    if (Session::has($costStatus)) {
                        Session::forget($costStatus); // Hapus sesi berdasarkan kunci yang disimpan
                    }
                }
                // Hapus sesi arraycostStatus
                if (Session::has('arraycostStatus')) {
                    Session::forget('arraycostStatus');
                }
                // Hapus sesi originalPrice yang mungkin ada
                foreach ($cart->cart_detail as $cart_detail) {
                    if (Session::has('originalPrice_' . $cart_detail->id)) {
                        Session::forget('originalPrice_' . $cart_detail->id);
                    }
                }
            }
            if (Session::has('checkout.address_id')) {
                Session::forget('checkout.address_id');
            }
            if (Session::has('checkout.address')) {
                Session::forget('checkout.address');
            }
            if (Session::has('checkout.city')) {
                Session::forget('checkout.city');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            $customer->update([
                'reward' => $customer->reward + $customer->old_reward
            ]);
            foreach ($cart->cart_detail as $cart_detail) {
                $product = $cart_detail->product;
                $product->stock += $cart_detail->quantity;
                $product->save();
            }
            $cart->delete();
            $order->delete();
            return redirect()->route('products')->withErrors(['failurePayment_ERROR' => "Terjadi kesalahan! Silahkan menghubungi Lisahwan™ (082230308030)!"]);
        } elseif ($transactionStatus == 'refund') {
            if ($cart) {
                // Hapus semua sesi yang terkait dengan couponStatus
                $activeCoupons = Session::get('activeCoupons', []);
                foreach ($activeCoupons as $couponId) {
                    if (Session::has('couponStatus_' . $couponId)) {
                        Session::forget('couponStatus_' . $couponId);
                    }
                }
                // Hapus sesi activeCoupons
                if (Session::has('activeCoupons')) {
                    Session::forget('activeCoupons');
                }
                // Hapus semua sesi yang terkait dengan arraycourierStatus
                $activeCouriersStatus = Session::get('arraycourierStatus', []);
                foreach ($activeCouriersStatus as $courierStatus) {
                    if (Session::has('courierStatus_' . $courierStatus)) {
                        Session::forget('courierStatus_' . $courierStatus);
                    }
                }
                // Hapus sesi arraycourierStatus
                if (Session::has('arraycourierStatus')) {
                    Session::forget('arraycourierStatus');
                }
                // Mendapatkan semua sesi yang terkait dengan arraycostStatus
                $activeCostStatus = Session::get('arraycostStatus', []);
                // Menghapus semua sesi yang terkait dengan arraycostStatus
                foreach ($activeCostStatus as $costStatus) {
                    if (Session::has($costStatus)) {
                        Session::forget($costStatus); // Hapus sesi berdasarkan kunci yang disimpan
                    }
                }
                // Hapus sesi arraycostStatus
                if (Session::has('arraycostStatus')) {
                    Session::forget('arraycostStatus');
                }
                // Hapus sesi originalPrice yang mungkin ada
                foreach ($cart->cart_detail as $cart_detail) {
                    if (Session::has('originalPrice_' . $cart_detail->id)) {
                        Session::forget('originalPrice_' . $cart_detail->id);
                    }
                }
            }
            if (Session::has('checkout.address_id')) {
                Session::forget('checkout.address_id');
            }
            if (Session::has('checkout.address')) {
                Session::forget('checkout.address');
            }
            if (Session::has('checkout.city')) {
                Session::forget('checkout.city');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            $customer->update([
                'reward' => $customer->reward + $customer->old_reward
            ]);
            foreach ($cart->cart_detail as $cart_detail) {
                $product = $cart_detail->product;
                $product->stock += $cart_detail->quantity;
                $product->save();
            }
            $cart->delete();
            $order->delete();
            return redirect()->route('products')->withErrors(['refundPayment_ERROR' => "Pembayaran anda di-refund! Silahkan menghubungi Lisahwan™ (082230308030)!"]);
        } elseif ($transactionStatus == 'partial_refund') {
            if ($cart) {
                // Hapus semua sesi yang terkait dengan couponStatus
                $activeCoupons = Session::get('activeCoupons', []);
                foreach ($activeCoupons as $couponId) {
                    if (Session::has('couponStatus_' . $couponId)) {
                        Session::forget('couponStatus_' . $couponId);
                    }
                }
                // Hapus sesi activeCoupons
                if (Session::has('activeCoupons')) {
                    Session::forget('activeCoupons');
                }
                // Hapus semua sesi yang terkait dengan arraycourierStatus
                $activeCouriersStatus = Session::get('arraycourierStatus', []);
                foreach ($activeCouriersStatus as $courierStatus) {
                    if (Session::has('courierStatus_' . $courierStatus)) {
                        Session::forget('courierStatus_' . $courierStatus);
                    }
                }
                // Hapus sesi arraycourierStatus
                if (Session::has('arraycourierStatus')) {
                    Session::forget('arraycourierStatus');
                }
                // Mendapatkan semua sesi yang terkait dengan arraycostStatus
                $activeCostStatus = Session::get('arraycostStatus', []);
                // Menghapus semua sesi yang terkait dengan arraycostStatus
                foreach ($activeCostStatus as $costStatus) {
                    if (Session::has($costStatus)) {
                        Session::forget($costStatus); // Hapus sesi berdasarkan kunci yang disimpan
                    }
                }
                // Hapus sesi arraycostStatus
                if (Session::has('arraycostStatus')) {
                    Session::forget('arraycostStatus');
                }
                // Hapus sesi originalPrice yang mungkin ada
                foreach ($cart->cart_detail as $cart_detail) {
                    if (Session::has('originalPrice_' . $cart_detail->id)) {
                        Session::forget('originalPrice_' . $cart_detail->id);
                    }
                }
            }
            if (Session::has('checkout.address_id')) {
                Session::forget('checkout.address_id');
            }
            if (Session::has('checkout.address')) {
                Session::forget('checkout.address');
            }
            if (Session::has('checkout.city')) {
                Session::forget('checkout.city');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            $customer->update([
                'reward' => $customer->reward + $customer->old_reward
            ]);
            foreach ($cart->cart_detail as $cart_detail) {
                $product = $cart_detail->product;
                $product->stock += $cart_detail->quantity;
                $product->save();
            }
            $cart->delete();
            $order->delete();
            return redirect()->route('products')->withErrors(['partialRefundPayment_ERROR' => "Pembayaran anda di-refund! Silahkan menghubungi Lisahwan™ (082230308030)!"]);
        } elseif ($transactionStatus == 'authorize') {
            if ($cart) {
                // Hapus semua sesi yang terkait dengan couponStatus
                $activeCoupons = Session::get('activeCoupons', []);
                foreach ($activeCoupons as $couponId) {
                    if (Session::has('couponStatus_' . $couponId)) {
                        Session::forget('couponStatus_' . $couponId);
                    }
                }
                // Hapus sesi activeCoupons
                if (Session::has('activeCoupons')) {
                    Session::forget('activeCoupons');
                }
                // Hapus semua sesi yang terkait dengan arraycourierStatus
                $activeCouriersStatus = Session::get('arraycourierStatus', []);
                foreach ($activeCouriersStatus as $courierStatus) {
                    if (Session::has('courierStatus_' . $courierStatus)) {
                        Session::forget('courierStatus_' . $courierStatus);
                    }
                }
                // Hapus sesi arraycourierStatus
                if (Session::has('arraycourierStatus')) {
                    Session::forget('arraycourierStatus');
                }
                // Mendapatkan semua sesi yang terkait dengan arraycostStatus
                $activeCostStatus = Session::get('arraycostStatus', []);
                // Menghapus semua sesi yang terkait dengan arraycostStatus
                foreach ($activeCostStatus as $costStatus) {
                    if (Session::has($costStatus)) {
                        Session::forget($costStatus); // Hapus sesi berdasarkan kunci yang disimpan
                    }
                }
                // Hapus sesi arraycostStatus
                if (Session::has('arraycostStatus')) {
                    Session::forget('arraycostStatus');
                }
                // Hapus sesi originalPrice yang mungkin ada
                foreach ($cart->cart_detail as $cart_detail) {
                    if (Session::has('originalPrice_' . $cart_detail->id)) {
                        Session::forget('originalPrice_' . $cart_detail->id);
                    }
                }
            }
            if (Session::has('checkout.address_id')) {
                Session::forget('checkout.address_id');
            }
            if (Session::has('checkout.address')) {
                Session::forget('checkout.address');
            }
            if (Session::has('checkout.city')) {
                Session::forget('checkout.city');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            $customer->update([
                'reward' => $customer->reward + $customer->old_reward
            ]);
            foreach ($cart->cart_detail as $cart_detail) {
                $product = $cart_detail->product;
                $product->stock += $cart_detail->quantity;
                $product->save();
            }
            $cart->delete();
            $order->delete();
            return redirect()->route('products')->withErrors(['authorizePayment_ERROR' => "Pembayaran anda di-authorize! Silahkan menghubungi Lisahwan™ (082230308030)!"]);
        } elseif (count($parameters) == 1 && $request->has('order_id')) {
            // ini kalau payment expire ketika belum memilih metode pembayaran sama sekali
            $customer->update([
                'reward' => $customer->reward + $customer->old_reward
            ]);
            return redirect()->route('member.checkout')->withErrors(['expirePayment_ERROR'  => "Proses pembayaran anda sudah kedaluwarsa, mohon melakukan pembayaran ulang!"]);
        } else {
            $customer->update([
                'reward' => $customer->reward + $customer->old_reward
            ]);
            return redirect()->route('member.checkout')->withErrors(['anotherPayment_ERROR'  => "Terjadi kesalahan, mohon melakukan pembayaran ulang!"]);
        }
    }

    public function checkCoupon(Request $request)
    {
        // Simpan data alamat ke session
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.city', $request->city);
        // $request->session()->put('checkout.province', $request->province);
        // $request->session()->put('checkout.postal_code', $request->postal_code);
        $request->session()->put('checkout.note', $request->note);

        // Ambil data keranjang pengguna
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $courier = $cart ? $cart->courier : null;

        if (!$request->city && !$courier) {
            return redirect()->back()->withErrors(['couriercityForgotten_error' => "Oops, anda lupa memilih jasa pengiriman dan kota tujuan!"]);
        }
        if (!$request->city) {
            return redirect()->back()->withErrors(['cityForgotten_error' => "Oops, anda lupa memilih kota tujuan!"]);
        }
        if (!$courier) {
            return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"]);
        }

        $validatedData = $request->validate([
            "coupon" => "required|string|max:20",
        ], [
            'coupon.required' => 'Nama kupon wajib diisi!',
            'coupon.string' => 'Nama kupon wajib berupa karakter!',
            'coupon.max' => 'Nama kupon maksimal 20 karakter!',
        ]);

        $coupon = Coupon::where('title', $validatedData['coupon'])->first();

        $responseCities = Http::withHeaders([
            'key' => config(key: 'rajaongkir.api_key')
        ])->get('https://pro.rajaongkir.com/api/city');
        $cities = $responseCities['rajaongkir']['results'];

        $origin_id = null;
        foreach ($cities as $city) {
            if ($city['city_name'] == 'Surabaya') {
                $origin_id = $city['city_id'];
                break;
            }
        }

        $cart_details = $cart->cart_detail;
        $total_weight = $cart_details->sum('weight');

        $responseCost = Http::withHeaders([
            'key' => config(key: 'rajaongkir.api_key'),
        ])->post('https://pro.rajaongkir.com/api/cost', [
            'origin' => $origin_id,
            'originType' => 'city',
            'destination' => $request->city,
            'destinationType' => 'city',
            'weight' => $total_weight,
            'courier' => $courier
        ]);
        $costs = $responseCost['rajaongkir'];

        if (!$coupon) {
            Session::put('costs', $costs);
            return redirect()->back()->withErrors([
                'incorrectCoupon_error' => 'Oops, kupon yang anda masukkan masih salah!'
            ]);
        }

        $user_coupon = UserCoupon::where('user_id', Auth::user()->id)->where('coupon_id', $coupon->id)->first();

        if ($user_coupon) {
            Session::put('costs', $costs);
            return redirect()->back()->withErrors([
                'alreadyAddCoupon_error' => "Oops, kupon {$coupon->title} sudah jadi milik anda!"
            ]);
        }

        UserCoupon::create([
            "user_id" => Auth::user()->id,
            "coupon_id" => $coupon->id,
            "quantity" => $coupon->initial_quantity
        ]);

        return back()->with([
            'correctCoupon_success' => "Selamat! Kupon {$coupon->title} jadi milik anda!",
            'costs' => $costs
        ]);
    }

    public function chooseCoupon(Request $request, $id)
    {
        // Save address data to session
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.city', $request->city);
        $request->session()->put('checkout.note', $request->note);

        // Fetch user's cart
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $courier = $cart ? $cart->courier : null;

        // Check for city and courier
        if (!$request->city && !$courier) {
            return redirect()->back()->withErrors(['couriercityForgotten_error' => "Oops, anda lupa memilih jasa pengiriman dan kota tujuan!"]);
        }
        if (!$request->city) {
            return redirect()->back()->withErrors(['cityForgotten_error' => "Oops, anda lupa memilih kota tujuan!"]);
        }
        if (!$courier) {
            return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"]);
        }

        // Fetch coupon and user coupon data
        $coupon = Coupon::findOrFail($id);
        $user_coupon = $coupon->usercoupon->where('user_id', Auth::user()->id)->where("coupon_id", $id)->first();

        // Fetch cart details
        $cart_details = $cart->cart_detail;

        // Fetch city data from RajaOngkir API
        $responseCities = Http::withHeaders([
            'key' => config(key: 'rajaongkir.api_key')
        ])->get('https://pro.rajaongkir.com/api/city');
        $cities = $responseCities['rajaongkir']['results'];

        $origin_id = null;
        foreach ($cities as $city) {
            if ($city['city_name'] == 'Surabaya') {
                $origin_id = $city['city_id'];
                break;
            }
        }

        // Calculate total weight of cart
        $total_weight = $cart_details->sum('weight');

        // Fetch shipping cost from RajaOngkir API
        $responseCost = Http::withHeaders([
            'key' => config(key: 'rajaongkir.api_key'),
        ])->post('https://pro.rajaongkir.com/api/cost', [
            'origin' => $origin_id,
            'originType' => 'city',
            'destination' => $request->city,
            'destinationType' => 'city',
            'weight' => $total_weight,
            'courier' => $courier
        ]);
        $costs = $responseCost['rajaongkir'];

        // If the coupon is already active, deactivate it
        if (Session::has('couponStatus_' . $id)) {
            foreach ($cart_details as $cart_detail) {
                // Restore original price if it was stored in the session
                $originalPriceKey = 'originalPrice_' . $cart_detail->id;
                if (Session::has($originalPriceKey)) {
                    $originalPrice = Session::get($originalPriceKey);
                    $cart_detail->update(['price' => $originalPrice]);
                    Session::forget($originalPriceKey); // Clear the stored original price
                }
            }

            // Increase user coupon quantity back
            $user_coupon->update(['quantity' => $user_coupon->quantity + 1]);

            // Remove the coupon status from the session
            Session::forget('couponStatus_' . $id);
            Session::put('activeCoupons', array_diff(Session::get('activeCoupons', []), [$id]));

            return back()->with([
                'useCoupon_success' => "Kupon {$coupon->title} tidak jadi dipakai!",
                'costs' => $costs
            ]);
        } else {
            // Deactivate any other active coupons
            $activeCouponsStatus = Session::get('activeCoupons', []);
            foreach ($activeCouponsStatus as $couponStatus) {
                if ($couponStatus != $id) {
                    $activeCoupon = Coupon::findOrFail($couponStatus);
                    $activeUserCoupon = $activeCoupon->usercoupon->where('user_id', Auth::user()->id)->where("coupon_id", $couponStatus)->first();

                    foreach ($cart_details as $cart_detail) {
                        $originalPriceKey = 'originalPrice_' . $cart_detail->id;
                        if (Session::has($originalPriceKey)) {
                            $originalPrice = Session::get($originalPriceKey);
                            $cart_detail->update(['price' => $originalPrice]);
                            Session::forget($originalPriceKey);
                        }
                    }

                    $activeUserCoupon->update(['quantity' => $activeUserCoupon->quantity + 1]);

                    Session::forget('couponStatus_' . $couponStatus);
                }
            }

            // Clear all active coupons
            Session::forget('activeCoupons');

            // Apply the new coupon if valid
            $now = Carbon::now();
            if ($now >= $coupon->starting_time && $now <= $coupon->ending_time && $user_coupon->quantity > 0) {
                foreach ($cart_details as $cart_detail) {
                    $originalPriceKey = 'originalPrice_' . $cart_detail->id;
                    if (!Session::has($originalPriceKey)) {
                        Session::put($originalPriceKey, $cart_detail->price);
                    }
                    $cart_detail->update([
                        'price' => $cart_detail->price - ($cart_detail->price * ($coupon->discount / 100))
                    ]);
                }

                $user_coupon->update(['quantity' => $user_coupon->quantity - 1]);

                Session::put('couponStatus_' . $id, true);
                Session::push('activeCoupons', $id);

                return back()->with([
                    'useCoupon_success' => "Selamat! Anda mendapatkan potongan sebesar {$coupon->discount}%!",
                    'costs' => $costs
                ]);
            } elseif ($user_coupon->quantity == 0) {
                return redirect()->back()->withErrors([
                    'couponExpired_error' => "Oops, kupon {$coupon->title} sudah habis!"
                ]);
            } else {
                return redirect()->back()->withErrors([
                    'couponExpired_error' => "Oops, kupon {$coupon->title} sudah kedaluwarsa!"
                ]);
            }
        }
    }

    public function activatePoint(Request $request)
    {
        // dd($request->city, $request->courier);
        // Simpan data alamat ke session
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.city', $request->city);
        // $request->session()->put('checkout.province', $request->province);
        // $request->session()->put('checkout.postal_code', $request->postal_code);
        $request->session()->put('checkout.note', $request->note);

        // Ambil data keranjang pengguna
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $courier = $cart ? $cart->courier : null;

        // Pengecekan kondisi untuk city dan courier
        if (!$request->city && !$courier) {
            return redirect()->back()->withErrors(['couriercityForgotten_error' => "Oops, anda lupa memilih jasa pengiriman dan kota tujuan!"]);
        }
        if (!$request->city) {
            return redirect()->back()->withErrors(['cityForgotten_error' => "Oops, anda lupa memilih kota tujuan!"]);
        }
        if (!$courier) {
            return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"]);
        }

        $user = User::where('id', Auth::user()->id)->first();
        $point = Point::first();
        $reward = $user->reward * $point->money_per_poin;

        $sub_total = $cart->cart_detail->sum('price');
        $total_price = $sub_total + $cart->shipment_price + $cart->admin_fee;

        if ($reward >= $total_price) {
            $difference = $total_price;
        } else {
            $difference = $reward;
        }

        $responseCities = Http::withHeaders([
            'key' => config(key: 'rajaongkir.api_key')
        ])->get('https://pro.rajaongkir.com/api/city');
        $cities = $responseCities['rajaongkir']['results'];

        $origin_id = null;
        foreach ($cities as $city) {
            if ($city['city_name'] == 'Surabaya') {
                $origin_id = $city['city_id'];
                break;
            }
        }

        $cart_details = $cart->cart_detail;
        $total_weight = $cart_details->sum('weight');

        $responseCost = Http::withHeaders([
            'key' => config(key: 'rajaongkir.api_key'),
        ])->post('https://pro.rajaongkir.com/api/cost', [
            'origin' => $origin_id,
            'originType' => 'city',
            'destination' => $request->city,
            'destinationType' => 'city',
            'weight' => $total_weight,
            'courier' => $courier
        ]);
        $costs = $responseCost['rajaongkir'];

        if (Session::has('pointStatus')) {
            Session::forget('pointStatus');
            return back()->with([
                'activatePoint_success' => "Poin tidak jadi dipakai!",
                'costs' => $costs
            ]);
        } else {
            Session::put('pointStatus', true);
            return back()->with([
                'activatePoint_success' => "Selamat! Anda mendapatkan potongan sebesar Rp. " . number_format($difference, 0, ',', '.') . "!",
                'costs' => $costs
            ]);
        }
    }

    public function checkShipmentPrice(Request $request)
    {
        // dd($request->courier);
        // Simpan data alamat ke session
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.city', $request->city);
        $request->session()->put('checkout.note', $request->note);

        if (!$request->city) {
            return redirect()->back()->withErrors(['cityForgotten_error' => "Oops, anda lupa memilih kota tujuan!"]);
        } else {
            if (!$request->courier) {
                $courierStatus_lion = Session::get('courierStatus_lion');
                $courierStatus_anteraja = Session::get('courierStatus_anteraja');
                if ($courierStatus_lion) {
                    Session::forget('courierStatus_lion');
                }
                if ($courierStatus_anteraja) {
                    Session::forget('courierStatus_anteraja');
                }
                return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"]);
            } else {
                $responseCities = Http::withHeaders([
                    'key' => config(key: 'rajaongkir.api_key')
                ])->get('https://pro.rajaongkir.com/api/city');
                $cities = $responseCities['rajaongkir']['results'];

                $origin_id = null;
                foreach ($cities as $city) {
                    if ($city['city_name'] == 'Surabaya') {
                        $origin_id = $city['city_id'];
                        break;
                    }
                }

                $cart = Cart::where('user_id', Auth::user()->id)->first();
                $cart->update([
                    'courier' => $request->courier
                ]);
                $cart_details = $cart->cart_detail;
                $total_weight = $cart_details->sum('weight');

                $responseCost = Http::withHeaders([
                    'key' => config(key: 'rajaongkir.api_key'),
                ])->post('https://pro.rajaongkir.com/api/cost', [
                    'origin' => $origin_id,
                    'originType' => 'city',
                    'destination' => $request->city,
                    'destinationType' => 'city',
                    'weight' => $total_weight,
                    'courier' => $request->courier
                ]);
                $costs = $responseCost['rajaongkir'];

                if (!empty($costs['results'])) {
                    // Periksa apakah costs di dalam results kosong
                    $allCostsEmpty = true;
                    foreach ($costs['results'] as $result) {
                        if (!empty($result['costs'])) {
                            $allCostsEmpty = false;
                            break;
                        }
                    }

                    if ($allCostsEmpty) {
                        return back()->withErrors([
                            'service_NOTAVAILABLE' => 'Layanan pengiriman tidak tersedia! Mohon memilih jasa pengiriman yang lain!'
                        ]);
                    } else {
                        Session::push('arraycourierStatus', $request->courier);
                        Session::put('courierStatus_' . $request->courier, true);

                        $activeCouriersStatus = Session::get('arraycourierStatus', []);
                        foreach ($activeCouriersStatus as $courierStatus) {
                            if ($courierStatus != $request->courier) {
                                Session::put('arraycourierStatus', array_diff(Session::get('arraycourierStatus', []), [$courierStatus]));
                                Session::forget('courierStatus_' . $courierStatus);
                            }
                        }

                        return back()->with([
                            'costs' => $costs,
                            'courier' => $request->courier
                        ]);
                    }
                } else {
                    return back()->withErrors([
                        'service_NOTAVAILABLE' => 'Layanan pengiriman tidak tersedia! Mohon memilih jasa pengiriman yang lain!'
                    ]);
                }
            }
        }
    }

    public function chooseShipmentPrice(Request $request, $id)
    {
        // Simpan data alamat ke session
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.city', $request->city);
        $request->session()->put('checkout.note', $request->note);

        $responseCities = Http::withHeaders([
            'key' => config(key: 'rajaongkir.api_key')
        ])->get('https://pro.rajaongkir.com/api/city');
        $cities = $responseCities['rajaongkir']['results'];

        $origin_id = null;
        foreach ($cities as $city) {
            if ($city['city_name'] == 'Surabaya') {
                $origin_id = $city['city_id'];
                break;
            }
        }

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cart_details = $cart->cart_detail;
        $total_weight = $cart_details->sum('weight');

        $responseCost = Http::withHeaders([
            'key' => config(key: 'rajaongkir.api_key'),
        ])->post('https://pro.rajaongkir.com/api/cost', [
            'origin' => $origin_id,
            'originType' => 'city',
            'destination' => $request->city,
            'destinationType' => 'city',
            'weight' => $total_weight,
            'courier' => $request->courier
        ]);
        $costs = $responseCost['rajaongkir'];

        $shipmentPrice = null;
        $serviceName = null;
        $serviceDescription = null;
        foreach ($costs['results'] as $cost) {
            foreach ($cost['costs'] as $index => $cost_detail) {
                $serviceName = $cost_detail['service'];
                $serviceDescription = $cost_detail['description'];
                if ($index == $id) {
                    foreach ($cost_detail['cost'] as $service) {
                        $shipmentPrice = $service['value'];
                        break;
                    }
                    break;
                }
            }
        }

        $cart->update([
            "shipment_price" => $shipmentPrice
        ]);

        $city = $request->city; // Dapatkan city dari request
        $sessionKey = 'costStatus_' . $id . '_' . $city . '_' . $request->courier; // Buat kunci unik untuk session

        Session::push('arraycostStatus', $sessionKey);
        Session::put($sessionKey, true);

        $activeCostStatus = Session::get('arraycostStatus', []);
        foreach ($activeCostStatus as $costStatus) {
            if ($costStatus != $sessionKey) {
                Session::put('arraycostStatus', array_diff($activeCostStatus, [$costStatus]));
                Session::forget($costStatus);
            }
        }

        return redirect()->route('member.checkout')->with([
            'chooseShipmentPrice_success',
            "Anda memilih {$serviceName} ({$serviceDescription})!",
            'costs' => $costs
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        if (!$cart) {
            return redirect()->route('products')->with('checkout_cancel', 'Oops! Keranjang anda kosong!');
        } else {
            $products_bestseller = OrderDetail::select('product_id', DB::raw('SUM(quantity) as total_quantity'))
                ->groupBy('product_id')
                ->orderByDesc('total_quantity')
                ->take(4)
                ->get();
            $shipment_price = $cart->shipment_price;
            $admin_fee = $cart->admin_fee;

            $address = Address::where('user_id', Auth::user()->id)->get();

            $coupons = Coupon::all();
            $user_coupons = UserCoupon::where('user_id', Auth::user()->id)->get();

            // REWARD POIN SYSTEM
            $point = Point::first();
            if ($point) {
                $total_price = $cart->cart_detail->sum('price');
                $total_poin = $total_price * ($point->percentage_from_totalprice / 100);

                // Membulatkan ke bawah ke kelipatan 1000 terdekat
                $total_poin = floor($total_poin / 10) * 10; // Membulatkan ke kelipatan 10
                $poin_to_money = $total_poin * $point->money_per_poin;

                $cart->update([
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

            $responseCities = Http::withHeaders([
                'key' => config(key: 'rajaongkir.api_key')
            ])->get('https://pro.rajaongkir.com/api/city');
            $cities = $responseCities['rajaongkir']['results'];

            return view('customer.checkout', [
                "TabTitle" => "Checkout",
                "active_2" => "text-yellow-500 rounded md:bg-transparent md:p-0",
                "products_bestseller" => $products_bestseller,
                "carts" => $cart->cart_detail,
                "shipment_price" => $shipment_price,
                "addresses" => $address,
                "coupons" => $coupons,
                "user_coupons" => $user_coupons,
                "total_poin" => $total_poin,
                "total_money" => $poin_to_money,
                "reward_now" => $reward_now,
                "point" => $point,
                "cities" => $cities,
                "admin_fee" => $admin_fee,
            ]);
        }
    }

    public function show_orderhistory()
    {
        $orders = Order::where('user_id', Auth::user()->id)
            ->where('acceptbyAdmin_status', 'paid')
            ->orderByDesc('id')
            ->paginate(4);

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

        if ($orders->isEmpty()) {
            return redirect()->route('products')->with('empty_order', 'Oops! Anda belum belanja sama sekali!');
        }

        $shipment_histories = [];

        foreach ($orders as $order) {
            $courier = '';
            $waybill = $order->waybill;

            if ($waybill) {
                if (stripos($order->shipment_service, 'Lion') !== false) {
                    $courier = 'lion';
                } elseif (stripos($order->shipment_service, 'AnterAja') !== false) {
                    $courier = 'anteraja';
                }

                $responseWaybills = Http::withHeaders([
                    'key' => config(key: 'rajaongkir.api_key'),
                ])->post('https://pro.rajaongkir.com/api/waybill', [
                    'waybill' => $waybill,
                    'courier' => $courier,
                ]);

                $responseJson = $responseWaybills->json();

                if (isset($responseJson['rajaongkir']['status']['code']) && $responseJson['rajaongkir']['status']['code'] !== 200) {
                    return redirect()->back()->withErrors([
                        'waybillNotValid_error' => 'Nomor resi tidak valid atau informasi pengiriman tidak ditemukan!'
                    ]);
                }

                $waybills = $responseWaybills['rajaongkir']['result'];

                if (!empty($waybills['manifest'])) {
                    $shipment_histories[$order->id] = $waybills['manifest'];
                }

                if (!empty($waybills['summary']['status'])) {
                    $order->update([
                        'shipment_status' => $waybills['summary']['status']
                    ]);
                }

                if (!empty($waybills['details']['waybill_date']) && !empty($waybills['details']['waybill_time'])) {
                    $order->update([
                        'shipment_date' => $waybills['details']['waybill_date'] . ' ' . $waybills['details']['waybill_time'],
                    ]);
                }

                if (!empty($waybills['delivery_status']['pod_date']) && !empty($waybills['delivery_status']['pod_time'])) {
                    $order->update([
                        'arrived_date' => $waybills['delivery_status']['pod_date'] . ' ' . $waybills['delivery_status']['pod_time'],
                        'acceptbyCustomer_status' => 'sudah'
                    ]);
                }
            }
        }

        return view('customer.orderhistory', [
            "TabTitle" => "Riwayat Pemesanan",
            "active_history" => "text-yellow-500 rounded md:bg-transparent md:p-0",
            "pageTitle" => '<mark class="px-2 text-yellow-500 bg-gray-900 rounded">Riwayat</mark> Pemesanan',
            'pageDescription' => 'Lacak pesanan anda <span class="underline underline-offset-2 decoration-4 decoration-yellow-500">di sini!</span>',
            "orders" => $orders,
            "carts" => $carts,
            "shipment_histories" => $shipment_histories,
            "shipment_price" => $shipment_price,
            "admin_fee" => $admin_fee,
            "reward_now" => $reward_now,
            "point" => $point
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
        // Simpan data alamat ke session
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.city', $request->city);
        $request->session()->put('checkout.note', $request->note);

        $validatedData = $request->validate([
            'address_id' => 'required_without:address|integer',
            'address' => 'required_if:address_id,0|string|nullable|max:100',
            'destination_city' => 'required',
            // 'province' => 'required|string|max:50',
            // 'postal_code' => 'required|numeric',
            'note' => 'nullable|string|max:255',
            // 'payment_upload' => 'required|image|file|max:5000',
            'total_poin' => 'required|numeric',
            'reward_now' => 'numeric'
        ], [
            'address_id.required_without' => 'Alamat Pengiriman wajib diisi!',
            'address.required_if' => 'Alamat Pengiriman wajib diisi!',
            'address.max' => 'Maksimal :max karakter!',
            'destination_city.required' => 'Kota wajib diisi!',
            // 'city.string' => 'Kota wajib berupa karakter!',
            // 'city.max' => 'Maksimal :max karakter!',
            // 'province.required' => 'Provinsi wajib diisi!',
            // 'province.string' => 'Provinsi wajib berupa karakter!',
            // 'province.max' => 'Maksimal :max karakter!',
            // 'postal_code.required' => 'Kode Pos wajib diisi!',
            // 'postal_code.numeric' => 'Kode Pos wajib berupa angka!',
            'note.max' => 'Maksimal :max karakter!',
            // 'payment_upload.required' => 'Mohon upload bukti pembayaran anda!',
            // 'payment_upload.image' => 'File wajib berupa gambar!',
            // 'payment_upload.max' => 'Maksimal ukuran gambar 5MB!',
            'total_poin.required' => 'Total poin wajib diisi!',
            'total_poin.numeric' => 'Total poin wajib berupa angka!',
            'reward_now.numeric' => 'Total reward sekarang wajib berupa angka!',
        ]);

        if (!$request->courier) {
            return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"]);
        }

        $order_date = now();

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cart_details = $cart->cart_detail;
        $total_weight = $cart_details->sum('weight');
        $shipment_price = $cart->shipment_price;
        $admin_fee = $cart->admin_fee;

        $customer = User::where('id', Auth::user()->id)->first();
        $point = Point::first();

        $responseCities = Http::withHeaders([
            'key' => config(key: 'rajaongkir.api_key')
        ])->get('https://pro.rajaongkir.com/api/city');
        $cities = $responseCities['rajaongkir']['results'];

        $customer_city = null;
        $customer_province = null;
        $customer_postal_code = null;
        foreach ($cities as $city) {
            if ($city['city_id'] == $request->destination_city) {
                $customer_city = $city['city_name'];
                $customer_province = $city['province'];
                $customer_postal_code = $city['postal_code'];
                break;
            }
        }

        $origin_id = null;
        foreach ($cities as $city) {
            if ($city['city_name'] == 'Surabaya') {
                $origin_id = $city['city_id'];
                break;
            }
        }

        $responseCost = Http::withHeaders([
            'key' => config(key: 'rajaongkir.api_key'),
        ])->post('https://pro.rajaongkir.com/api/cost', [
            'origin' => $origin_id,
            'originType' => 'city',
            'destination' => $request->destination_city,
            'destinationType' => 'city',
            'weight' => $total_weight,
            'courier' => $request->courier
        ]);
        $costs = $responseCost['rajaongkir'];

        $courierName = null;
        $serviceName = null;
        $shipment_estimation = null;
        $shipment_price_check = null;
        foreach ($costs['results'] as $cost) {
            if ($cost['code'] == $request->courier) {
                $courierName = $cost['name'];
                foreach ($cost['costs'] as $index => $cost_detail) {
                    if ($request->service == $cost_detail['service']) {
                        $serviceName = $cost_detail['service'];
                        foreach ($cost_detail['cost'] as $cost_value) {
                            if ($request->service == $cost_detail['service']) {
                                $shipment_price_check = $cost_value['value'];
                                $shipment_estimation = $cost_value['etd'];
                                break; // Keluar dari loop paling dalam
                            }
                        }
                        break; // Keluar dari loop tengah
                    }
                }
                break; // Keluar dari loop terluar
            }
        }

        // dd($shipment_price_check, $cart->shipment_price);
        if ($shipment_price_check != $shipment_price) {
            Session::put('costs', $costs);
            return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"]);
        }

        $shipment_service = $courierName . ', ' . $serviceName;

        if (Session::has('pointStatus')) {
            $total_price_beforeReward = $cart_details->sum('price') + $shipment_price + $admin_fee;
            $reward_now = $validatedData['reward_now'];
            if ($reward_now >= $total_price_beforeReward) {
                $total_price = 0;
                $convertReward_toPoint = round(($total_price_beforeReward - $reward_now) / $point->money_per_poin);
                $customer->update([
                    'reward' => $convertReward_toPoint,
                    'old_reward' => $reward_now / 30
                ]);
            } else {
                $total_price =  $total_price_beforeReward - $reward_now;
                $customer->update([
                    'reward' => 0,
                    'old_reward' => $reward_now / 30
                ]);
            }
        } else {
            $total_price = $cart_details->sum('price') + $shipment_price + $admin_fee;
        }

        // if ($request->file('payment_upload')) {
        //     $validatedData['payment'] = $request->file('payment_upload')->store('bukti_transfer', ['disk' => 'public']);
        // }

        $midtrans_order_id = rand();
        if ($validatedData['address_id']) {
            $address = Address::find($validatedData['address_id']);
            if ($validatedData['note']) {
                $order = Order::create([
                    'user_id' => Auth::user()->id,
                    'address_id' => $validatedData['address_id'],
                    'midtrans_order_id' => $midtrans_order_id,
                    'order_date' => $order_date,
                    'total_price' => $total_price,
                    'total_weight' => $total_weight,
                    'payment' => 'online',
                    'note' => $validatedData['note'],
                    'shipment_service' => $shipment_service,
                    'shipment_estimation' => $shipment_estimation,
                    'shipment_price' => $shipment_price_check,
                ]);
            } else {
                $order = Order::create([
                    'user_id' => Auth::user()->id,
                    'address_id' => $validatedData['address_id'],
                    'midtrans_order_id' => $midtrans_order_id,
                    'order_date' => $order_date,
                    'total_price' => $total_price,
                    'total_weight' => $total_weight,
                    'payment' => 'online',
                    'shipment_service' => $shipment_service,
                    'shipment_estimation' => $shipment_estimation,
                    'shipment_price' => $shipment_price_check,
                ]);
            }
        } else {
            $address = Address::create([
                'user_id' => Auth::user()->id,
                'address' => $validatedData['address'],
                'midtrans_order_id' => $midtrans_order_id,
                'city' => $customer_city,
                'city_id' => $request->city,
                'province' => $customer_province,
                'postal_code' => $customer_postal_code
            ]);
            if ($validatedData['note']) {
                $order = Order::create([
                    'user_id' => Auth::user()->id,
                    'address_id' => $address->id,
                    'midtrans_order_id' => $midtrans_order_id,
                    'order_date' => $order_date,
                    'total_price' => $total_price,
                    'total_weight' => $total_weight,
                    'payment' => 'online',
                    'note' => $validatedData['note'],
                    'shipment_service' => $shipment_service,
                    'shipment_estimation' => $shipment_estimation,
                    'shipment_price' => $shipment_price_check,
                ]);
            } else {
                $order = Order::create([
                    'user_id' => Auth::user()->id,
                    'address_id' => $address->id,
                    'midtrans_order_id' => $midtrans_order_id,
                    'order_date' => $order_date,
                    'total_price' => $total_price,
                    'total_weight' => $total_weight,
                    'payment' => 'online',
                    'shipment_service' => $shipment_service,
                    'shipment_estimation' => $shipment_estimation,
                    'shipment_price' => $shipment_price_check,
                ]);
            }
        }

        foreach ($cart_details as $cart_detail) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $cart_detail->product_id,
                'quantity' => $cart_detail->quantity,
                'price' => $cart_detail->price,
                'weight' => $cart_detail->weight
            ]);
        }

        // Mempersiapkan item_details dinamis
        $item_details = [];
        foreach ($cart_details as $cart_detail) {
            $item_details[] = [
                'id' => $cart_detail->product_id,
                'price' => $cart_detail->price / $cart_detail->quantity,
                'quantity' => $cart_detail->quantity,
                'name' => $cart_detail->product->name, // Asumsi Anda memiliki relasi produk
            ];
        }

        // Tambahkan biaya pengiriman sebagai item terpisah
        $item_details[] = [
            'id' => 'SHIPPING_COST',
            'price' => $shipment_price,
            'quantity' => 1,
            'name' => 'Shipping Cost'
        ];

        // Tambahkan biaya admin sebagai item terpisah
        $item_details[] = [
            'id' => 'ADMIN_FEE',
            'price' => $admin_fee,
            'quantity' => 1,
            'name' => 'Admin Fee'
        ];

        // Tambahkan item diskon berdasarkan poin jika ada pointStatus
        if (Session::has('pointStatus')) {
            Session::forget('pointStatus');
            $item_details[] = [
                'id' => 'POINT_DISCOUNT',
                'price' => -$reward_now, // Nilai diskon negatif
                'quantity' => 1,
                'name' => 'Point Discount'
            ];
        }

        // Siapkan parameter untuk Midtrans
        $params = [
            'transaction_details' => [
                'order_id' => $order->midtrans_order_id,
                'gross_amount' => $total_price,
            ],
            'item_details' => $item_details,
            'customer_details' => [
                'first_name' => $customer->name,
                'last_name' => "",
                'email' => $customer->email,
                'phone' => $customer->phone_number,
                'billing_address' => [
                    'first_name' => $customer->name,
                    'last_name' => "",
                    'email' => $customer->email,
                    'phone' => $customer->phone_number,
                    'address' => $address->address,
                    'city' => $address->city,
                    'postal_code' => $address->postal_code,
                    'country_code' => ""
                ],
                'shipping_address' => [
                    'first_name' => $customer->name,
                    'last_name' => "",
                    'email' => $customer->email,
                    'phone' => $customer->phone_number,
                    'address' => $address->address,
                    'city' => $address->city,
                    'postal_code' => $address->postal_code,
                    'country_code' => ""
                ]
            ],
        ];

        if ($total_price != 0) {
            try {
                $paymentUrl = Snap::createTransaction($params)->redirect_url;
                return redirect($paymentUrl);
            } catch (\Exception $e) {
                Session::put('costs', $costs);
                return back()->withErrors([
                    'paymentUrl_ERROR' => 'Error saat melakukan proses pembayaran! Silahkan menghubungi Lisahwan™ (082230308030)!'
                ]);
            }
        } elseif ($total_price == 0) {
            $order->update([
                'acceptbyAdmin_status' => 'paid'
            ]);
            $customer->update([
                'reward' => $customer->reward + $validatedData['total_poin']
            ]);
            if ($cart) {
                // Hapus semua sesi yang terkait dengan couponStatus
                $activeCoupons = Session::get('activeCoupons', []);
                foreach ($activeCoupons as $couponId) {
                    if (Session::has('couponStatus_' . $couponId)) {
                        Session::forget('couponStatus_' . $couponId);
                    }
                }
                // Hapus sesi activeCoupons
                if (Session::has('activeCoupons')) {
                    Session::forget('activeCoupons');
                }
                // Hapus semua sesi yang terkait dengan arraycourierStatus
                $activeCouriersStatus = Session::get('arraycourierStatus', []);
                foreach ($activeCouriersStatus as $courierStatus) {
                    if (Session::has('courierStatus_' . $courierStatus)) {
                        Session::forget('courierStatus_' . $courierStatus);
                    }
                }
                // Hapus sesi arraycourierStatus
                if (Session::has('arraycourierStatus')) {
                    Session::forget('arraycourierStatus');
                }
                // Mendapatkan semua sesi yang terkait dengan arraycostStatus
                $activeCostStatus = Session::get('arraycostStatus', []);
                // Menghapus semua sesi yang terkait dengan arraycostStatus
                foreach ($activeCostStatus as $costStatus) {
                    if (Session::has($costStatus)) {
                        Session::forget($costStatus); // Hapus sesi berdasarkan kunci yang disimpan
                    }
                }
                // Hapus sesi arraycostStatus
                if (Session::has('arraycostStatus')) {
                    Session::forget('arraycostStatus');
                }
                // Hapus sesi originalPrice yang mungkin ada
                foreach ($cart->cart_detail as $cart_detail) {
                    if (Session::has('originalPrice_' . $cart_detail->id)) {
                        Session::forget('originalPrice_' . $cart_detail->id);
                    }
                }
            }
            if (Session::has('checkout.address_id')) {
                Session::forget('checkout.address_id');
            }
            if (Session::has('checkout.address')) {
                Session::forget('checkout.address');
            }
            if (Session::has('checkout.city')) {
                Session::forget('checkout.city');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            $cart->delete();
            return redirect()->route('member.orderhistory')->with('capturePayment_SUCCESSFULL', "Pesanan anda berhasil! Tinjau status pesanan anda disini!");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $order = Order::where('id', $id)->first();
        $arrived_date = now();
        $order->update([
            'arrived_date' => $arrived_date,
            'acceptbyCustomer_status' => 'sudah'
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
