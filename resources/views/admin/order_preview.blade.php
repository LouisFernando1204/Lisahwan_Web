<div id="order-detail{{ $order->id }}"
    class="fixed top-0 left-0 z-50 h-screen overflow-y-auto transition-transform -translate-x-full bg-white w-full md:w-2/4"
    tabindex="-1" aria-labelledby="drawer-label">
    <div class="flex flex-rw w-full bg-gray-900 pt-4">
        <h5 id="drawer-label" class="pl-4 inline-flex items-center mb-4 text-base font-semibold text-gray-400">
            <svg class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>Info Order
        </h5>
        <button type="button" data-drawer-hide="order-detail{{ $order->id }}"
            aria-controls="order-detail{{ $order->id }}"
            class="text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center hover:bg-gray-600 hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>

    <div class="ml-2 md:ml-0 grid grid-cols-3 py-6 px-6 gap-y-4">
        <div class="flex flex-col justify-center items-start">
            <p class="text-sm font-semibold text-gray-900">
                Tanggal Pemesanan:
            </p>
            <p class="text-sm font-medium text-gray-400">
                {{ date('d F Y', strtotime($order->order_date)) }}
            </p>
        </div>
        <div class="flex flex-col justify-center items-start">
            <p class="text-sm font-semibold text-gray-900">
                Tanggal Pengiriman:
            </p>
            @if ($order->shipment_date)
                <p class="text-sm font-medium text-gray-400">
                    {{ date('d F Y', strtotime($order->shipment_date)) }}
                </p>
            @else
                <p class="text-sm font-medium text-gray-400">
                    -
                </p>
            @endif
        </div>
        <div class="flex flex-col justify-center items-start">
            <p class="text-sm font-semibold text-gray-900">
                Tanggal Sampai:
            </p>
            @if ($order->arrived_date)
                <p class="text-sm font-medium text-gray-400">
                    {{ date('d F Y', strtotime($order->arrived_date)) }}
                </p>
            @else
                <p class="text-sm font-medium text-gray-400">
                    -
                </p>
            @endif
        </div>
        <div class="flex flex-col justify-center items-start">
            <p class="text-sm font-semibold text-gray-900">
                Total Pemesanan:
            </p>
            <p class="text-sm font-medium text-lime-600">
                Rp. {{ number_format($order->total_price, 0, ',', '.') }}
            </p>
        </div>
        <div class="flex flex-col justify-center items-start">
            <p class="text-sm font-semibold text-gray-900">
                Total Berat:
            </p>
            <p class="text-sm font-medium text-gray-400">
                {{ $order->total_weight }} gram
            </p>
        </div>
    </div>

    <div class="flex flex-col justify-center items-start px-6 mb-6">
        <p class="text-sm font-semibold text-gray-900">
            Catatan:
        </p>
        <p class="text-sm font-medium text-gray-400">
            {{ $order->note }}
        </p>
    </div>

    <div class="flex flex-row items-start space-x-2 mb-4 px-6">
        <div class="flex flex-col justify-center items-start">
            @if ($order->acceptbyAdmin_status == 'sudah')
                <span
                    class="inline-flex items-center bg-green-100 text-green-800 text-sm font-medium px-2 py-1.5 rounded-lg">
                    <span class="w-2.5 h-2 mr-2 bg-green-500 rounded-full"></span>
                    Sudah Diterima
                </span>
            @else
                <span
                    class="inline-flex items-center bg-gray-300 text-gray-600 text-sm font-medium px-2 py-1.5 rounded-lg">
                    <span class="w-2.5 h-2 mr-2 bg-gray-600 rounded-full"></span>
                    Belum Diterima
                </span>
            @endif
        </div>
        <div class="flex flex-col justify-center items-start">
            @if ($order->shipment_status == 'sudah')
                <span
                    class="inline-flex items-center bg-green-100 text-green-800 text-sm font-medium px-2 py-1.5 rounded-lg">
                    <span class="w-2.5 h-2 mr-2 bg-green-500 rounded-full"></span>
                    Sedang Dikirim
                </span>
            @else
                <span
                    class="inline-flex items-center bg-gray-300 text-gray-600 text-sm font-medium px-2 py-1.5 rounded-lg">
                    <span class="w-2.5 h-2 mr-2 bg-gray-600 rounded-full"></span>
                    Belum Dikirim
                </span>
            @endif
        </div>
        <div class="flex flex-col justify-center items-start">
            @if ($order->acceptbyCustomer_status == 'sudah')
                <span
                    class="inline-flex items-center bg-green-100 text-green-800 text-sm font-medium px-2 py-1.5 rounded-lg">
                    <span class="w-3 h-2 mr-2 bg-green-500 rounded-full"></span>
                    Sudah Sampai
                </span>
            @else
                <span
                    class="inline-flex items-center bg-gray-300 text-gray-600 text-sm font-medium px-2 py-1.5 rounded-lg">
                    <span class="w-2.5 h-2 mr-2 bg-gray-600 rounded-full"></span>
                    Belum Sampai
                </span>
            @endif
        </div>
    </div>

    <hr class="h-px border-0 bg-gray-300">

    @foreach ($order->order_detail as $order_detail)
        <div class="flex flex-col justify-center w-full p-6">
            <img class="mb-4 h-40 w-40 object-cover object-bottom rounded-lg drop-shadow-md"
                src="/images/fotoproduk/{{ $order_detail->product->image }}" alt="{{ $order_detail->product->name }}">
            <div class="flex flex-col justify-center space-y-4">
                <div class="flex flex-col">
                    <p class="text-base font-semibold text-gray-900">
                        {{ $order_detail->product->name }}</p>
                    <p class="text-sm font-normal text-gray-600">
                        {{ $order_detail->product->description }}</p>
                    <p class="mt-2 text-sm font-normal text-gray-600">
                        ({{ $order_detail->weight }}
                        gram)
                    </p>
                </div>
                <div class="flex flex-row justify-between items-center">
                    <div class="flex flex-col justify-center">
                        @if ($order_detail->product->discount != 0)
                            <p class="mt-1 text-base font-semibold text-gray-900">
                                Rp.
                                {{ number_format($order_detail->product->countDiscount(), 0, ',', '.') }}
                            </p>
                        @else
                            <p class="mt-1 text-base font-semibold text-gray-900">
                                Rp.
                                {{ number_format($order_detail->product->price, 0, ',', '.') }}
                            </p>
                        @endif
                    </div>
                    <span
                        class="ml-8 inline-flex justify-center items-center bg-yellow-100 text-yellow-800 text-sm font-medium px-3 py-1.5 rounded border border-yellow-500"><svg
                            class="w-3 h-3 mr-1 text-yellow-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg> {{ $order_detail->quantity }} buah (Rp.
                        {{ number_format($order_detail->price, 0, ',', '.') }})</span>
                </div>
            </div>
        </div>
        @if (!$loop->last)
            <hr class="h-px border-0 bg-gray-300">
        @else
        @endif
    @endforeach
</div>
</div>
