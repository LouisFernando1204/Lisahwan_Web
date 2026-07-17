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
    public function getCities($province_id)
    {
        $response = Http::withHeaders([
            'key' => config('rajaongkir.api_key')
        ])->get('https://rajaongkir.komerce.id/api/v1/destination/city/' . $province_id);

        $data = $response->json();

        return response()->json($data['data'] ?? []);
    }

    public function getDistricts($city_id)
    {
        $response = Http::withHeaders([
            'key' => config('rajaongkir.api_key')
        ])->get('https://rajaongkir.komerce.id/api/v1/destination/district/' . $city_id);

        $data = $response->json();

        return response()->json($data['data'] ?? []);
    }

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
            if (Session::has('checkout.city_id')) {
                Session::forget('checkout.city_id');
            }
            if (Session::has('checkout.province_id')) {
                Session::forget('checkout.province_id');
            }
            if (Session::has('checkout.district_id')) {
                Session::forget('checkout.district_id');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            if (Session::has('checkout.courier')) {
                Session::forget('checkout.courier');
            }
            if (Session::has('checkout.service')) {
                Session::forget('checkout.service');
            }
            if (Session::has('costs')) {
                Session::forget('costs');
            }
            if (Session::has('pointStatus')) {
                Session::forget('pointStatus');
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
            if (Session::has('checkout.city_id')) {
                Session::forget('checkout.city_id');
            }
            if (Session::has('checkout.province_id')) {
                Session::forget('checkout.province_id');
            }
            if (Session::has('checkout.district_id')) {
                Session::forget('checkout.district_id');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            if (Session::has('checkout.courier')) {
                Session::forget('checkout.courier');
            }
            if (Session::has('checkout.service')) {
                Session::forget('checkout.service');
            }
            if (Session::has('costs')) {
                Session::forget('costs');
            }
            if (Session::has('pointStatus')) {
                Session::forget('pointStatus');
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
            if (Session::has('checkout.city_id')) {
                Session::forget('checkout.city_id');
            }
            if (Session::has('checkout.province_id')) {
                Session::forget('checkout.province_id');
            }
            if (Session::has('checkout.district_id')) {
                Session::forget('checkout.district_id');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            if (Session::has('checkout.courier')) {
                Session::forget('checkout.courier');
            }
            if (Session::has('checkout.service')) {
                Session::forget('checkout.service');
            }
            if (Session::has('costs')) {
                Session::forget('costs');
            }
            if (Session::has('pointStatus')) {
                Session::forget('pointStatus');
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
            if (Session::has('checkout.city_id')) {
                Session::forget('checkout.city_id');
            }
            if (Session::has('checkout.province_id')) {
                Session::forget('checkout.province_id');
            }
            if (Session::has('checkout.district_id')) {
                Session::forget('checkout.district_id');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            if (Session::has('checkout.courier')) {
                Session::forget('checkout.courier');
            }
            if (Session::has('checkout.service')) {
                Session::forget('checkout.service');
            }
            if (Session::has('costs')) {
                Session::forget('costs');
            }
            if (Session::has('pointStatus')) {
                Session::forget('pointStatus');
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
            if (Session::has('checkout.city_id')) {
                Session::forget('checkout.city_id');
            }
            if (Session::has('checkout.province_id')) {
                Session::forget('checkout.province_id');
            }
            if (Session::has('checkout.district_id')) {
                Session::forget('checkout.district_id');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            if (Session::has('checkout.courier')) {
                Session::forget('checkout.courier');
            }
            if (Session::has('checkout.service')) {
                Session::forget('checkout.service');
            }
            if (Session::has('costs')) {
                Session::forget('costs');
            }
            if (Session::has('pointStatus')) {
                Session::forget('pointStatus');
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
            if (Session::has('checkout.city_id')) {
                Session::forget('checkout.city_id');
            }
            if (Session::has('checkout.province_id')) {
                Session::forget('checkout.province_id');
            }
            if (Session::has('checkout.district_id')) {
                Session::forget('checkout.district_id');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            if (Session::has('checkout.courier')) {
                Session::forget('checkout.courier');
            }
            if (Session::has('checkout.service')) {
                Session::forget('checkout.service');
            }
            if (Session::has('costs')) {
                Session::forget('costs');
            }
            if (Session::has('pointStatus')) {
                Session::forget('pointStatus');
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
            if (Session::has('checkout.city_id')) {
                Session::forget('checkout.city_id');
            }
            if (Session::has('checkout.province_id')) {
                Session::forget('checkout.province_id');
            }
            if (Session::has('checkout.district_id')) {
                Session::forget('checkout.district_id');
            }
            if (Session::has('checkout.note')) {
                Session::forget('checkout.note');
            }
            if (Session::has('checkout.courier')) {
                Session::forget('checkout.courier');
            }
            if (Session::has('checkout.service')) {
                Session::forget('checkout.service');
            }
            if (Session::has('costs')) {
                Session::forget('costs');
            }
            if (Session::has('pointStatus')) {
                Session::forget('pointStatus');
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
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.province_id', $request->province_id);
        $request->session()->put('checkout.city_id', $request->city_id);
        $request->session()->put('checkout.district_id', $request->district_id);
        $request->session()->put('checkout.note', $request->note);

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $courier = $request->courier ?? ($cart ? $cart->courier : null);

        if (!$request->district_id && !$courier) {
            return redirect()->back()->withErrors(['courierDistrictForgotten_error' => "Oops, anda lupa memilih jasa pengiriman dan kecamatan tujuan!"])->withInput();
        }
        if (!$request->district_id) {
            return redirect()->back()->withErrors(['districtForgotten_error' => "Oops, anda lupa memilih kecamatan tujuan!"])->withInput();
        }
        if (!$courier) {
            return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"])->withInput();
        }

        $validatedData = $request->validate([
            "coupon" => "required|string|max:20",
        ], [
            'coupon.required' => 'Nama kupon wajib diisi!',
            'coupon.string' => 'Nama kupon wajib berupa karakter!',
            'coupon.max' => 'Nama kupon maksimal 20 karakter!',
        ]);

        $coupon = Coupon::where('title', $validatedData['coupon'])->first();

        $cart_details = $cart->cart_detail;
        $total_weight = $cart_details->sum('weight');
        $origin_district_id = 5902;
        $costs = [];

        try {
            $responseCost = Http::withHeaders([
                'key' => config('rajaongkir.api_key'),
                'Content-Type' => 'application/x-www-form-urlencoded'
            ])->asForm()->post('https://rajaongkir.komerce.id/api/v1/calculate/district/domestic-cost', [
                'origin' => $origin_district_id,
                'destination' => $request->district_id,
                'weight' => $total_weight,
                'courier' => $courier
            ]);

            $responseBody = $responseCost->json();
            if (isset($responseBody['meta']['code']) && $responseBody['meta']['code'] == 200) {
                $costs = $responseBody['data'] ?? [];
            }
        } catch (\Exception $e) {
            $costs = [];
        }

        if (!$coupon) {
            Session::put('costs', $costs);
            return redirect()->back()->withErrors([
                'incorrectCoupon_error' => 'Oops, kupon yang anda masukkan masih salah!'
            ])->withInput();
        }

        $user_coupon = UserCoupon::where('user_id', Auth::user()->id)->where('coupon_id', $coupon->id)->first();

        if ($user_coupon) {
            Session::put('costs', $costs);
            return redirect()->back()->withErrors([
                'alreadyAddCoupon_error' => "Oops, kupon {$coupon->title} sudah jadi milik anda!"
            ])->withInput();
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
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.province_id', $request->province_id);
        $request->session()->put('checkout.city_id', $request->city_id);
        $request->session()->put('checkout.district_id', $request->district_id);
        $request->session()->put('checkout.note', $request->note);

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $courier = $request->courier ?? ($cart ? $cart->courier : null);

        if (!$request->district_id && !$courier) {
            return redirect()->back()->withErrors(['courierDistrictForgotten_error' => "Oops, anda lupa memilih jasa pengiriman dan kecamatan tujuan!"])->withInput();
        }
        if (!$request->district_id) {
            return redirect()->back()->withErrors(['districtForgotten_error' => "Oops, anda lupa memilih kecamatan tujuan!"])->withInput();
        }
        if (!$courier) {
            return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"])->withInput();
        }

        $coupon = Coupon::findOrFail($id);
        $user_coupon = $coupon->usercoupon->where('user_id', Auth::user()->id)->where("coupon_id", $id)->first();
        $cart_details = $cart->cart_detail;

        $total_weight = $cart_details->sum('weight');
        $origin_district_id = 5902;
        $costs = [];

        try {
            $responseCost = Http::withHeaders([
                'key' => config('rajaongkir.api_key'),
                'Content-Type' => 'application/x-www-form-urlencoded'
            ])->asForm()->post('https://rajaongkir.komerce.id/api/v1/calculate/district/domestic-cost', [
                'origin' => $origin_district_id,
                'destination' => $request->district_id,
                'weight' => $total_weight,
                'courier' => $courier
            ]);

            $responseBody = $responseCost->json();
            if (isset($responseBody['meta']['code']) && $responseBody['meta']['code'] == 200) {
                $costs = $responseBody['data'] ?? [];
            }
        } catch (\Exception $e) {
            $costs = [];
        }

        if (Session::has('couponStatus_' . $id)) {
            foreach ($cart_details as $cart_detail) {
                // Restore harga asli
                $originalPriceKey = 'originalPrice_' . $cart_detail->id;
                if (Session::has($originalPriceKey)) {
                    $originalPrice = Session::get($originalPriceKey);
                    $cart_detail->update(['price' => $originalPrice]);
                    Session::forget($originalPriceKey);
                }
            }

            $user_coupon->update(['quantity' => $user_coupon->quantity + 1]);

            Session::forget('couponStatus_' . $id);
            Session::put('activeCoupons', array_diff(Session::get('activeCoupons', []), [$id]));

            return back()->with([
                'useCoupon_success' => "Kupon {$coupon->title} tidak jadi dipakai!",
                'costs' => $costs
            ]);
        } else {
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
            Session::forget('activeCoupons');

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
                ])->withInput();
            } else {
                return redirect()->back()->withErrors([
                    'couponExpired_error' => "Oops, kupon {$coupon->title} sudah kedaluwarsa!"
                ])->withInput();
            }
        }
    }

    public function activatePoint(Request $request)
    {
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.province_id', $request->province_id);
        $request->session()->put('checkout.city_id', $request->city_id);
        $request->session()->put('checkout.district_id', $request->district_id);
        $request->session()->put('checkout.note', $request->note);

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $courier = $request->courier ?? ($cart ? $cart->courier : null);

        if (!$request->district_id && !$courier) {
            return redirect()->back()->withErrors(['courierDistrictForgotten_error' => "Oops, anda lupa memilih jasa pengiriman dan kecamatan tujuan!"])->withInput();
        }
        if (!$request->district_id) {
            return redirect()->back()->withErrors(['districtForgotten_error' => "Oops, anda lupa memilih kecamatan tujuan!"])->withInput();
        }
        if (!$courier) {
            return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"])->withInput();
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

        $origin_district_id = 5902;
        $cart_details = $cart->cart_detail;
        $total_weight = $cart_details->sum('weight');
        $costs = [];

        try {
            $responseCost = Http::withHeaders([
                'key' => config('rajaongkir.api_key'),
                'Content-Type' => 'application/x-www-form-urlencoded'
            ])->asForm()->post('https://rajaongkir.komerce.id/api/v1/calculate/district/domestic-cost', [
                'origin' => $origin_district_id,
                'destination' => $request->district_id,
                'weight' => $total_weight,
                'courier' => $courier
            ]);

            $responseBody = $responseCost->json();

            if (isset($responseBody['meta']['code']) && $responseBody['meta']['code'] == 200) {
                $costs = $responseBody['data'] ?? [];
            } else {
                $costs = [];
            }
        } catch (\Exception $e) {
            $costs = [];
        }

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
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.province_id', $request->province_id);
        $request->session()->put('checkout.city_id', $request->city_id);
        $request->session()->put('checkout.district_id', $request->district_id);
        $request->session()->put('checkout.note', $request->note);

        if (!$request->district_id) {
            return redirect()->back()->withErrors(['districtForgotten_error' => "Oops, anda lupa memilih kecamatan tujuan!"])->withInput();
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
                return redirect()->back()->withErrors(['courierForgotten_error' => "Oops, anda lupa memilih jasa pengiriman yang akan digunakan!"])->withInput();
            } else {
                $origin_district_id = 5902;

                $cart = Cart::where('user_id', Auth::user()->id)->first();
                $cart->update(['courier' => $request->courier]);

                $cart_details = $cart->cart_detail;
                $total_weight = $cart_details->sum('weight');

                $responseCost = Http::withHeaders([
                    'key' => config('rajaongkir.api_key'),
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ])->asForm()->post('https://rajaongkir.komerce.id/api/v1/calculate/district/domestic-cost', [
                    'origin' => $origin_district_id,
                    'destination' => $request->district_id,
                    'weight' => $total_weight,
                    'courier' => $request->courier
                ]);

                $responseBody = $responseCost->json();

                if (isset($responseBody['meta']['code']) && $responseBody['meta']['code'] == 200) {
                    $costs = $responseBody['data'];

                    if (empty($costs)) {
                        return back()->withErrors([
                            'service_NOTAVAILABLE' => 'Layanan pengiriman tidak tersedia!'
                        ]);
                    }

                    Session::push('arraycourierStatus', $request->courier);
                    Session::put('courierStatus_' . $request->courier, true);

                    $activeCouriersStatus = Session::get('arraycourierStatus', []);
                    foreach ($activeCouriersStatus as $courierStatus) {
                        if ($courierStatus != $request->courier) {
                            Session::put('arraycourierStatus', array_diff(Session::get('arraycourierStatus', []), [$courierStatus]));
                            Session::forget('courierStatus_' . $courierStatus);
                        }
                    }

                    Session::put('costs', $costs);
                    return back()->with([
                        'courier' => $request->courier
                    ]);
                } else {
                    return back()->withErrors([
                        'service_NOTAVAILABLE' => 'Gagal terhubung ke API RajaOngkir atau parameter salah.'
                    ]);
                }
            }
        }
    }

    public function chooseShipmentPrice(Request $request, $id)
    {
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.province_id', $request->province_id);
        $request->session()->put('checkout.city_id', $request->city_id);
        $request->session()->put('checkout.district_id', $request->district_id);
        $request->session()->put('checkout.note', $request->note);

        $origin_district_id = 5902;

        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cart_details = $cart->cart_detail;
        $total_weight = $cart_details->sum('weight');

        $responseCost = Http::withHeaders([
            'key' => config('rajaongkir.api_key'),
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->asForm()->post('https://rajaongkir.komerce.id/api/v1/calculate/district/domestic-cost', [
            'origin' => $origin_district_id,
            'destination' => $request->district_id,
            'weight' => $total_weight,
            'courier' => $request->courier
        ]);

        $responseBody = $responseCost->json();
        $costs = $responseBody['data'] ?? [];

        $shipmentPrice = null;
        $serviceName = null;
        $serviceDescription = null;

        if (isset($costs[$id])) {
            $selectedService = $costs[$id];

            $shipmentPrice = $selectedService['cost'];
            $serviceName = $selectedService['service'];
            $serviceDescription = $selectedService['description'];
        }

        if ($shipmentPrice !== null) {
            $cart->update([
                "shipment_price" => $shipmentPrice
            ]);

            // Simpan courier dan service ke session agar persist saat back dari Midtrans
            $request->session()->put('checkout.courier', $request->courier);
            $request->session()->put('checkout.service', $serviceName);

            $destinationId = $request->district_id;
            $sessionKey = 'costStatus_' . $id . '_' . $destinationId . '_' . $request->courier;

            Session::push('arraycostStatus', $sessionKey);
            Session::put($sessionKey, true);

            $activeCostStatus = Session::get('arraycostStatus', []);
            foreach ($activeCostStatus as $costStatus) {
                if ($costStatus != $sessionKey) {
                    Session::put('arraycostStatus', array_diff($activeCostStatus, [$costStatus]));
                    Session::forget($costStatus);
                }
            }

            Session::put('costs', $costs);
            return redirect()->route('member.checkout')->with([
                'chooseShipmentPrice_success' => "Anda memilih {$serviceName} ({$serviceDescription})!"
            ]);
        } else {
            return back()->withErrors(['error' => 'Gagal memilih layanan pengiriman.']);
        }
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
                $customer = User::where('id', Auth::user()->id)->first();

                // Restore abandoned points if user returns to checkout
                if ($customer->old_reward > 0) {
                    $customer->update([
                        'reward' => $customer->reward + $customer->old_reward,
                        'old_reward' => 0
                    ]);
                    $customer->refresh();
                    Auth::setUser($customer);
                }

                $total_price = $cart->cart_detail->sum('price');
                $total_poin = $total_price * ($point->percentage_from_totalprice / 100);

                // Membulatkan ke bawah ke kelipatan 1000 terdekat
                $total_poin = floor($total_poin / 10) * 10; // Membulatkan ke kelipatan 10
                $poin_to_money = $total_poin * $point->money_per_poin;

                $cart->update([
                    'total_poin' => $total_poin
                ]);

                $reward_now = $customer->reward * $point->money_per_poin;
            } else {
                $total_poin = 0;
                $poin_to_money = 0;
                $reward_now = 0;
            }
            //

            $responseProvinces = Http::withHeaders([
                'key' => config('rajaongkir.api_key')
            ])->get('https://rajaongkir.komerce.id/api/v1/destination/province');

            $provinces = $responseProvinces['data'] ?? [];

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
                "provinces" => $provinces,
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

                try {
                    $queryParams = http_build_query([
                        'awb' => $waybill,
                        'courier' => $courier,
                    ]);

                    $responseWaybills = Http::withHeaders([
                        'key' => config('rajaongkir.api_key'),
                    ])->post('https://rajaongkir.komerce.id/api/v1/track/waybill?' . $queryParams);

                    $responseBody = $responseWaybills->json();

                    if (isset($responseBody['meta']['code']) && $responseBody['meta']['code'] == 200) {
                        $trackData = $responseBody['data'];

                        if (!empty($trackData['manifest'])) {
                            $manifest = $trackData['manifest'];
                            if ($courier == 'lion') {
                                $manifest = array_reverse($manifest);
                            }
                            $shipment_histories[$order->id] = $manifest;
                        }

                        $newStatus = null;
                        if (!empty($trackData['summary']['status'])) {
                            $newStatus = $trackData['summary']['status'];
                        } elseif (!empty($trackData['delivery_status']['status'])) {
                            $newStatus = $trackData['delivery_status']['status'];
                        }

                        if ($newStatus) {
                            $order->update(['shipment_status' => $newStatus]);
                        }

                        if (!empty($trackData['details']['waybill_date'])) {
                            $shipDate = $trackData['details']['waybill_date'];
                            if (!empty($trackData['details']['waybill_time'])) {
                                $shipDate .= ' ' . $trackData['details']['waybill_time'];
                            }
                            $order->update(['shipment_date' => $shipDate]);
                        }

                        if (!empty($trackData['delivery_status']['pod_date'])) {
                            $podDate = $trackData['delivery_status']['pod_date'];
                            if (!empty($trackData['delivery_status']['pod_time'])) {
                                $podDate .= ' ' . $trackData['delivery_status']['pod_time'];
                            }

                            $order->update([
                                'arrived_date' => $podDate,
                                'acceptbyCustomer_status' => 'sudah'
                            ]);
                        }
                    } else {
                        return redirect()->back()->withErrors([
                            'waybillNotValid_error' => 'Nomor resi tidak valid atau informasi pengiriman tidak ditemukan!'
                        ]);
                    }
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors([
                        'waybillNotValid_error' => 'Nomor resi tidak valid atau informasi pengiriman tidak ditemukan!'
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
        $request->session()->put('checkout.address_id', $request->address_id);
        $request->session()->put('checkout.address', $request->address);
        $request->session()->put('checkout.province_id', $request->province_id);
        $request->session()->put('checkout.city_id', $request->city_id);
        $request->session()->put('checkout.district_id', $request->district_id);
        $request->session()->put('checkout.note', $request->note);

        $validatedData = $request->validate([
            'address_id'   => 'required_without:address|numeric',
            'address'      => 'required_if:address_id,0|string|nullable|max:100',
            'district_id'  => 'required|numeric',
            'courier'      => 'required|string',
            'service'      => 'required|string',
            'note'         => 'nullable|string|max:255',
            'total_poin'   => 'required|numeric',
            'reward_now'   => 'numeric'
        ], [
            'address_id.required_without' => 'Silakan pilih alamat pengiriman atau isi alamat baru!',
            'address_id.numeric'          => 'Format ID alamat tidak valid!',
            'address.required_if' => 'Detail alamat wajib diisi jika membuat alamat baru!',
            'address.string'      => 'Alamat harus berupa teks!',
            'address.max'         => 'Alamat tidak boleh lebih dari :max karakter!',
            'district_id.required' => 'Mohon pilih kecamatan tujuan pengiriman!',
            'district_id.numeric'  => 'Data kecamatan tidak valid!',
            'courier.required'     => 'Oops, anda lupa memilih jasa pengiriman yang akan digunakan!',
            'courier.string'       => 'Data jasa pengiriman tidak valid!',
            'service.required'     => 'Oops, anda lupa memilih layanan pengiriman! Silakan pilih layanan terlebih dahulu.',
            'service.string'       => 'Data layanan pengiriman tidak valid!',
            'note.string' => 'Catatan harus berupa teks!',
            'note.max'    => 'Catatan tidak boleh lebih dari :max karakter!',
            'total_poin.required' => 'Terjadi kesalahan sistem: Total poin tidak ditemukan.',
            'total_poin.numeric'  => 'Format total poin harus berupa angka!',
            'reward_now.numeric'  => 'Format reward saat ini harus berupa angka!',
        ]);

        $order_date = now();
        $cart = Cart::where('user_id', Auth::user()->id)->first();
        $cart_details = $cart->cart_detail;
        $total_weight = $cart_details->sum('weight');
        $shipment_price = $cart->shipment_price;
        $admin_fee = $cart->admin_fee;

        $customer = User::where('id', Auth::user()->id)->first();
        $point = Point::first();

        $origin_district_id = 5902;

        try {
            $responseCost = Http::withHeaders([
                'key' => config('rajaongkir.api_key'),
                'Content-Type' => 'application/x-www-form-urlencoded'
            ])->asForm()->post('https://rajaongkir.komerce.id/api/v1/calculate/district/domestic-cost', [
                'origin' => $origin_district_id,
                'destination' => $request->district_id,
                'weight' => $total_weight,
                'courier' => $request->courier
            ]);

            $responseBody = $responseCost->json();
            $costs = $responseBody['data'] ?? [];
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['service_NOTAVAILABLE' => "Gagal memverifikasi ongkos kirim. Silahkan coba lagi."]);
        }

        $courierName = null;
        $serviceName = null;
        $shipment_estimation = null;
        $shipment_price_check = null;

        foreach ($costs as $cost) {
            if ($cost['code'] == $request->courier) {
                $courierName = $cost['name'];

                if ($request->service == $cost['service']) {
                    $serviceName = $cost['service'];
                    $shipment_price_check = $cost['cost'];
                    $raw_etd = $cost['etd'] ?? '';
                    $shipment_estimation = preg_replace('/[^0-9\-]/', '', $raw_etd);
                    break;
                }
            }
        }

        if ($serviceName === null) {
            return redirect()->back()->withErrors(['service' => "Layanan pengiriman tidak cocok dengan kurir yang dipilih! Silakan klik 'Cek Ongkir' lagi dan pilih ulang layanan pengiriman."]);
        }

        if ($shipment_price_check === null || $shipment_price_check != $shipment_price) {
            if ($courierName == null) $courierName = strtoupper($request->courier);
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

        $midtrans_order_id = rand();

        if ($validatedData['address_id'] != 0) {
            $address = Address::find($validatedData['address_id']);

            $orderData = [
                'user_id' => Auth::user()->id,
                'address_id' => $validatedData['address_id'],
                'midtrans_order_id' => $midtrans_order_id,
                'order_date' => $order_date,
                'total_price' => $total_price,
                'total_weight' => $total_weight,
                'payment' => 'online',
                'shipment_service' => $shipment_service,
                'shipment_estimation' => $shipment_estimation ?? '-',
                'shipment_price' => $shipment_price,
            ];

            if ($validatedData['note']) {
                $orderData['note'] = $validatedData['note'];
            }

            $order = Order::create($orderData);
        } else {
            $customer_city_name = "";
            $customer_province_name = "";
            $customer_postal_code = "00000";

            try {
                $responseCity = Http::withHeaders(['key' => config('rajaongkir.api_key')])
                    ->get('https://rajaongkir.komerce.id/api/v1/destination/city/' . $request->province_id);

                $citiesData = $responseCity['data'] ?? [];
                foreach ($citiesData as $c) {
                    if ($c['id'] == $request->city_id) {
                        $customer_city_name = $c['name'];
                        break;
                    }
                }

                $responseSubDistrict = Http::withHeaders(['key' => config('rajaongkir.api_key')])
                    ->get('https://rajaongkir.komerce.id/api/v1/destination/sub-district/' . $request->district_id);

                $subDistrictsData = $responseSubDistrict['data'] ?? [];

                if (!empty($subDistrictsData)) {
                    $firstData = $subDistrictsData[0];
                    if (isset($firstData['zip_code']) && is_numeric($firstData['zip_code'])) {
                        $customer_postal_code = $firstData['zip_code'];
                    }
                }

                $responseProv = Http::withHeaders(['key' => config('rajaongkir.api_key')])
                    ->get('https://rajaongkir.komerce.id/api/v1/destination/province');
                $provData = $responseProv['data'] ?? [];
                foreach ($provData as $p) {
                    if ($p['id'] == $request->province_id) {
                        $customer_province_name = $p['name'];
                        break;
                    }
                }
            } catch (\Exception $e) {
                $customer_city_name = "Kota ID: " . $request->city_id;
                $customer_province_name = "Prov ID: " . $request->province_id;
            }

            $address = Address::create([
                'user_id' => Auth::user()->id,
                'address' => $validatedData['address'],
                'city' => $customer_city_name,
                'city_id' => $request->city_id,
                'province' => $customer_province_name,
                'postal_code' => $customer_postal_code
            ]);

            $orderData = [
                'user_id' => Auth::user()->id,
                'address_id' => $address->id,
                'midtrans_order_id' => $midtrans_order_id,
                'order_date' => $order_date,
                'total_price' => $total_price,
                'total_weight' => $total_weight,
                'payment' => 'online',
                'shipment_service' => $shipment_service,
                'shipment_estimation' => $shipment_estimation ?? '-',
                'shipment_price' => $shipment_price,
            ];

            if ($validatedData['note']) {
                $orderData['note'] = $validatedData['note'];
            }

            $order = Order::create($orderData);
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

        $item_details = [];
        foreach ($cart_details as $cart_detail) {
            $item_details[] = [
                'id' => $cart_detail->product_id,
                'price' => $cart_detail->price / $cart_detail->quantity,
                'quantity' => $cart_detail->quantity,
                'name' => $cart_detail->product->name,
            ];
        }

        $item_details[] = ['id' => 'SHIPPING_COST', 'price' => $shipment_price, 'quantity' => 1, 'name' => 'Shipping Cost'];
        $item_details[] = ['id' => 'ADMIN_FEE', 'price' => $admin_fee, 'quantity' => 1, 'name' => 'Admin Fee'];

        if (Session::has('pointStatus')) {
            Session::forget('pointStatus');
            $item_details[] = [
                'id' => 'POINT_DISCOUNT',
                'price' => -$reward_now,
                'quantity' => 1,
                'name' => 'Point Discount'
            ];
        }

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
                if (Session::has('pointStatus')) {
                    $customer->update([
                        'reward' => $customer->reward + $customer->old_reward,
                        'old_reward' => 0
                    ]);
                }
                $order->delete();

                return back()->withErrors([
                    'paymentUrl_ERROR' => 'Error saat melakukan proses pembayaran! ' . $e->getMessage()
                ]);
            }
        } elseif ($total_price == 0) {
            $order->update(['acceptbyAdmin_status' => 'paid']);
            $customer->update(['reward' => $customer->reward + $validatedData['total_poin']]);

            $this->clearCheckoutSessions($cart);

            $cart->delete();
            return redirect()->route('member.orderhistory')->with('capturePayment_SUCCESSFULL', "Pesanan anda berhasil! Tinjau status pesanan anda disini!");
        }
    }

    private function clearCheckoutSessions($cart = null)
    {
        if ($cart) {
            $activeCoupons = Session::get('activeCoupons', []);
            foreach ($activeCoupons as $couponId) {
                if (Session::has('couponStatus_' . $couponId)) {
                    Session::forget('couponStatus_' . $couponId);
                }
            }
            if (Session::has('activeCoupons')) {
                Session::forget('activeCoupons');
            }
            $activeCouriersStatus = Session::get('arraycourierStatus', []);
            foreach ($activeCouriersStatus as $courierStatus) {
                if (Session::has('courierStatus_' . $courierStatus)) {
                    Session::forget('courierStatus_' . $courierStatus);
                }
            }
            if (Session::has('arraycourierStatus')) {
                Session::forget('arraycourierStatus');
            }
            $activeCostStatus = Session::get('arraycostStatus', []);
            foreach ($activeCostStatus as $costStatus) {
                if (Session::has($costStatus)) {
                    Session::forget($costStatus);
                }
            }
            if (Session::has('arraycostStatus')) {
                Session::forget('arraycostStatus');
            }
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
        if (Session::has('checkout.city_id')) {
            Session::forget('checkout.city_id');
        }
        if (Session::has('checkout.province_id')) {
            Session::forget('checkout.province_id');
        }
        if (Session::has('checkout.district_id')) {
            Session::forget('checkout.district_id');
        }
        if (Session::has('checkout.note')) {
            Session::forget('checkout.note');
        }
        if (Session::has('checkout.courier')) {
            Session::forget('checkout.courier');
        }
        if (Session::has('checkout.service')) {
            Session::forget('checkout.service');
        }
        if (Session::has('costs')) {
            Session::forget('costs');
        }
        if (Session::has('pointStatus')) {
            Session::forget('pointStatus');
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
