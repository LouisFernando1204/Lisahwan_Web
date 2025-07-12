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
        @if (session('addTestimony_success'))
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
                    <span class="font-medium">{{ session('addTestimony_success') }}
                </div>
            </div>
        @endif
        @if (session('updateTestimony_success'))
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
                    <span class="font-medium">{{ session('updateTestimony_success') }}
                </div>
            </div>
        @endif
        @if (session('deleteTestimony_success'))
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
                    <span class="font-medium">{!! session('deleteTestimony_success') !!}
                </div>
            </div>
        @endif
        @error('review')
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
                    <span class="font-medium">{{ $message }}
                </div>
            </div>
        @enderror
        @error('rating')
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
                    <span class="font-medium">{{ $message }}
                </div>
            </div>
        @enderror
        @error('image')
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
                    <span class="font-medium">{{ $message }}
                </div>
            </div>
        @enderror
        <div
            class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-8 sm:gap-y-8 lg:gap-y-12 p-8 sm:p-12 mx-auto">
            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">
                @if (strlen($product->image) > 30)
                    <img class="object-contain rounded-lg drop-shadow-md" src="{{ asset('storage/' . $product->image) }}"
                        alt="{{ $product->name }}" />
                @else
                    <img class="object-contain rounded-lg drop-shadow-md" src="/images/fotoproduk/{{ $product->image }}"
                        alt="{{ $product->name }}">
                @endif
                <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800" type="button"
                    onclick="sendWhatsAppMessage('{{ $product->name }}', '{{ $product->price }}', '{{ strlen($product->image) > 30 ? asset('storage/' . $product->image) : asset('images/fotoproduk/' . $product->image) }}')"
                    class="absolute bottom-4 right-4 lg:bottom-auto lg:top-4 lg:right-4 cursor-pointer border-2 border-yellow-500 text-yellow-500 bg-gray-900 hover:bg-gray-950 font-medium rounded-full text-xs sm:text-sm px-5 py-2.5 text-center inline-flex items-center">
                    Tanya Admin tentang produk ini?
                </button>
            </div>
            <div class="flex flex-col justify-center">
                <div class="h-full flex flex-col justify-center">
                    <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-4xl font-extrabold text-gray-900">{{ $product->name }}</h1>
                    @if ($product->discount != 0)
                        <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mt-2 text-xl font-semibold text-gray-900">Rp.
                            {{ number_format($product->countDiscount(), 0, ',', '.') }} <span
                                class="text-sm font-medium">({{ $product->weight }} gram)</span></p>
                    @else
                        <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mt-2 text-xl font-semibold text-gray-900">Rp.
                            {{ number_format($product->price, 0, ',', '.') }} <span
                                class="text-sm font-medium">({{ $product->weight }} gram)</span>
                        </p>
                    @endif
                    <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="mt-4 text-base font-medium text-gray-900">Ketersediaan stok: <span
                            class="underline underline-offset-2 decoration-4 decoration-yellow-500">{{ $product->stock }}
                            buah</span>
                    </p>
                    <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="h-px my-4 border-0 bg-gray-400">
                    <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-base font-medium text-gray-900 break-words whitespace-normal text-left">
                        {{ $product->description }}
                    </p>
                    <div class="max-w-xs mt-8">
                        <label data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            for="{{ $product->id }}" class="block mb-2 text-sm font-semibold text-gray-900">Pilih
                            jumlah:</label>
                        <form action="{{ route('member.carts.add', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="submitButton" id="submitButton" value="">
                            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="relative flex items-center max-w-[8rem]">
                                <button type="button" id="{{ 'input-decrement-' . $product->id }}"
                                    onClick="changeQuantity('{{ $product->id }}', -1, '{{ $product->price }}')"
                                    class="cursor-pointer bg-gray-900 hover:bg-gray-800 border-gray-900 border rounded-s-lg p-3 h-11">
                                    <svg class="w-3 h-3 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>
                                <input type="text" id="{{ 'input-' . $product->id }}" name="quantity"
                                    value="{{ old('quantity', 0) }}" data-input-counter data-input-counter-min="1"
                                    aria-describedby="helper-text-explanation"
                                    class="border-x-0 h-11 text-center text-sm block w-full py-2.5 bg-gray-900 border-gray-900 placeholder-gray-800 text-white"
                                    required>
                                <button type="button" id="{{ 'input-increment-' . $product->id }}"
                                    onClick="changeQuantity('{{ $product->id }}', 1, '{{ $product->price }}')"
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
                            value="{{ old('cost', 0) }}" readonly>
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
                            type="submit" onclick="setSubmitButton('submit1')"
                            class="cursor-pointer border font-medium rounded-lg text-base px-5 py-2.5 me-2 border-yellow-500 text-yellow-500 hover:text-white hover:bg-yellow-500">Beli
                            Langsung</button>
                        <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            type="submit" onclick="setSubmitButton('submit2')"
                            class="cursor-pointer text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-2.5 text-center inline-flex items-center">
                            <svg class="w-3 h-3 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M9 1v16M1 9h16" />
                            </svg>
                            Keranjang
                        </button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col h-full">
                <div class="flex flex-row justify-between items-center">
                    <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-xl sm:text-2xl lg:text-3xl font-semibold text-gray-900">Ulasan Produk</h1>
                    @if ($check_order_user)
                        @if (!$check_testimonies)
                            <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                type="button" data-modal-target="add_testimony_modal"
                                data-modal-toggle="add_testimony_modal"
                                class="inline-flex cursor-pointer text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-sm px-3 py-2.5 text-center items-center">
                                <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z" />
                                </svg>Ulas Produk
                            </button>
                            <form action="{{ route('member.testimony.store', $product->id) }}" method="POST"
                                enctype="multipart/form-data" id="add_testimony_modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                @csrf
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative rounded-lg shadow bg-white">
                                        <button type="button"
                                            class="cursor-pointer absolute top-3 end-2.5 text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                                            data-modal-hide="add_testimony_modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <span class="mb-1 block text-lg font-bold text-gray-900">Ulas
                                                {{ $product->name }}</span>
                                            <div class="flex flex-col justify-center items-center w-full">
                                                <label for="review"
                                                    class="mb-2 block text-sm font-semibold text-gray-900">Review</label>
                                                <textarea id="review" name="review" rows="4"
                                                    class="{{ $errors->has('review') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                    placeholder="Berikan ulasan anda terhadap produk ini">{{ old('review') }}</textarea>
                                                <label for="rating"
                                                    class="mt-4 mb-2 block text-sm font-semibold text-gray-900">Rating</label>
                                                <input type="number" id="rating" name="rating"
                                                    aria-describedby="helper-text-explanation"
                                                    class="{{ $errors->has('review') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                    placeholder="Beri rating dari 1 - 5" min="1" max="5"
                                                    value="{{ old('rating') }}">
                                                <span class="mt-4 mb-2 block text-sm font-semibold text-gray-900">Upload
                                                    Foto
                                                    Ulasan
                                                    (Opsional)</span>
                                                <div id="existingImagePreviewId" class="mb-3"></div>
                                                <label for="image"
                                                    class="flex flex-col justify-center items-center w-full h-44 bg-gray-50 rounded-lg border-1 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100">
                                                    <input type="file" name="image" id="image" class="hidden"
                                                        onchange="displayImagePreview_UlasProduk(this)">
                                                    <div
                                                        class="flex flex-col justify-center items-center w-full pt-5 pb-6">
                                                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                        </svg>
                                                        <p class="mb-2 text-sm text-gray-500">
                                                            <span class="font-semibold">Klik untuk upload</span>
                                                        </p>
                                                        <p class="text-xs text-gray-500">PNG, JPG atau JPEG (Ukuran File
                                                            MAX.
                                                            5MB)
                                                        </p>
                                                    </div>
                                                </label>
                                            </div>
                                            <button type="submit"
                                                onclick="return confirm('Apakah anda yakin dengan ulasan ini?')"
                                                class="cursor-pointer mt-3 w-full text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-2.5 text-center items-center">
                                                Tambahkan Ulasan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <button data-aos="fade-left" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                type="button" data-modal-target="update_testimony_modal"
                                data-modal-toggle="update_testimony_modal"
                                class="inline-flex cursor-pointer text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-sm px-3 py-2.5 text-center items-center">
                                <svg class="w-4 h-4 mr-2 text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M18 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h3.546l3.2 3.659a1 1 0 0 0 1.506 0L13.454 14H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-8 10H5a1 1 0 0 1 0-2h5a1 1 0 1 1 0 2Zm5-4H5a1 1 0 0 1 0-2h10a1 1 0 1 1 0 2Z" />
                                </svg>Edit Ulasan
                            </button>
                            <form action="{{ route('member.testimony.update', $product->id) }}" method="POST"
                                enctype="multipart/form-data" id="update_testimony_modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                @method('patch')
                                @csrf
                                <input type="hidden" name="oldImage" value="{{ $check_testimonies->image }}">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative rounded-lg shadow bg-white">
                                        <button type="button"
                                            class="cursor-pointer absolute top-3 end-2.5 text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                                            data-modal-hide="update_testimony_modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <span class="mb-1 block text-lg font-bold text-gray-900">Ulas
                                                {{ $product->name }}</span>
                                            <div class="flex flex-col justify-center items-center w-full">
                                                <label for="review"
                                                    class="mb-2 block text-sm font-semibold text-gray-900">Review</label>
                                                <textarea id="review" name="review" rows="4"
                                                    class="{{ $errors->has('review') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                    placeholder="Berikan ulasan anda terhadap produk ini">{{ old('review', $check_testimonies->review) }}</textarea>
                                                <label for="rating"
                                                    class="mt-4 mb-2 block text-sm font-semibold text-gray-900">Rating</label>
                                                <input type="number" id="rating" name="rating"
                                                    aria-describedby="helper-text-explanation"
                                                    class="{{ $errors->has('review') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                    placeholder="Beri rating dari 1 - 5" min="1" max="5"
                                                    value="{{ old('rating', $check_testimonies->rating) }}">
                                                <span class="mt-4 mb-2 block text-sm font-semibold text-gray-900">Upload
                                                    Foto
                                                    Ulasan
                                                    (Opsional)</span>
                                                <div id="existingImagePreviewId" class="mb-3">
                                                    @if ($check_testimonies->image)
                                                        <img src="{{ asset('storage/' . $check_testimonies->image) }}"
                                                            class="w-6/12 mx-auto rounded-lg object-cover" />
                                                    @endif
                                                </div>
                                                <label for="image"
                                                    class="flex flex-col justify-center items-center w-full h-44 bg-gray-50 rounded-lg border-1 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100">
                                                    <input type="file" name="image" id="image" class="hidden"
                                                        onchange="displayImagePreview_EditProduk(this, '{{ $check_testimonies->image }}', 'existingImagePreviewId')">
                                                    <div
                                                        class="flex flex-col justify-center items-center w-full pt-5 pb-6">
                                                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400"
                                                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                        </svg>
                                                        <p class="mb-2 text-sm text-gray-500">
                                                            <span class="font-semibold">Klik untuk upload</span>
                                                        </p>
                                                        <p class="text-xs text-gray-500">PNG, JPG atau JPEG (Ukuran File
                                                            MAX.
                                                            5MB)
                                                        </p>
                                                    </div>
                                                </label>
                                            </div>
                                            <button type="submit"
                                                onclick="return confirm('Apakah anda yakin dengan ulasan ini?')"
                                                class="cursor-pointer mt-3 w-full text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-2.5 text-center items-center">
                                                Edit Ulasan
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @else
                    @endif
                </div>
                <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="h-px my-2 border-0 bg-gray-400">
                <div
                    class="flex flex-col-reverse @if (count($testimonies) == 0) h-full justify-center items-center @endif">
                    @if (count($testimonies) > 0)
                        @foreach ($testimonies as $testimony)
                            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="flex flex-row gap-x-3 mt-3 w-full">
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
                                <div class="flex flex-col mt-1 w-full">
                                    <div class="flex flex-row justify-between items-center">
                                        <h4 class="text-base font-semibold text-gray-900">{{ $testimony->user->name }}
                                        </h4>
                                        @if ($testimony->user_id == Auth::user()->id)
                                            <form action="{{ route('member.testimony.destroy', $testimony->id) }}"
                                                method="POST">
                                                @method('delete')
                                                @csrf
                                                <button type="submit"
                                                    class="cursor-pointer text-sm font-medium text-yellow-500 hover:text-yellow-600"
                                                    onclick="return confirm('Apakah anda ingin menghapus ulasan ini?')">
                                                    Hapus Ulasan
                                                </button>
                                            </form>
                                        @else
                                        @endif
                                    </div>
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
                                            @php
                                                $differenceStar = 5 - $count_star;
                                            @endphp
                                            @for ($i = 1; $i <= $differenceStar; $i++)
                                                <svg class="w-5 h-5 text-yellow-500" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 21 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m11.479 1.712 2.367 4.8a.532.532 0 0 0 .4.292l5.294.769a.534.534 0 0 1 .3.91l-3.83 3.735a.534.534 0 0 0-.154.473l.9 5.272a.535.535 0 0 1-.775.563l-4.734-2.49a.536.536 0 0 0-.5 0l-4.73 2.487a.534.534 0 0 1-.775-.563l.9-5.272a.534.534 0 0 0-.154-.473L2.158 8.48a.534.534 0 0 1 .3-.911l5.294-.77a.532.532 0 0 0 .4-.292l2.367-4.8a.534.534 0 0 1 .96.004Z" />
                                                </svg>
                                            @endfor
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
                                produk ini!</h1>
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
                    class="h-px my-3 border-0 bg-gray-400">
                <div
                    class = "grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-3 p-4 mx-auto @if (count($products_bestseller) == 0) h-full justify-center items-center @endif">
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
                                                class="sm:leading-6 md:leading-normal lg:leading-normal text-xl sm:text-3xl md:text-2xl lg:text-xl font-bold tracking-tight text-yellow-500 text-center">
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
        $price = $product->countDiscount() ?? $product->price;
    @endphp
    <script>
        $(document).ready(function() {
            var inputElement = $('#input-{{ $product->id }}');
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

            // Menambahkan event listener untuk tombol decrement
            $('#input-decrement-{{ $product->id }}').on('click', function() {
                changeQuantity(-1);
                updateSubtotal();
            });

            // Menambahkan event listener untuk tombol increment
            $('#input-increment-{{ $product->id }}').on('click', function() {
                changeQuantity(1);
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
        });

        function setSubmitButton(buttonId) {
            $('#submitButton').val(buttonId);
        }

        function displayImagePreview_UlasProduk(input) {
            var preview = $('#existingImagePreviewId');

            // Remove existing image
            preview.empty();

            // Display newly uploaded image
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $('<img>').attr('src', e.target.result).addClass(
                        'w-6/12 mx-auto rounded-lg object-cover');
                    preview.append(img);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function displayImagePreview_EditProduk(input, existingImageUrl, existingImagePreviewId) {
            var preview = $('#' + existingImagePreviewId);

            // Remove existing image
            preview.empty();

            // Display newly uploaded image
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $('<img>').attr('src', e.target.result).addClass(
                        'w-6/12 mx-auto rounded-lg object-cover');
                    preview.append(img);
                };
                reader.readAsDataURL(input.files[0]);
            } else if (existingImageUrl) {
                // Display existing image if available
                var existingImg = $('<img>').attr('src', '{{ asset('') }}' + existingImageUrl).addClass(
                    'w-6/12 mx-auto rounded-lg object-cover');
                preview.append(existingImg);
            }
        }

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
