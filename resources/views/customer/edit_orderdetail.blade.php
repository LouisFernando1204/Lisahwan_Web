@extends('layouts.frame_nocarousel')

@section('content_page')
    <div class="flex flex-col items-center">
        @if (session('deleteCart_success'))
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
                    <span class="font-medium">{{ session('deleteCart_success') }}
                </div>
            </div>
        @endif
        <div
            class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-8 sm:gap-y-8 lg:gap-y-12 p-8 sm:p-12 mx-auto">
            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">
                @if (strlen($cart_detail->product->image) > 30)
                    <img class="object-contain rounded-lg drop-shadow-md"
                        src="{{ asset('storage/' . $cart_detail->product->image) }}"
                        alt="{{ $cart_detail->product->name }}" />
                @else
                    <img class="object-contain rounded-lg drop-shadow-md"
                        src="/images/fotoproduk/{{ $cart_detail->product->image }}" alt="{{ $cart_detail->product->name }}">
                @endif
                <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800" type="button"
                    onclick="sendWhatsAppMessage('{{ $cart_detail->product->name }}', '{{ $cart_detail->product->price }}', '{{ strlen($cart_detail->product->image) > 30 ? asset('storage/' . $cart_detail->product->image) : asset('images/fotoproduk/' . $cart_detail->product->image) }}')"
                    class="absolute bottom-4 right-4 lg:bottom-auto lg:top-4 lg:right-4 cursor-pointer border-2 border-yellow-500 text-yellow-500 bg-gray-900 hover:bg-gray-950 font-medium rounded-full text-xs sm:text-sm px-5 py-2.5 text-center inline-flex items-center">
                    Tanya Admin tentang produk ini?
                </button>
            </div>
            <div class="flex flex-col justify-center">
                <div class="h-full flex flex-col justify-center">
                    <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-4xl font-extrabold text-gray-900">{{ $cart_detail->product->name }}</h1>
                    @if ($cart_detail->product->discount != 0)
                        <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mt-2 text-xl font-semibold text-gray-900">Rp.
                            {{ number_format($cart_detail->product->countDiscount(), 0, ',', '.') }} <span
                                class="text-sm font-medium">({{ $cart_detail->product->weight }} gram)</span></p>
                    @else
                        <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mt-2 text-xl font-semibold text-gray-900">Rp.
                            {{ number_format($cart_detail->product->price, 0, ',', '.') }} <span
                                class="text-sm font-medium">({{ $cart_detail->product->weight }} gram)</span>
                        </p>
                    @endif
                    <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="mt-4 text-base font-medium text-gray-900">Ketersediaan stok: <span
                            class="underline underline-offset-2 decoration-4 decoration-yellow-500">{{ $cart_detail->product->stock }}
                            buah</span>
                    </p>
                    <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="h-px my-4 border-0 bg-gray-400">
                    <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-base font-medium text-gray-900 break-words whitespace-normal text-left">
                        {{ $cart_detail->product->description }}
                    </p>
                    <div class="max-w-xs mt-8">
                        <label data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            for="{{ $cart_detail->product->id }}"
                            class="block mb-2 text-sm font-semibold text-gray-900">Pilih jumlah:</label>
                        <form action="{{ route('member.carts.update', $cart_detail->id) }}" method="POST">
                            @method('patch')
                            @csrf
                            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="relative flex items-center max-w-[8rem]">
                                <button type="button" id="{{ 'input-decrement-' . $cart_detail->product->id }}"
                                    onClick="changeQuantity('{{ $cart_detail->product->id }}', -1, '{{ $cart_detail->product->price }}')"
                                    class="cursor-pointer bg-gray-900 hover:bg-gray-800 border-gray-900 border rounded-s-lg p-3 h-11">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="{{ 'input-' . $cart_detail->product->id }}" name="quantity"
                                    value="{{ old('quantity', $cart_detail->quantity) }}" data-input-counter
                                    data-input-counter-min="1" aria-describedby="helper-text-explanation"
                                    class="border-x-0 h-11 text-center text-sm block w-full py-2.5 bg-gray-900 border-gray-900 placeholder-gray-800 text-white"
                                    required>
                                <button type="button" id="{{ 'input-increment-' . $cart_detail->product->id }}"
                                    onClick="changeQuantity('{{ $cart_detail->product->id }}', 1, '{{ $cart_detail->product->price }}')"
                                    class="cursor-pointer bg-gray-900 hover:bg-gray-800 border-gray-900 border rounded-e-lg p-3 h-11 ">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                            <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                id="helper-text-explanation" class="mt-2 text-sm text-gray-600">Mohon
                                isikan
                                jumlah pemesanan anda.</p>
                            @error('quantity')
                                <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    class="mt-1 text-sm text-red-500"><span class="font-medium">{{ $message }}</p>
                            @enderror
                            @if (session('over_quantity'))
                                <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    class="mt-1 text-sm text-red-500"><span
                                        class="font-medium">{{ session('over_quantity') }}</p>
                            @endif
                    </div>
                    <div class="flex flex-row mt-4 items-center">
                        <label data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            for="cost" class="text-sm font-semibold text-gray-900">Subtotal:</label>
                        <input data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            type="text" id="cost" name="cost" aria-label="disabled input 2"
                            class="text-center ml-2 border {{ $errors->has('cost') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-gray-300 border-yellow-500 text-gray-600 placeholder-gray-400 focus:ring-yellow-500 focus:border-yellow-500' }} text-sm rounded-lg block w-5/12 sm:w-3/12 p-2.5 cursor-not-allowed"
                            value="{{ old('cost', number_format($cart_detail->price, 0, ',', '.')) }}" readonly>
                    </div>
                    @error('cost')
                        <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mt-1 text-sm text-red-500"><span class="font-medium">{{ $message }}
                        </p>
                    @enderror
                    <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="h-px my-6 border-0 bg-gray-400">
                    <div class="flex flex-row justify-center">
                        <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            type="submit"
                            class="cursor-pointer text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-2.5 text-center inline-flex items-center">
                            Perbarui Pesanan
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col h-full">
                <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="text-2xl lg:text-3xl font-semibold text-gray-900 sm:text-center lg:text-start">Ulasan Produk
                </h1>
                <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="h-px my-2 border-0 bg-gray-400">
                <div
                    class="flex flex-col-reverse @if (count($testimonies) == 0) h-full justify-center items-center @endif">
                    @if (count($testimonies) > 0)
                        @foreach ($testimonies as $testimony)
                            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="flex flex-row gap-x-3 mt-3">
                                <div class="flex-none">
                                    @if (Auth::user()->profile_picture == null)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="w-12 h-12 rounded-full text-gray-900">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    @else
                                        @if (strlen(Auth::user()->profile_picture) > 25)
                                            <img class="w-12 h-12 object-top object-cover rounded-full overflow-hidden"
                                                src="{{ asset('storage/' . $testimony->user->profile_picture) }}"
                                                alt="{{ $testimony->user->name }}">
                                        @else
                                            <img class="w-12 h-12 object-top object-cover rounded-full overflow-hidden"
                                                src="/images/{{ $testimony->user->profile_picture }}"
                                                alt="{{ $testimony->user->name }}">
                                        @endif
                                    @endif
                                </div>
                                <div class="flex flex-col mt-1">
                                    <h4 class="text-base font-semibold text-gray-900">{{ $testimony->user->name }}
                                    </h4>
                                    <p class="text-sm font-normal text-gray-400">
                                        {{ date('d F Y', strtotime($testimony->date)) }}</p>
                                    @php
                                        $count_star = 0;
                                    @endphp
                                    <div class="flex flex-row mt-3">
                                        @for ($i = 1; $i <= $testimony->rating; $i++)
                                            <svg class="w-5 h-5 text-yellow-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                            @php
                                                $count_star += 1;
                                            @endphp
                                        @endfor
                                        @if ($count_star < 5)
                                            <svg class="w-5 h-5 text-yellow-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m11.479 1.712 2.367 4.8a.532.532 0 0 0 .4.292l5.294.769a.534.534 0 0 1 .3.91l-3.83 3.735a.534.534 0 0 0-.154.473l.9 5.272a.535.535 0 0 1-.775.563l-4.734-2.49a.536.536 0 0 0-.5 0l-4.73 2.487a.534.534 0 0 1-.775-.563l.9-5.272a.534.534 0 0 0-.154-.473L2.158 8.48a.534.534 0 0 1 .3-.911l5.294-.77a.532.532 0 0 0 .4-.292l2.367-4.8a.534.534 0 0 1 .96.004Z" />
                                            </svg>
                                        @endif
                                    </div>
                                    <p class="mt-2 text-sm font-normal text-gray-900">{{ $testimony->review }}</p>
                                    @if ($testimony->image)
                                        <img class="mt-3 w-2/6 object-center object-cover rounded-lg"
                                            src="{{ asset('storage/' . $testimony->image) }}"
                                            alt="{{ $testimony->user->name }}">
                                    @else
                                    @endif
                                    @if ($loop->first)
                                    @else
                                        <hr class="h-px mt-6 border-0 bg-gray-400">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="mt-4 col-span-2 flex flex-col items-center justify-center">
                            <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="text-center text-lg font-bold text-gray-400">Mohon maaf, belum
                                ada
                                review terkait
                                produk ini!
                            </h1>
                        </div>
                    @endif
                </div>
                <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="flex flex-row justify-center items-center mt-4">
                    {{ $testimonies->links() }}
                </div>
            </div>
            <div class="flex flex-col">
                <div class="flex flex-row justify-between items-center">
                    <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-xl sm:text-2xl lg:text-3xl font-semibold text-gray-900">Produk Lainnya</h1>
                    <a data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        href="{{ route('products') }}">
                        <p class="text-base font-medium text-yellow-500 hover:text-yellow-600">Lihat semua</p>
                    </a>
                </div>
                <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="h-px my-2 border-0 bg-gray-400">
                <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3 p-4 mx-auto">
                    @if (count($products_bestseller) > 0)
                        @foreach ($products_bestseller as $bestseller)
                            <div
                                class="relative hover:shadow-xl transform transition duration-500 hover:-translate-y-4 hover:z-40">
                                <a href="{{ route('member.products.show', $bestseller->product->id) }}">
                                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                        data-aos-duration="800"
                                        class="relative w-full h-full rounded-lg bg-gray-900 border-gray-800 mx-auto shadow-lg overflow-hidden flex flex-col">
                                        @if (strlen($bestseller->product->image) > 30)
                                            <img class="w-full h-auto"
                                                src="{{ asset('storage/' . $bestseller->product->image) }}"
                                                alt="{{ $bestseller->product->image }}" />
                                        @else
                                            <img class="w-full h-auto"
                                                src="/images/fotoproduk/{{ $bestseller->product->image }}"
                                                alt="{{ $bestseller->product->name }}" />
                                        @endif
                                        <div class="p-4 flex flex-col flex-grow">
                                            <h5
                                                class="text-xl sm:text-3xl md:text-2xl lg:text-xl font-bold tracking-tight text-yellow-500 text-center">
                                                {{ $bestseller->product->name }}
                                            </h5>
                                            <div class="flex flex-row w-full justify-center items-center">
                                                @if ($bestseller->product->discount != 0)
                                                    <p
                                                        class="text-base sm:text-sm md:text-lg lg:text-sm font-normal text-white text-center">
                                                        Rp.
                                                        {{ number_format($bestseller->product->price, 0, ',', '.') }}</p>
                                                    <p
                                                        class="ml-2 flex items-center text-base sm:text-sm md:text-lg lg:text-sm font-bold text-red-600 text-center">
                                                        <svg class="w-4 h-4 mr-2 text-red-600" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 14 10">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                        </svg>
                                                        (Rp.
                                                        {{ number_format($bestseller->product->countDiscount(), 0, ',', '.') }})
                                                    </p>
                                                @else
                                                    <p
                                                        class="text-base sm:text-sm md:text-lg lg:text-base font-normal text-white text-center">
                                                        Rp.
                                                        {{ number_format($bestseller->product->price, 0, ',', '.') }}</p>
                                                @endif
                                            </div>
                                            @if ($bestseller->product->stock == 0)
                                                <p
                                                    class="text-sm sm:text-base md:text-base lg:text-sm font-normal text-red-600 text-center mt-2">
                                                    Stock Habis!</p>
                                            @else
                                                <p
                                                    class="text-sm sm:text-base md:text-base lg:text-sm font-normal text-lime-500 text-center mt-2">
                                                    Tersisa {{ $bestseller->product->stock }}
                                                    stock
                                                    lagi!</p>
                                            @endif
                                            <div class="text-right">
                                                <!-- SVG icon di kanan bawah dari gambar -->
                                                <form
                                                    action="{{ route('member.wishlist.store', $bestseller->product->id) }}"
                                                    method="POST" class="flex justify-end items-center">
                                                    @csrf
                                                    @if (
                                                        $bestseller->product->wishlist->where('user_id', Auth::user()->id)->first() &&
                                                            $bestseller->product->wishlist->where('user_id', Auth::user()->id)->first()->favorite_status == '1')
                                                        <button type="submit">
                                                            <svg class="cursor-pointer w-6 h-6 text-red-600 hover:text-white"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor" viewBox="0 0 20 18">
                                                                <path
                                                                    d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z" />
                                                            </svg>
                                                        </button>
                                                    @else
                                                        <button type="submit">
                                                            <svg class="cursor-pointer w-6 h-6 text-white hover:text-red-600"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor" viewBox="0 0 20 18">
                                                                <path
                                                                    d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z" />
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </form>
                                            </div>
                                        </div>
                                </a>
                                <!-- Diskon di pojok kanan atas -->
                                @if ($bestseller->product->discount != 0)
                                    <div
                                        class="absolute top-0 right-0 m-4 text-lg text-red-600 rounded-lg font-bold bg-gray-900 p-2">
                                        {{ $bestseller->product->discount }}%</div>
                                @endif
                            </div>
                </div>
                @endforeach
            @else
                <div class="col-span-2 flex flex-col items-center justify-center">
                    <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-center text-lg font-bold text-gray-400">Mohon maaf, belum ada
                        produk best seller!</h1>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
    @php
        // Tentukan harga berdasarkan apakah produk memiliki diskon atau tidak
        $price = $cart_detail->product->countDiscount() ?? $cart_detail->product->price;
    @endphp

    <script>
        $(document).ready(function() {
            var inputElement = $('#input-{{ $cart_detail->product->id }}');
            var price = '{{ $price }}';

            // Fungsi untuk mengupdate subtotal
            function updateSubtotal() {
                var qty = parseInt(inputElement.val());
                qty = isNaN(qty) ? 0 : qty; // Pastikan qty adalah angka

                // Pastikan qty tidak kurang dari 1
                qty = Math.max(qty, 1);

                var total_price = qty * price;

                // Format uang rupiah dengan memanggil fungsi numberFormat
                var formattedTotal = numberFormat(total_price);

                // Mengatur nilai elemen HTML
                $('#cost').val(formattedTotal);
            }

            // Fungsi untuk memformat uang dengan pemisah ribuan
            function numberFormat(amount) {
                return amount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }

            // Menambahkan event listener untuk event input
            inputElement.on('input', function() {
                updateSubtotal();
            });

            // Fungsi untuk mengubah kuantitas
            function changeQuantity(change) {
                var currentQuantity = parseInt(inputElement.val());

                // Periksa apakah nilai input adalah NaN
                if (isNaN(currentQuantity)) {
                    currentQuantity = 0; // Ganti dengan nilai awal, misalnya 0
                }

                var newQuantity = Math.max(currentQuantity + change, 1);

                inputElement.val(newQuantity);
            }

            // Menambahkan event listener untuk tombol decrement
            $('#input-decrement-{{ $cart_detail->product->id }}').on('click', function() {
                changeQuantity(-1);
                updateSubtotal();
            });

            // Menambahkan event listener untuk tombol increment
            $('#input-increment-{{ $cart_detail->product->id }}').on('click', function() {
                changeQuantity(1);
                updateSubtotal();
            });
        });

        function sendWhatsAppMessage(productName, productPrice, productImage) {
            // Nomor telepon
            var phone = '6282230308030'; // Format internasional tanpa tanda plus

            // Pesan dengan informasi produk
            var message = `Halo Lisahwan, saya ingin menanyakan tentang produk berikut ini:

            Nama Produk: ${productName}
            Harga: ${productPrice}
            Gambar Produk: ${productImage}

(Tuliskan pertanyaanmu di sini)`;

            // Encode pesan agar sesuai dengan format URL
            var encodedMessage = encodeURIComponent(message);

            // Buat URL WhatsApp
            var whatsappUrl = 'https://wa.me/' + phone + '?text=' + encodedMessage;

            // Buka URL di jendela atau tab baru
            window.open(whatsappUrl, '_blank');
        }
    </script>
@endsection
