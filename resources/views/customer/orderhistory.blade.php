@extends('layouts.frame_nocarousel')

@section('content_page')
    <div class="flex flex-col items-center">
        @if (session('deleteCart_success'))
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mt-8 text-sm rounded-lg  bg-gray-900 text-green-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('deleteCart_success') }}
                </div>
            </div>
        @endif
        @if (session('capturePayment_SUCCESSFULL'))
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mt-8 text-sm rounded-lg bg-gray-900 text-green-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('capturePayment_SUCCESSFULL') }}
                </div>
            </div>
        @endif
        @if (session('settlementPayment_SUCCESSFULL'))
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mt-8 text-sm rounded-lg bg-gray-900 text-green-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('settlementPayment_SUCCESSFULL') }}
                </div>
            </div>
        @endif
        <div class="mx-auto w-11/12 sm:max-w-screen-xl text-center sm:col-span-2 md:col-span-2 lg:col-span-4 mt-16">
            <h1 data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="mb-8 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
                {!! $pageTitle !!}</h1>
            <p data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="text-lg font-normal text-gray-900 lg:text-xl sm:px-16 lg:px-48">{!! $pageDescription !!}</p>
        </div>
        <div class="flex flex-col p-12 mx-auto justify-center items-center gap-y-6 w-full">
            @foreach ($orders as $order)
                <form data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    action="{{ route('member.orderhistory.update', $order->id) }}" method="POST" class="w-full">
                    @method('patch')
                    @csrf
                    <div
                        class="flex flex-col bg-white justify-center rounded-md sm:rounded-lg border border-gray-300 drop-shadow-md">
                        <div
                            class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 p-6 justify-center items-center gap-x-3 sm:gap-x-2 gap-y-4">
                            <div class="flex flex-col justify-center items-center">
                                <p class="text-sm font-semibold text-gray-900 text-center">
                                    Tanggal Pemesanan:
                                </p>
                                <p class="text-xs font-medium text-gray-400 text-center">
                                    {{ date('d F Y', strtotime($order->order_date)) }}<br>
                                    {{ date('(H:i:s)', strtotime($order->order_date)) }}
                                </p>
                            </div>
                            <div class="flex flex-col justify-center items-center">
                                <p class="text-sm font-semibold text-gray-900 text-center">
                                    Tanggal Pengiriman:
                                </p>
                                @if ($order->shipment_date)
                                    <p class="text-xs font-medium text-gray-400 text-center">
                                        {{ date('d F Y', strtotime($order->shipment_date)) }}<br>
                                        {{ date('(H:i:s)', strtotime($order->shipment_date)) }}
                                    </p>
                                @else
                                    <p class="text-xs font-medium text-gray-400 text-center">
                                        -
                                    </p>
                                @endif
                            </div>
                            <div class="flex flex-col justify-center items-center">
                                <p class="text-sm font-semibold text-gray-900 text-center">
                                    Tanggal Sampai:
                                </p>
                                @if ($order->arrived_date)
                                    <p class="text-xs font-medium text-gray-400 text-center">
                                        {{ date('d F Y', strtotime($order->arrived_date)) }}<br>
                                        {{ date('(H:i:s)', strtotime($order->arrived_date)) }}
                                    </p>
                                @else
                                    <p class="text-xs font-medium text-gray-400 text-center">
                                        {{ $order->shipment_estimation }}{{ stripos($order->shipment_estimation, 'hari') === false ? ' hari' : '' }}
                                    </p>
                                @endif
                            </div>
                            <div class="flex flex-col justify-center items-center">
                                <p class="text-sm font-semibold text-gray-900 text-center">
                                    Total Pemesanan:
                                </p>
                                <p class="text-xs font-medium text-lime-600 text-center">
                                    Rp. {{ number_format($order->total_price, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="flex flex-col justify-center items-center">
                                @if ($order->acceptbyAdmin_status != 'pending')
                                    <span
                                        class="text-center inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-3 py-1.5 rounded-lg">
                                        <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                        Pesanan Diterima
                                    </span>
                                @else
                                    <span
                                        class="text-center inline-flex items-center bg-gray-300 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-lg">
                                        <span class="w-2 h-2 me-1 bg-gray-600 rounded-full"></span>
                                        Pesanan Belum Diterima
                                    </span>
                                @endif
                            </div>
                            <div class="flex flex-col justify-center items-center">
                                @if ($order->shipment_status != 'pending')
                                    <span
                                        class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-3 py-1.5 rounded-lg">
                                        <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                                        {{ $order->shipment_status }}
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center bg-gray-300 text-gray-600 text-xs font-medium px-3 py-1.5 rounded-lg">
                                        <span class="w-2 h-2 me-1 bg-gray-600 rounded-full"></span>
                                        Belum Dikirim
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr class="h-px border-0 bg-gray-300">
                        @foreach ($order->order_detail as $order_detail)
                            <div class="flex flex-col sm:flex-row items-center justify-center w-full p-7">
                                @if (strlen($order_detail->product->image) > 30)
                                    <img class="hw-full h-64 sm:w-48 sm:h-48 md:w-44 md:h-44 lg:h-44 lg:w-44 object-cover object-bottom rounded-lg drop-shadow-md"
                                        src="{{ asset('storage/' . $order_detail->product->image) }}"
                                        alt="{{ $order_detail->product->image }}" />
                                @else
                                    <img class="w-full h-64 sm:w-48 sm:h-48 md:w-44 md:h-44 lg:h-44 lg:w-44 object-cover object-bottom rounded-lg drop-shadow-md"
                                        src="/images/fotoproduk/{{ $order_detail->product->image }}"
                                        alt="{{ $order_detail->product->name }}">
                                @endif
                                <div
                                    class="mt-3 sm:mt-0 flex flex-col sm:ml-3 justify-center space-y-6 sm:space-y-4 lg:space-y-10 w-full">
                                    <div class="felx flex-col">
                                        <p class="text-base font-semibold text-gray-900">{{ $order_detail->product->name }}
                                        </p>
                                        <p
                                            class="text-sm font-normal text-gray-600 break-words whitespace-normal text-left">
                                            {{ $order_detail->product->description }}
                                        </p>
                                        <p class="mt-2 text-sm font-normal text-gray-600">
                                            ({{ $order_detail->weight }}
                                            gram)
                                        </p>
                                    </div>
                                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                                        <div class="flex flex-col justify-center">
                                            <a href="{{ route('member.products.show', $order_detail->product_id) }}">
                                                <button type="button"
                                                    class="cursor-pointer text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-md text-sm sm:text-sm md:text-sm lg:text-sm px-2 py-1 inline-flex items-center">
                                                    <svg class="w-4 h-4 mr-1 text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                        viewBox="0 0 18 20">
                                                        <path
                                                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                                                    </svg>
                                                    <span class="sm:inline-block">Lihat Produk</span>
                                                </button>
                                            </a>
                                            @if ($order_detail->product->discount != 0)
                                                <p class="mt-1 text-base font-semibold text-gray-900"> Rp.
                                                    {{ number_format($order_detail->product->countDiscount(), 0, ',', '.') }}
                                                </p>
                                            @else
                                                <p class="mt-1 text-base font-semibold text-gray-900"> Rp.
                                                    {{ number_format($order_detail->product->price, 0, ',', '.') }}</p>
                                            @endif
                                        </div>
                                        <span
                                            class="mt-5 sm:mt-0 inline-flex justify-center items-center bg-yellow-100 text-yellow-800 sm:text-xs md:text-sm font-medium px-3 py-1.5 rounded border border-yellow-500"><svg
                                                class="w-3 h-3 mr-1 text-yellow-800" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                            </svg> {{ $order_detail->quantity }} buah (Rp.
                                            {{ number_format($order_detail->price, 0, ',', '.') }})</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if (isset($shipment_histories[$order->id]))
                            <hr class="h-px border-0 bg-gray-300">
                            <div class="space-y-4 p-7">
                                <h3 class="text-base text-center font-semibold text-gray-900">Riwayat Pengiriman</h3>
                                <div class="flex flex-col justify-center items-center">
                                    <div
                                        class="flex flex-col bg-neutral-100 rounded-lg justify-center items-center p-6 lg:w-3/5">
                                        @foreach ($shipment_histories[$order->id] as $index => $shipment_history)
                                            <div class="w-full flex flex-row justify-start space-x-4 {{ $index >= 3 ? 'hidden-history-' . $order->id : '' }}"
                                                style="{{ $index >= 3 ? 'display: none;' : '' }}">
                                                <div class="relative flex flex-col items-center">
                                                    <span
                                                        class="flex h-8 w-8 flex-shrink-0 items-center justify-center rounded-full bg-gray-900 text-yellow-500 ring-4 ring-yellow-500 z-10">
                                                        <svg class="h-4 w-4" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="4"
                                                                d="M5 11.917 9.724 16.5 19 7.5" />
                                                        </svg>
                                                    </span>
                                                    @if (!$loop->last)
                                                        <div
                                                            class="absolute top-8 bottom-0 left-1/2 transform -translate-x-1/2 w-0.5 bg-gray-400 -z-0">
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="flex flex-col space-y-1 pb-8">
                                                    <span class="text-base font-semibold">
                                                        {{ \Carbon\Carbon::parse($shipment_history['manifest_date'])->format('d F Y') }},
                                                        {{ \Carbon\Carbon::parse($shipment_history['manifest_time'])->format('g:i A') }}
                                                    </span>
                                                    <span
                                                        class="text-sm font-normal">{{ $shipment_history['manifest_description'] }}</span>
                                                    <span
                                                        class="text-xs text-gray-500">({{ $shipment_history['city_name'] }})</span>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if (count($shipment_histories[$order->id]) > 3)
                                            <button type="button" id="btn-toggle-{{ $order->id }}"
                                                onclick="toggleHistory({{ $order->id }})"
                                                class="mt-2 text-xs font-medium text-yellow-600 hover:text-yellow-700 hover:underline focus:outline-none flex items-center transition-all duration-300">
                                                <span>Lihat Riwayat Sebelumnya
                                                    ({{ count($shipment_histories[$order->id]) - 3 }})</span>
                                                <svg id="icon-chevron-{{ $order->id }}"
                                                    class="w-3 h-3 ms-1 transition-transform duration-300"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @else
                            <hr class="h-px border-0 bg-gray-300">
                            <div class="p-7 space-y-1">
                                <h3 class="text-sm lg:text-base text-center font-medium text-gray-400">Belum ada riwayat
                                    pengiriman...</h3>
                            </div>
                        @endif
                        @if ($order->arrived_date)
                            <div
                                class="text-gray-900 bg-yellow-500 font-semibold rounded-b-lg text-sm sm:text-sm md:text-sm lg:text-sm p-5 inline-flex justify-center items-center w-full">
                                <svg class="flex-shrink-0 inline w-4 h-4 mr-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                </svg>
                                <span class="sm:inline-block">Pesanan Selesai</span>
                            </div>
                        @else
                            <div class="flex flex-col items-center justify-center">
                                <button type="submit"
                                    class="cursor-pointer text-green-500 bg-gray-900 hover:bg-gray-800 font-semibold rounded-b-lg text-sm sm:text-sm md:text-sm lg:text-sm p-5 inline-flex justify-center items-center w-full"
                                    onclick="return confirm('Apakah anda yakin pesanan ini sudah sampai?')">
                                    <svg class="flex-shrink-0 inline w-4 h-4 mr-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                    </svg>
                                    <span class="sm:inline-block">Pesanan Sampai</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </form>
            @endforeach
            {{ $orders->links() }}
        </div>
    </div>
    <script language="javascript">
        function toggleHistory(orderId) {
            $('.hidden-history-' + orderId).slideToggle(300);
            var btn = $('#btn-toggle-' + orderId + ' span');
            var icon = $('#icon-chevron-' + orderId);

            if (btn.text().includes('Lihat Riwayat')) {
                btn.text('Tutup Riwayat Lama');
                icon.addClass('rotate-180');
            } else {
                var count = $('.hidden-history-' + orderId).length;
                btn.text('Lihat Riwayat Sebelumnya (' + count + ')');
                icon.removeClass('rotate-180');
            }
        }
    </script>
@endsection
