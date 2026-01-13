@extends('layouts.admin.frame_admin')

@section('content_page')
    <section class="bg-neutral-200 p-2 sm:p-4 antialiased">
        <div class="bg-neutral-200 mx-auto max-w-screen-2xl pt-20 sm:pt-24 sm:ml-56">
            <div
                class="flex flex-col justify-center items-center w-full {{ session('updateProductImage_success') || session('addStock_success') || $errors->has('stock') || $errors->has('image') ? 'mb-6 mt-10 sm:mb-10 sm:mt-4' : '' }}">
                @error('stock')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('stock') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('image') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @if (session('addStock_success'))
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 text-sm rounded-lg bg-gray-900 text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ session('addStock_success') }}
                        </div>
                    </div>
                @endif
                @if (session('updateProductImage_success'))
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 text-sm rounded-lg bg-gray-900 text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ session('updateProductImage_success') }}
                        </div>
                    </div>
                @endif
            </div>
            <div
                class="flex flex-col bg-white relative shadow-md rounded-md sm:rounded-lg overflow-hidden p-8 m-2 mt-8 sm:m-0">
                <div class="flex flex-col lg:flex-row gap-6 lg:h-96">
                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="relative p-4 bg-gray-100 rounded-lg">
                        @if (strlen($productDetail->image) > 25)
                            <img src="{{ asset('storage/' . $productDetail->image) }}"
                                class="h-full w-96 object-contain rounded-lg" alt={{ $productDetail->name }}>
                        @else
                            <img src="/images/fotoproduk/{{ $productDetail->image }}"
                                class="h-full w-96 object-contain rounded-lg" alt={{ $productDetail->name }}>
                        @endif
                        <div class="absolute top-0 right-0 m-4 text-base text-red-600 rounded-lg font-bold bg-gray-900 p-4">
                            {{ $productDetail->discount }}%</div>
                    </div>
                    <div class="flex flex-col justify-between">
                        <div>
                            <h4 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="mb-2 leading-none text-xl font-semibold text-gray-900">
                                {{ $productDetail->name }}</h4>
                            <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="mb-1 text-base font-normal text-gray-900">
                                {{ $productDetail->description }}</h5>
                            @if ($productDetail->discount != 0)
                                <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    class="mb-1 text-base font-medium text-red-600">Rp.
                                    {{ number_format($productDetail->countDiscount(), 0, ',', '.') }}</h5>
                            @else
                                <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    class="mb-1 text-base font-normal text-gray-900">Rp.
                                    {{ number_format($productDetail->price, 0, ',', '.') }}</h5>
                            @endif
                            <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="mb-1 text-base font-normal text-gray-900">
                                {{ $productDetail->weight }} gram</h5>
                            <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="mb-5 text-base font-normal text-gray-900">
                                {{ $productDetail->stock }} buah</h5>
                            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="flex flex-col space-y-2 sm:space-y-0 sm:flex-row sm:space-x-2 mb-4">
                                <div class="flex flex-row">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $productDetail->testimony->pluck('rating')->average())
                                            <svg class="w-5 h-5 text-yellow-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                                <path
                                                    d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                            </svg>
                                        @else
                                            <svg class="w-5 h-5 text-yellow-500" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m11.479 1.712 2.367 4.8a.532.532 0 0 0 .4.292l5.294.769a.534.534 0 0 1 .3.91l-3.83 3.735a.534.534 0 0 0-.154.473l.9 5.272a.535.535 0 0 1-.775.563l-4.734-2.49a.536.536 0 0 0-.5 0l-4.73 2.487a.534.534 0 0 1-.775-.563l.9-5.272a.534.534 0 0 0-.154-.473L2.158 8.48a.534.534 0 0 1 .3-.911l5.294-.77a.532.532 0 0 0 .4-.292l2.367-4.8a.534.534 0 0 1 .96.004Z" />
                                            </svg>
                                        @endif
                                        </svg>
                                    @endfor
                                </div>
                                @if ($productDetail->testimony->isNotEmpty())
                                    <span
                                        class="text-gray-600">{{ number_format($productDetail->testimony->pluck('rating')->average(), 2) }}</span>
                                @else
                                    <span class="text-gray-600">Belum ada review.</span>
                                @endif
                            </div>
                        </div>
                        <div>
                            <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                type="button" data-modal-target="update-image-modal"
                                data-modal-toggle="update-image-modal"
                                class="w-full py-2 px-3 flex justify-center items-center text-sm font-medium text-center text-gray-600 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                {{-- {{ $product_to_update = Product::where('id', $product->id)->first() }} --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                    <path fill-rule="evenodd"
                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                        clip-rule="evenodd" />
                                </svg>
                                Edit Foto Produk
                            </button>
                            <form data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                id="add-stock-form" action="{{ route('owner.admin_products.addStock', $productDetail) }}"
                                method="POST" enctype="multipart/form-data" class="flex flex-col space-y-2 w-full mt-4">
                                @method('put')
                                @csrf
                                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900">Tambah
                                    stok</label>
                                <div class="flex flex-row space-x-2 justify-center items-center">
                                    <input type="number" name="stock" id="stock"
                                        class="{{ $errors->has('stock') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} w-3/4 rounded-lg border-1 text-sm block p-2.5"
                                        placeholder="Contoh: 10" min="0" value="{{ old('stock') }}" required>
                                    <button type="submit"
                                        class="h-1/2 w-2/4 justify-center text-white inline-flex bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                        Tambah
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="h-full">
                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="mt-8 p-6 lg:p-2 w-full flex flex-col lg:flex-row justify-between items-center font-bold text-gray-700 bg-gray-200 text-base text-center">
                        <span data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mb-2 lg:m-2">Riwayat
                            Stok</span>
                        <div class="flex flex-col lg:flex-row lg:space-x-2 justify-center items-center">
                            <span data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="mt-2 lg:mt-0 flex flex-row justify-center items-center bg-green-300 text-green-900 text-sm text-center font-medium px-3 py-2 rounded-full">
                                <span class="w-2 h-2 me-2 bg-green-500 rounded-full"></span>
                                Stok ditambah hari ini: + {{ $total_addProduct_today }}
                            </span>
                            @if ($total_difference > 0)
                                <span data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    class="mt-2 lg:mt-0 flex flex-row justify-center items-center bg-green-300 text-green-900 text-sm text-center font-medium px-3 py-2 rounded-full">
                                    <span class="w-2 h-2 me-2 bg-green-500 rounded-full"></span>
                                    Sisa stok hari ini: {{ $total_difference }}
                                </span>
                            @else
                                <span data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    class="mt-2 lg:mt-0 flex flex-row justify-center items-center bg-red-300 text-red-900 text-sm text-center font-medium px-3 py-2 rounded-full">
                                    <span class="w-2 h-2 me-2 bg-red-500 rounded-full"></span>
                                    Sisa stok hari ini: {{ $total_difference }}
                                </span>
                            @endif
                            <span data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="mt-2 lg:mt-0 flex flex-row justify-center items-center bg-green-300 text-green-900 text-sm text-center font-medium px-3 py-2 rounded-full">
                                <span class="w-2 h-2 me-2 bg-green-500 rounded-full"></span>
                                Produk terjual hari ini: {{ $total_quantity_today }}
                            </span>
                        </div>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="text-xs text-gray-700 uppercase bg-gray-50">
                            <th scope="col" class="w-2/4 px-6 py-3 text-center">
                                Tanggal
                            </th>
                            <th scope="col" class="w-2/4 px-6 py-3 text-center">
                                Jumlah
                            </th>
                        </thead>
                        <tbody>
                            @if ($productDetail->production->count() == 0)
                                <tr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">
                                    <td colspan="3" class="p-4 text-center">
                                        <p class="text-gray-400">Belum ada riwayat stok
                                        </p>
                                    </td>
                                </tr>
                            @else
                                @foreach ($productDetail->production as $stock_history)
                                    <tr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                        class="bg-white {{ $loop->last ? '' : 'border-b' }} text-center">
                                        <td scope="row" class="px-6 py-4">
                                            {{ date('d F Y', strtotime($stock_history->date)) }},
                                            {{ date('H:i', strtotime($stock_history->date)) }}
                                        </td>
                                        @if ($stock_history->type == 'tambah')
                                            <td class="px-6 py-4 text-green-400 font-medium">
                                                + {{ $stock_history->quantity }}
                                            </td>
                                        @elseif ($stock_history->type == 'kurang')
                                            <td class="px-6 py-4 text-red-600 font-medium">
                                                - {{ $stock_history->quantity }}
                                            </td>
                                        @elseif ($stock_history->type == 'restock')
                                            <td class="px-6 py-4 text-yellow-500 font-medium">
                                                + {{ $stock_history->quantity }}
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <form id="update-form" action="{{ route('owner.admin_products.updateImage', $productDetail) }}" method="POST"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="hidden" name="oldImage" value="{{ $productDetail->image }}">
            <div id="update-image-modal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] md:h-full">
                <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div id="update-modal-content" class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                        <!-- Modal header -->
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                            <h3 class="text-lg font-semibold text-gray-900">Edit Foto Produk</h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="update-image-modal">
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
                        <div class="mb-8">
                            <span class="block mb-2 text-sm font-medium text-gray-900">Gambar Produk</span>
                            <div id="existingImagePreviewId" class="mb-3">
                                @if (strlen($productDetail->image) > 25)
                                    <img src="{{ asset('storage/' . $productDetail->image) }}"
                                        class="w-1/2 md:w-1/4 mx-auto rounded-lg object-cover"
                                        alt="{{ $productDetail->name }}" />
                                @else
                                    <img src="/images/fotoproduk/{{ $productDetail->image }}"
                                        class="w-1/2 md:w-1/4 mx-auto rounded-lg object-cover"
                                        alt="{{ $productDetail->name }}" />
                                @endif
                            </div>
                            <label for="image"
                                class="flex flex-col justify-center items-center w-full h-44 bg-gray-50 rounded-lg border-1 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100">
                                <input type="file" name="image" id="image" class="hidden"
                                    onchange="displayImagePreview_Update(this, '{{ $productDetail->image }}', 'existingImagePreviewId')">
                                <div class="flex flex-col justify-center items-center w-full pt-5 pb-6">
                                    <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500">
                                        <span class="font-semibold">Klik untuk upload</span>
                                    </p>
                                    <p class="text-xs text-gray-500">PNG, JPG atau JPEG (Ukuran File MAX.
                                        5MB)
                                    </p>
                                </div>
                            </label>
                        </div>
                        <div class="items-center space-y-2 sm:flex sm:space-y-0 sm:space-x-2">
                            <button type="submit"
                                class="w-full sm:w-auto justify-center text-white inline-flex bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Perbarui
                                Produk</button>
                            <button data-modal-toggle="update-image-modal" type="button"
                                class="w-full sm:w-auto justify-center text-white inline-flex bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    <script>
        // buat display input file image preview

        function displayImagePreview_Add(input) {
            var preview = $('#existingImagePreviewId');

            // Remove existing image
            preview.empty();

            // Display newly uploaded image
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $('<img>').attr('src', e.target.result).addClass(
                        'w-1/2 md:w-1/4 mx-auto rounded-lg object-cover');
                    preview.append(img);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function displayImagePreview_Update(input, existingImageUrl, existingImagePreviewId) {
            var preview = $('#' + existingImagePreviewId);

            // Remove existing image
            preview.empty();

            // Display newly uploaded image
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var img = $('<img>').attr('src', e.target.result).addClass(
                        'w-1/2 md:w-1/4 mx-auto rounded-lg object-cover');
                    preview.append(img);
                };
                reader.readAsDataURL(input.files[0]);
            } else if (existingImageUrl) {
                // Display existing image if available
                var existingImg = $('<img>').attr('src', '{{ asset('') }}' + existingImageUrl).addClass(
                    'w-1/2 md:w-1/4 mx-auto rounded-lg object-cover');
                preview.append(existingImg);
            }
        }
    </script>
@endsection
