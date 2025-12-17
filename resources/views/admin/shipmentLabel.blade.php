<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Label Pengiriman</title>
    <link rel="icon" href="{{ public_path('images/lisahwan_logo.png') }}">
</head>

<body style="font-family: 'Montserrat', sans-serif; margin: 0; padding: 0;" width="100%">
    <div style="width: 100%; height: 100%; padding: 1rem;">
        <div style="text-align: center; margin-bottom: 2mm;">
            <h1 style="margin: 0; font-size: 10pt;">Label Pengiriman</h1>
        </div>
        <div style="margin-bottom: 2mm;">
            <table style="width: 100%; border-collapse: collapse; border: 1px solid black;">
                <thead>
                    <tr style="border: 1px solid black;">
                        <th style="border: 1px solid black; font-size: 8pt; text-align: center;">Penerima</th>
                        <th style="border: 1px solid black; font-size: 8pt; text-align: center;">Pengirim</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border: 1px solid black;">
                        <td style="width: 50%; border: 1px solid black; text-align: left;">
                            <p style="margin: 0; font-size:8pt;">{{ $order->user->name }}</p>
                            <p style="margin: 0; font-size:8pt;">{{ $order->user->phone_number }}</p>
                            <p style="margin: 0; font-size:8pt;">{{ $order->address->address }},
                                {{ $order->address->city }}, {{ $order->address->province }},
                                {{ $order->address->postal_code }}</p>
                        </td>
                        <td style="width: 50%; border: 1px solid black; text-align: left;">
                            <p style="margin: 0; font-size:8pt;">Lisahwan</p>
                            <p style="margin: 0; font-size:8pt;">082230308030</p>
                        </td>
                    </tr>
                    <tr style="border: 1px solid black;">
                        <th style="border: 1px solid black; font-size: 8pt; text-align: center;" colspan="2">Kurir
                        </th>
                    </tr>
                    <tr style="border: 1px solid black;">
                        <td style="border: 1px solid black; text-align: left;" colspan="2">
                            <p style="margin: 0; font-size:8pt;">{{ $order->shipment_service }}
                                ({{ $order->total_weight }} gram)</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="margin-bottom: 0mm;">
            <table style="width: 100%; border-collapse: collapse; font-size: 8pt; border: 1px solid #000;">
                <thead>
                    <tr>
                        <th style="border: 1px solid #000; padding: 0.5mm; text-align: center;" colspan="2">Detail
                            Pesanan</th>
                    </tr>
                    <tr>
                        <th style="border: 1px solid #000; padding: 0.5mm; text-align: center;" width="50%">Produk
                        </th>
                        <th style="border: 1px solid #000; padding: 0.5mm; text-align: center;" width="50%">Jumlah
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->order_detail as $order_detail)
                        <tr>
                            <td style="border: 1px solid #000; padding: 0.5mm; text-align: left;">
                                {{ $order_detail->product->name }}</td>
                            <td style="border: 1px solid #000; padding: 0.5mm; text-align: left;">
                                {{ $order_detail->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p style="margin: 0; margin-top: 1mm; font-size: 8pt;"><strong>Total Produk:
                    {{ $order->order_detail->sum('quantity') }}</strong></p>
            @if ($order->note)
                <p style="margin: 0; font-size: 8pt; font-weight: bold; font-style: italic;">
                    *{{ $order->note }}
                </p>
            @endif
        </div>
        <div style="text-align: center; border-top: 1px solid #000; padding-top: 2mm; margin-top: 3mm;">
            <p style="margin: 0; font-size: 8pt; text-align: center;"><strong>Terima kasih sudah
                    belanja!</strong></p>
            <img src="{{ public_path('images/lisahwan_text.png') }}" alt="Lisahwan"
                style="filter: contrast(150%) drop-shadow(2px 2px 2px black);" width="100px">
        </div>
    </div>
</body>

</html>
