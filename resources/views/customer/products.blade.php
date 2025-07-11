@extends('layouts.frame_auth')

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
        @if (session('empty_stock'))
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mt-8 text-sm rounded-lg bg-gray-900 text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('empty_stock') }}
                </div>
            </div>
        @endif
        @if (session('empty_order'))
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mt-8 text-sm rounded-lg bg-gray-900 text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('empty_order') }}
                </div>
            </div>
        @endif
        @if (session('checkout_cancel'))
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mt-8 text-sm rounded-lg bg-gray-900 text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('checkout_cancel') }}
                </div>
            </div>
        @endif
        @if (session('addCart_success'))
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
                    <span class="font-medium">{!! session('addCart_success') !!}
                </div>
            </div>
        @endif
        @if (session('updateCart_success'))
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
                    <span class="font-medium">{{ session('updateCart_success') }}
                </div>
            </div>
        @endif
        @if (session('order_success'))
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
                    <span class="font-medium">{!! session('order_success') !!}
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
        @error('cancelPayment_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('cancelPayment_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ $message }}
                </div>
            </div>
        @enderror
        @error('failurePayment_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('failurePayment_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ $message }}
                </div>
            </div>
        @enderror
        @error('refundPayment_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('refundPayment_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ $message }}
                </div>
            </div>
        @enderror
        @error('partialRefundPayment_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('partialRefundPayment_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ $message }}
                </div>
            </div>
        @enderror
        @error('authorizePayment_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('authorizePayment_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ $message }}
                </div>
            </div>
        @enderror
        @error('waybillNotValid_error')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('waybillNotValid_error') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ $message }}
                </div>
            </div>
        @enderror
        <div class="mx-auto w-11/12 sm:max-w-screen-xl text-center sm:col-span-2 md:col-span-2 lg:col-span-4 mt-16">
            <h1 data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="mb-8 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
                {!! $pageTitle !!}</h1>
            <p data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="text-lg font-normal text-gray-900 lg:text-xl sm:px-16 lg:px-48">{!! $pageDescription !!}</p>
        </div>
        <div class = "grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 px-12 py-12 mx-auto">
            @foreach ($products as $product)
                @if ($product->special_status == 'ya')
                    <div
                        class="order-first relative hover:shadow-xl transform transition duration-500 hover:-translate-y-4 hover:z-40">
                        @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isOwner()))
                            <a href="{{ route('products') }}">
                            @else
                                <a href="{{ route('member.products.show', $product->id) }}">
                        @endif
                        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="relative w-full h-full rounded-lg bg-gray-900 border-gray-800 mx-auto shadow-lg overflow-hidden flex flex-col">
                            @if (strlen($product->image) > 30)
                                <img class="w-full h-auto" src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->image }}" />
                            @else
                                <img class="w-full h-auto" src="/images/fotoproduk/{{ $product->image }}"
                                    alt="{{ $product->image }}" />
                            @endif
                            <div class="p-4 flex flex-col flex-grow">
                                <div class="flex flex-row space-x-1 justify-center items-center">
                                    <svg class="me-1 w-5 h-5 text-yellow-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z" />
                                    </svg>
                                    <h5
                                        class="sm:leading-6 md:leading-normal lg:leading-normal text-xl sm:text-2xl md:text-2xl lg:text-xl font-bold tracking-tight text-yellow-500 text-center">
                                        {{ $product->name }}
                                    </h5>
                                    <svg class="me-1 w-5 h-5 text-yellow-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z" />
                                    </svg>
                                </div>
                                <div class="flex flex-row w-full justify-center items-center">
                                    @if ($product->discount != 0)
                                        <p
                                            class="text-base sm:text-sm md:text-lg lg:text-sm text-red-500 text-center font-bold line-through	">
                                            Rp.
                                            {{ number_format($product->price, 0, ',', '.') }}</p>
                                        <p
                                            class="ml-2 flex items-center text-base sm:text-sm md:text-lg lg:text-sm font-bold text-green-500 text-center">
                                            <svg class="w-4 h-4 mr-2 text-green-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                            Rp. {{ number_format($product->countDiscount(), 0, ',', '.') }}
                                        </p>
                                    @else
                                        <p
                                            class="text-base sm:text-sm md:text-lg lg:text-base font-normal text-white text-center">
                                            Rp.
                                            {{ number_format($product->price, 0, ',', '.') }}</p>
                                    @endif
                                </div>
                                @if ($product->stock == 0)
                                    <p
                                        class="text-sm sm:text-base md:text-base lg:text-sm font-normal text-red-600 text-center mt-2">
                                        Stock Habis!</p>
                                @else
                                    <p
                                        class="text-sm sm:text-base md:text-base lg:text-sm font-normal text-lime-500 text-center mt-2">
                                        Tersisa {{ $product->stock }}
                                        stock
                                        lagi!</p>
                                @endif
                                <div class="text-right">
                                    <!--SVG icon di kanan bawah dari gambar -->
                                    <form action="{{ route('member.wishlist.store', $product->id) }}" method="POST"
                                        class="flex justify-end items-center">
                                        @csrf
                                        @auth
                                            @if (
                                                $product->wishlist->where('user_id', Auth::user()->id)->first() &&
                                                    $product->wishlist->where('user_id', Auth::user()->id)->first()->favorite_status == '1')
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
                                        @endauth
                                        @guest
                                            <button type="submit">
                                                <svg class="cursor-pointer w-6 h-6 text-white hover:text-red-600"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 18">
                                                    <path
                                                        d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z" />
                                                </svg>
                                            </button>
                                        @endguest
                                    </form>
                                </div>
                            </div>
                            </a>
                            <!-- Diskon di pojok kanan atas -->
                            @if ($product->discount != 0)
                                <div
                                    class="absolute top-0 right-0 m-4 text-lg text-red-600 rounded-lg font-bold bg-gray-900 p-2">
                                    {{ $product->discount }}%</div>
                            @endif
                            <span
                                class="m-4 absolute top-0 left-0 inline-flex items-center bg-gray-900 text-yellow-500 text-sm font-semibold px-3 py-2 rounded-full">
                                <svg class="me-1 w-5 h-5 text-yellow-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="m12.75 20.66 6.184-7.098c2.677-2.884 2.559-6.506.754-8.705-.898-1.095-2.206-1.816-3.72-1.855-1.293-.034-2.652.43-3.963 1.442-1.315-1.012-2.678-1.476-3.973-1.442-1.515.04-2.825.76-3.724 1.855-1.806 2.201-1.915 5.823.772 8.706l6.183 7.097c.19.216.46.34.743.34a.985.985 0 0 0 .743-.34Z" />
                                </svg>
                                Produk Spesial
                            </span>
                        </div>
                    </div>
                @else
                    <div
                        class="relative hover:shadow-xl transform transition duration-500 hover:-translate-y-4 hover:z-40">
                        @if (Auth::check() && (Auth::user()->isAdmin() || Auth::user()->isOwner()))
                            <a href="{{ route('products') }}">
                            @else
                                <a href="{{ route('member.products.show', $product->id) }}">
                        @endif
                        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="relative w-full h-full rounded-lg bg-gray-900 border-gray-800 mx-auto shadow-lg overflow-hidden flex flex-col justify-between">
                            @if (strlen($product->image) > 30)
                                <img class="w-full h-auto" src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->image }}" />
                            @else
                                <img class="w-full h-auto" src="/images/fotoproduk/{{ $product->image }}"
                                    alt="{{ $product->image }}" />
                            @endif
                            <div class="p-4 flex flex-col flex-grow">
                                <h5
                                    class="sm:leading-6 md:leading-normal lg:leading-normal text-xl sm:text-2xl md:text-2xl lg:text-xl font-bold tracking-tight text-yellow-500 text-center">
                                    {{ $product->name }}
                                </h5>
                                <div class="flex flex-row w-full justify-center items-center">
                                    @if ($product->discount != 0)
                                        <p
                                            class="text-base sm:text-sm md:text-lg lg:text-sm text-red-500 text-center font-bold line-through	">
                                            Rp.
                                            {{ number_format($product->price, 0, ',', '.') }}</p>
                                        <p
                                            class="ml-2 flex items-center text-base sm:text-sm md:text-lg lg:text-sm font-bold text-green-500 text-center">
                                            <svg class="w-4 h-4 mr-2 text-green-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                            Rp. {{ number_format($product->countDiscount(), 0, ',', '.') }}
                                        </p>
                                    @else
                                        <p
                                            class="text-base sm:text-sm md:text-lg lg:text-base font-normal text-white text-center">
                                            Rp.
                                            {{ number_format($product->price, 0, ',', '.') }}</p>
                                    @endif
                                </div>
                                @if ($product->stock == 0)
                                    <p
                                        class="text-sm sm:text-base md:text-base lg:text-sm font-normal text-red-600 text-center mt-2">
                                        Stock Habis!</p>
                                @else
                                    <p
                                        class="text-sm sm:text-base md:text-base lg:text-sm font-normal text-lime-500 text-center mt-2">
                                        Tersisa {{ $product->stock }}
                                        stock
                                        lagi!</p>
                                @endif
                                <!--SVG icon di kanan bawah dari gambar -->
                                <div class="text-right">
                                    <form action="{{ route('member.wishlist.store', $product->id) }}" method="POST"
                                        class="flex justify-end items-center">
                                        @csrf
                                        @auth
                                            @if (
                                                $product->wishlist->where('user_id', Auth::user()->id)->first() &&
                                                    $product->wishlist->where('user_id', Auth::user()->id)->first()->favorite_status == '1')
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
                                        @endauth
                                        @guest
                                            <button type="submit">
                                                <svg class="cursor-pointer w-6 h-6 text-white hover:text-red-600"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 18">
                                                    <path
                                                        d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z" />
                                                </svg>
                                            </button>
                                        @endguest
                                    </form>
                                </div>
                            </div>
                            </a>
                            <!-- Diskon di pojok kanan atas -->
                            @if ($product->discount != 0)
                                <div
                                    class="absolute top-0 right-0 m-4 text-lg text-red-600 rounded-lg font-bold bg-gray-900 p-2">
                                    {{ $product->discount }}%</div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
