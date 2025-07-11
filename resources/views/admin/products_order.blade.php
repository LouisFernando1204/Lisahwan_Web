@extends('layouts.admin.frame_admin')

@section('content_page')
    <div class="flex flex-col items-center sm:ml-56 mt-36 sm:mt-36 h-full">
        @if (session('empty_stock'))
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mb-12 text-sm rounded-lg bg-gray-900 text-red-400"
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
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mb-12 text-sm rounded-lg bg-gray-900 text-red-400"
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
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mb-12 text-sm rounded-lg bg-gray-900 text-red-400"
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
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mb-12 text-sm rounded-lg bg-gray-900 text-green-400"
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
        @if (session('order_success'))
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mb-12 text-sm rounded-lg bg-gray-900 text-green-400"
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
        @if (session('over_quantity'))
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mb-12 text-sm rounded-lg bg-gray-900 text-red-400"
                role="alert">
                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">{{ session('over_quantity') }}
                </div>
            </div>
        @endif
        @error('quantity')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 mb-12 text-sm rounded-lg bg-gray-900 text-red-400"
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
        <div class="mx-auto w-11/12 sm:max-w-screen-xl text-center sm:col-span-2 md:col-span-2 lg:col-span-4">
            <h1 data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="mb-8 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
                {!! $pageTitle !!}</h1>
            <p data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="text-lg font-normal text-gray-900 lg:text-xl sm:px-16 lg:px-48">{!! $pageDescription !!}</p>
        </div>
        <div class = "grid grid-cols-1 lg:grid-cols-3 gap-4 px-12 py-12 mx-auto bg-neutral-200">
            @foreach ($products as $product)
                <div class="relative hover:shadow-xl transform transition duration-500 hover:-translate-y-4 hover:z-40">
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
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
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
                            @php
                                $lastQuantity = Session::get('last_quantity_' . $product->id);
                            @endphp
                            @if (Auth::user()->isAdmin())
                                <form action="{{ route('admin.products.add', $product->id) }}" method="POST"
                                    class="flex flex-row mx-auto space-x-2 justify-center mt-4">
                                    @csrf
                                    <input type="number" id="number-input" name="quantity"
                                        aria-describedby="helper-text-explanation"
                                        class="w-4/12 bg-white border-2 border-yelllow-500 text-gray-900 text-base rounded-lg focus:ring-yellow-500 focus:border-yellow-500 p-2"
                                        value="{{ isset($lastQuantity) ? $lastQuantity : 0 }}" min="0" required />
                                    <button type="submit"
                                        class="flex flex-row items-center justify-center bg-yellow-500 hover:bg-yellow-600 rounded-md p-2 pl-3 space-x-1">
                                        <span class="text-gray-900 text-base">Tambah</span>
                                        <svg class="w-6 h-6 text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                            @if (Auth::user()->isOwner())
                                <form action="{{ route('owner.products.add', $product->id) }}" method="POST"
                                    class="flex flex-row mx-auto space-x-2 justify-center mt-4">
                                    @csrf
                                    <input type="number" id="number-input" name="quantity"
                                        aria-describedby="helper-text-explanation"
                                        class="w-4/12 bg-white border-2 border-yelllow-500 text-gray-900 text-base rounded-lg focus:ring-yellow-500 focus:border-yellow-500 p-2"
                                        value="{{ isset($lastQuantity) ? $lastQuantity : 0 }}" min="0" required />
                                    <button type="submit"
                                        class="flex flex-row items-center justify-center bg-yellow-500 hover:bg-yellow-600 rounded-md p-2 pl-3 space-x-1">
                                        <span class="text-gray-900 text-base">Tambah</span>
                                        <svg class="w-6 h-6 text-gray-900" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        </div>

                        <!-- Diskon di pojok kanan atas -->
                        @if ($product->discount != 0)
                            <div
                                class="absolute top-0 right-0 m-4 text-lg text-red-600 rounded-lg font-bold bg-gray-900 p-2">
                                {{ $product->discount }}%</div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
