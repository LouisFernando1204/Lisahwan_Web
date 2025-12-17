<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struk</title>
    <link rel="icon" href="{{ public_path('images/lisahwan_logo.png') }}">
</head>

<body style="font-family: 'Montserrat', sans-serif;">
    <div style="display: flex; justify-content: center; align-items: center;">
        <div style="width: 100%; border-radius: 0.375rem; padding-left: 1rem; padding-right: 1rem;">
            <img src="{{ public_path('images/lisahwan_text.png') }}" alt="Lisahwan"
                style="filter: contrast(150%) drop-shadow(2px 2px 2px black);">
            <div style="margin-top: 0.5rem; padding-bottom: 0.5rem;">
                <p style="margin: 0rem; font-size: 0.75rem; color: black; text-align: center;">Jalan Jemur Andayani XIII
                    No.6</p>
                <p style="margin: 0rem; font-size: 0.75rem; color: black; text-align: center;">082230308030</p>
            </div>
            <div style="border-bottom: 0.125rem solid black;"></div>
            <div
                style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.75rem; padding-bottom: 0.5rem; padding-top: 0.5rem;">
                <span style="display: flex; justify-content: space-between;">
                    <span style="color: black; ;">Order Date:</span>
                    <span>{{ date('d F Y', strtotime($order->order_date)) }}</span>
                </span>
                <br>
                <span style="display: flex; justify-content: space-between;">
                    <span style="color: black; ;">Order Time:</span>
                    <span>{{ date('H:i', strtotime($order->order_date)) }}</span>
                </span>
                <br>
                @if ($order->user_id == 1 || $order->user_id == 2)
                    <span style="display: flex; justify-content: space-between;">
                        <span style="color: black; ;">Order Type:</span>
                        <span>Store Shopping</span>
                    </span>
                @else
                    <span style="display: flex; justify-content: space-between;">
                        <span style="color: black; ;">Order Type:</span>
                        <span>Online Shopping</span>
                    </span>
                @endif
                <br>
                <span style="display: flex; justify-content: space-between;">
                    <span style="color: black; ;">Receipt No:</span>
                    <span>{{ $order->id }}</span>
                </span>
                <br>
                @if ($order->user_id == 1 || $order->user_id == 2)
                    <span style="display: flex; justify-content: space-between;">
                        <span style="color: black; ;">Admin:</span>
                        <span>{{ $order->user->name }}</span>
                    </span>
                @else
                    <span style="display: flex; justify-content: space-between;">
                        <span style="color: black; ;">Customer:</span>
                        <span>{{ $order->user->name }}</span>
                    </span>
                @endif
            </div>
            <div style="border-bottom: 0.125rem solid black;"></div>
            <div
                style="display: flex; flex-direction: column; gap: 1rem; font-size: 0.75rem;color: #4b5563; padding-top: 0.5rem;">
                <table style="width: 100%; text-align: left; font-size: 0.75rem;">
                    <thead>
                        <tr style="display: flex;">
                            <th style="text-align: center;" colspan="3">Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->order_detail as $order_detail)
                            <tr style="display: flex;">
                                <td style="width: 10rem; font-weight: bold;" colspan="3">
                                    {{ $order_detail->product->name }}
                                </td>
                            </tr>
                            <tr style="display: flex;">
                                <td style="padding-bottom: 0.5rem; ">
                                    {{ $order_detail->quantity }}x</td>
                                <td style="padding-bottom: 0.5rem;">
                                    &#64;{{ number_format($order_detail->product->price, 0, ',', '.') }}
                                    @if ($order_detail->product->discount != 0)
                                        <span style="color: red;">
                                            - {{ $order_detail->product->discount }}%
                                        </span>
                                    @endif
                                </td>
                                <td style="padding-bottom: 0.5rem; padding-left: 3rem;">
                                    {{ number_format($order_detail->price, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="border-bottom: 0.125rem solid black; padding-top: 0.5rem;"></div>
                <p style=" margin: 0rem; padding-top: 0.5rem; font-weight: 600; color: black;">
                    Total Produk: {{ $order->order_detail->sum('quantity') }}
                </p>
                <p style="margin: 0rem; padding-bottom: 0.5rem; font-weight: 600; color: black;">
                    @if ($final_price > 0)
                        Total Harga: Rp.{{ number_format($before_discount_price, 0, ',', '.') }}
                        <br>
                        <strong>Setelah Diskon: Rp.{{ number_format($final_price, 0, ',', '.') }}</strong>
                    @else
                        Total Harga: Rp.{{ number_format($order->total_price, 0, ',', '.') }}
                    @endif
                </p>
                <div style="border-bottom: 0.125rem solid black; "></div>
                <p
                    style="padding-top: 0.5rem; margin: 0rem; font-size: 0.75rem; color: black; text-align: center; font-weight: bold;">
                    Thankyou</p>
                <p style="margin: 0rem; font-size: 0.75rem; color: black; text-align: center; font-weight: bold;">For
                    your purchasing!</p>
            </div>
        </div>
    </div>
</body>

</html>
