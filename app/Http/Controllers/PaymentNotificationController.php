<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Production;
use Midtrans\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PaymentNotificationController extends Controller
{
    public function paymentNotification(Request $request)
    {
        // Buat notifikasi dari Midtrans
        $notification = new Notification();
        $transactionStatus = $notification->transaction_status;
        $statusCode = $notification->status_code;
        $fraudStatus = $notification->fraud_status;
        $messageStatus = $notification->status_message;
        $paymentType = $notification->payment_type;
        $orderId = $notification->order_id;
        $grossAmount = $notification->gross_amount;
        $serverKey = config('midtrans.server_key');
        $signatureKey = $notification->signature_key;

        $hashed = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        $order = Order::where('midtrans_order_id', $orderId)->first();

        if ($hashed == $signatureKey) {
            if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
                if ($paymentType == 'credit_card' && $transactionStatus == 'capture' && $fraudStatus == 'accept') {
                    if ($order) {
                        $order->update(['acceptbyAdmin_status' => 'paid']);
                    }
                    return response()->json(['message' => 'Payment successful and processed.']);
                } elseif ($transactionStatus == 'settlement') {
                    if ($order) {
                        $order->update(['acceptbyAdmin_status' => 'paid']);
                    }
                    return response()->json(['message' => 'Settlement payment successful and processed.', 'notification' => $notification->getResponse()]);
                }
            } elseif ($transactionStatus == 'pending') {
                if ($order) {
                    $order->update(['acceptbyAdmin_status' => 'pending']);
                }
                return response()->json(['message' => 'Payment is pending.']);
            } elseif ($transactionStatus == 'deny') {
                if ($order) {
                    $order->update(['acceptbyAdmin_status' => 'deny']);
                }
                return response()->json(['message' => "Payment denied: {$messageStatus}."]);
            } elseif ($transactionStatus == 'expire') {
                if ($order) {
                    $order->update(['acceptbyAdmin_status' => 'expire']);
                }
                return response()->json(['message' => 'Payment expired.']);
            } elseif ($transactionStatus == 'cancel') {
                if ($order) {
                    foreach ($order->order_detail as $order_detail) {
                        $product = Product::where('id', $order_detail->product_id)->first();
                        $product->update([
                            'stock' => $product->stock + $order_detail->quantity
                        ]);
                        Production::create([
                            'date' => now(),
                            'product_id' => $order_detail->product_id,
                            'quantity' => $order_detail->quantity,
                            'type' => 'tambah'
                        ]);
                    }
                }
                return response()->json(['message' => 'Payment canceled.']);
            } elseif ($transactionStatus == 'failure') {
                if ($order) {
                    foreach ($order->order_detail as $order_detail) {
                        $product = Product::where('id', $order_detail->product_id)->first();
                        $product->update([
                            'stock' => $product->stock + $order_detail->quantity
                        ]);
                        Production::create([
                            'date' => now(),
                            'product_id' => $order_detail->product_id,
                            'quantity' => $order_detail->quantity,
                            'type' => 'tambah'
                        ]);
                    }
                }
                return response()->json(['message' => 'Payment failed.']);
            } elseif ($transactionStatus == 'refund') {
                if ($order) {
                    foreach ($order->order_detail as $order_detail) {
                        $product = Product::where('id', $order_detail->product_id)->first();
                        $product->update([
                            'stock' => $product->stock + $order_detail->quantity
                        ]);
                        Production::create([
                            'date' => now(),
                            'product_id' => $order_detail->product_id,
                            'quantity' => $order_detail->quantity,
                            'type' => 'tambah'
                        ]);
                    }
                }
                return response()->json(['message' => 'Payment refunded.']);
            } elseif ($transactionStatus == 'partial_refund') {
                if ($order) {
                    foreach ($order->order_detail as $order_detail) {
                        $product = Product::where('id', $order_detail->product_id)->first();
                        $product->update([
                            'stock' => $product->stock + $order_detail->quantity
                        ]);
                        Production::create([
                            'date' => now(),
                            'product_id' => $order_detail->product_id,
                            'quantity' => $order_detail->quantity,
                            'type' => 'tambah'
                        ]);
                    }
                }
                return response()->json(['message' => 'Payment partial refunded.']);
            } elseif ($transactionStatus == 'authorize') {
                if ($order) {
                    foreach ($order->order_detail as $order_detail) {
                        $product = Product::where('id', $order_detail->product_id)->first();
                        $product->update([
                            'stock' => $product->stock + $order_detail->quantity
                        ]);
                        Production::create([
                            'date' => now(),
                            'product_id' => $order_detail->product_id,
                            'quantity' => $order_detail->quantity,
                            'type' => 'tambah'
                        ]);
                    }
                }
                return response()->json(['message' => 'Payment authorized.']);
            }
        } else {
            return response()->json(['message' => 'Unverified signature key.'], 400);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
