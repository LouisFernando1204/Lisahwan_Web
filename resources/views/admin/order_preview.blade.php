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

    <div class="ml-2 md:ml-0 grid grid-cols-2 lg:grid-cols-3 py-6 px-6 gap-y-4 items-start">
        <div class="flex flex-col justify-center items-start">
            <p class="text-sm font-semibold text-gray-900">
                Tanggal Pemesanan:
            </p>
            <p class="text-sm font-medium text-gray-400">
                {{ date('d F Y', strtotime($order->order_date)) }}, {{ date('H:i', strtotime($order->order_date)) }}
            </p>
        </div>
        <div class="flex flex-col justify-center items-start">
            <p class="text-sm font-semibold text-gray-900">
                Tanggal Pengiriman:
            </p>
            @if ($order->shipment_date)
                <p class="text-sm font-medium text-gray-400">
                    {{ date('d F Y', strtotime($order->shipment_date)) }},
                    {{ date('H:i', strtotime($order->shipment_date)) }}
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
                    {{ date('d F Y', strtotime($order->arrived_date)) }},
                    {{ date('H:i', strtotime($order->arrived_date)) }}
                </p>
            @else
                <p class="text-sm font-medium text-gray-400">
                    {{ $order->shipment_estimation }}{{ stripos($order->shipment_estimation, 'hari') === false ? ' hari' : '' }}
                </p>
            @endif
        </div>
        <div class="flex flex-col justify-center items-start">
            <p class="text-sm font-semibold text-gray-900">
                Total Pesanan:
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
        <div class="flex flex-col justify-center items-start">
            <p class="text-sm font-semibold text-gray-900">
                Jasa Pengiriman:
            </p>
            <p class="text-sm font-medium text-gray-400">
                @if (strlen($order->payment) >= 10 || $order->payment == 'cash')
                    -
                @else
                    {{ $order->shipment_service }} (Rp. {{ number_format($order->shipment_price, 0, ',', '.') }})
                @endif
            </p>
        </div>

        <div class="flex flex-col justify-center items-start w-3/4">
            <p class="text-sm font-semibold text-gray-900">
                Catatan:
            </p>
            <p class="text-sm font-medium text-gray-400">
                @if ($order->note == '' || $order->note == null)
                    -
                @else
                    {{ $order->note }}
                @endif
            </p>
        </div>

        <div class="flex flex-col justify-center items-start">
            <p class="text-sm font-semibold text-gray-900">
                Jenis Pembayaran:
            </p>
            <p class="text-sm font-medium text-gray-400">
                @if (strlen($order->payment) >= 10)
                    QRIS BCA
                @else
                    {{ ucfirst($order->payment) }}
                @endif
            </p>
        </div>

        @if (strlen($order->payment) >= 10)
            <div class="flex flex-col justify-center items-start">
                <button type="button" data-modal-target="payment{{ $order->id }}"
                    data-modal-toggle="payment{{ $order->id }}"
                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-600 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                        class="w-4 h-4 mr-2 -ml-0.5">
                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                    </svg>
                    Bukti TF QRIS
                </button>
            </div>

            <div id="payment{{ $order->id }}" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div id="update-modal-content" class="relative p-4 bg-gray-900 rounded-lg shadow sm:p-5">
                        <!-- Modal header -->
                        <div
                            class="flex justify-between items-center pb-4 mb-4 rounded-t border-b border-yellow-500 sm:mb-5">
                            <div class="flex items-center mr-3">
                                @if ($order->user->profile_picture == null)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-8 h-8 mr-3 rounded-full text-gray-700">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                @elseif (strlen($order->user->profile_picture) > 25)
                                    <img src="{{ asset('storage/' . $order->user->profile_picture) }}"
                                        alt="profile picture"
                                        class="w-8 h-8 mr-3 object-cover object-center rounded-full">
                                @else
                                    <img src="/images/profile_picture/{{ $order->user->profile_picture }}"
                                        alt="profile picture"
                                        class="w-8 h-8 mr-3 object-cover object-center rounded-full">
                                @endif
                                <h3 class="text-lg font-semibold text-yellow-500">
                                    Bukti TF QRIS a.n. {{ $order->user->name }}</h3>
                            </div>
                            <button type="button"
                                class="text-yellow-500 bg-transparent hover:bg-gray-800 hover:text-yellow-500 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="payment{{ $order->id }}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->

                        @if ($order->payment != null || $order->payment != '')
                            <img src="{{ asset('storage/' . $order->payment) }}"
                                alt="{{ asset('storage/' . $order->payment) }}"
                                class="mt-3 w-96 mx-auto rounded-lg object-cover">
                        @else
                            <p class="mt-3 text-red-700 text-center font-semibold">
                                Belum ada bukti pembayaran</p>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="flex flex-row items-start space-x-2 mb-4 px-6">
        <div class="flex flex-col justify-center items-start">
            @if ($order->acceptbyAdmin_status == 'paid')
                <span
                    class="inline-flex items-center bg-green-100 text-green-800 text-sm font-medium px-2 py-1.5 rounded-lg">
                    <span class="w-2.5 h-2 mr-2 bg-green-500 rounded-full"></span>
                    Sudah Diverifikasi
                </span>
            @else
                <span
                    class="inline-flex items-center bg-gray-300 text-gray-600 text-sm font-medium px-2 py-1.5 rounded-lg">
                    <span class="w-2.5 h-2 mr-2 bg-gray-600 rounded-full"></span>
                    Belum Diverifikasi
                </span>
            @endif
        </div>
        <div class="flex flex-col justify-center items-start">
            @if ($order->shipment_status != 'pending')
                <span
                    class="inline-flex items-center bg-green-100 text-green-800 text-sm font-medium px-2 py-1.5 rounded-lg">
                    <span class="w-2.5 h-2 mr-2 bg-green-500 rounded-full"></span>
                    {{ ucfirst($order->shipment_status) }}
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
            @if (strlen($order_detail->product->image) > 30)
                <img class="mb-4 h-40 w-40 object-cover object-bottom rounded-lg drop-shadow-md"
                    src="{{ asset('storage/' . $order_detail->product->image) }}"
                    alt="{{ $order_detail->product->image }}" />
            @else
                <img class="mb-4 h-40 w-40 object-cover object-bottom rounded-lg drop-shadow-md"
                    src="/images/fotoproduk/{{ $order_detail->product->image }}"
                    alt="{{ $order_detail->product->name }}">
            @endif
            <div class="flex flex-col justify-center space-y-4">
                <div class="flex flex-col">
                    <p class="text-base font-semibold text-gray-900">
                        {{ $order_detail->product->name }}</p>
                    <p
                        class="truncate hover:w-full hover:overflow-visible hover:whitespace-normal hover:text-ellipsis text-sm font-normal text-gray-600">
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
                            class="w-3 h-3 mr-1 text-yellow-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 1v16M1 9h16" />
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
