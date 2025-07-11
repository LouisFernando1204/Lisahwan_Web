@extends('layouts.frame_nocarousel')

@section('content_page')
    <div class="flex flex-col items-center">
        @if (session('addWishlist_success'))
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
                    <span class="font-medium">{{ session('addWishlist_success') }}
                </div>
            </div>
        @endif
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
        @if (session('deleteWishlist_success'))
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
                    <span class="font-medium">{!! session('deleteWishlist_success') !!}
                </div>
            </div>
        @endif
        <div class="mx-auto w-11/12 sm:max-w-screen-xl text-center sm:col-span-2 md:col-span-2 lg:col-span-4 mt-16">
            <h1 data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="mb-8 font-extrabold tracking-tight leading-none text-gray-900 text-5xl sm:text-6xl">
                {!! $pageTitle !!}</h1>
            <p data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="font-normal text-gray-900 text-lg sm:text-xl sm:px-16 lg:px-48">{!! $pageDescription !!}</p>
        </div>
        <div class = "grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 px-12 py-12 mx-auto">
            @if ($wishlists->isNotEmpty())
                @foreach ($wishlists as $wishlist)
                    <div class="relative hover:shadow-xl transform transition duration-500 hover:-translate-y-4 hover:z-40">
                        <a href="{{ route('member.products.show', $wishlist->product->id) }}">
                            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="relative w-full h-full rounded-lg bg-gray-900 border-gray-800 mx-auto shadow-lg overflow-hidden flex flex-col">
                                @if (strlen($wishlist->product->image) > 30)
                                    <img class="w-full h-auto" src="{{ asset('storage/' . $wishlist->product->image) }}"
                                        alt="{{ $wishlist->product->image }}" />
                                @else
                                    <img class="w-full h-auto" src="/images/fotoproduk/{{ $wishlist->product->image }}"
                                        alt="{{ $wishlist->product->image }}" />
                                @endif
                                <div class="p-4 flex flex-col flex-grow">
                                    <h5
                                        class="sm:leading-6 md:leading-normal lg:leading-normal text-xl sm:text-2xl md:text-2xl lg:text-xl font-bold tracking-tight text-yellow-500 text-center">
                                        {{ $wishlist->product->name }}
                                    </h5>
                                    <div class="flex flex-row w-full justify-center items-center">
                                        @if ($wishlist->product->discount != 0)
                                            <p
                                                class="text-base sm:text-sm md:text-lg lg:text-sm font-normal text-white text-center">
                                                Rp.
                                                {{ number_format($wishlist->product->price, 0, ',', '.') }}</p>
                                            <p
                                                class="ml-2 flex items-center text-base sm:text-sm md:text-lg lg:text-sm font-bold text-red-600 text-center">
                                                <svg class="w-4 h-4 mr-2 text-red-600" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                </svg>
                                                (Rp. {{ number_format($wishlist->product->countDiscount(), 0, ',', '.') }})
                                            </p>
                                        @else
                                            <p
                                                class="text-base sm:text-sm md:text-lg lg:text-base font-normal text-white text-center">
                                                Rp.
                                                {{ number_format($wishlist->product->price, 0, ',', '.') }}</p>
                                        @endif
                                    </div>
                                    @if ($wishlist->product->stock == 0)
                                        <p
                                            class="text-sm sm:text-base md:text-base lg:text-sm font-normal text-red-600 text-center mt-2">
                                            Stock Habis!</p>
                                    @else
                                        <p
                                            class="text-sm sm:text-base md:text-base lg:text-sm font-normal text-lime-500 text-center mt-2">
                                            Tersisa {{ $wishlist->product->stock }}
                                            stock
                                            lagi!</p>
                                    @endif
                                    <div class="text-right">
                                        <form action="{{ route('member.wishlist.store', $wishlist->product->id) }}"
                                            method="POST" class="flex justify-end items-center">
                                            @csrf
                                            @if ($wishlist->favorite_status = '1')
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
                        @if ($wishlist->product->discount != 0)
                            <div
                                class="absolute top-0 right-0 m-4 text-lg text-red-600 rounded-lg font-bold bg-gray-900 p-2">
                                {{ $wishlist->product->discount }}%</div>
                        @endif
                    </div>
        </div>
        @endforeach
    @else
        <div class="flex flex-col col-span-4 items-center justify-center sm:p-12 md:p-28 lg:p-48">
            <h1 data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="text-center text-xl font-bold text-gray-400">Oops! Anda belum punya produk
                favorit!</h1>
            <a href="{{ route('products') }}">
                <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="text-center text-base font-normal text-yellow-500">Tambahkan produk favorit ke Wishlist
                    sekarang!</p>
            </a>
        </div>
        @endif
    </div>
@endsection
