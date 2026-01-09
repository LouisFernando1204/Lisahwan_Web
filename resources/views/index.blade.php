@extends('layouts.frame')

@section('content_page')
    <section>
        <div class="gap-12 items-center py-8 px-8 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-16">
            <div class="font-light sm:text-lg text-gray-500">
                <h2 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="mb-3 text-4xl tracking-tight font-extrabold text-gray-900">Brand Story Lisahwan
                </h2>
                <!-- Paragraf utama (always visible) -->
                <p data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800" class="mb-4">
                    Lisahwan berdiri sejak 2007. Berawal dari keluarga yang telah lama berkecimpung di dunia
                    kuliner dan baking. Nama Lisahwan merupakan perpaduan antara nama pemilik Lisa dan marga
                    Hwan, menjadi simbol komitmen terhadap kualitas, nilai keluarga, serta setiap produk
                    Lisahwan yang dibuat dengan hati, karakter, dan tanggung jawab.
                </p>
                <!-- Hidden content -->
                <div id="brandStoryMore" class="hidden">
                    <p data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800" class="mb-4">
                        Lisahwan hadir dengan produk camilan, lauk kering, hingga Spikoe Lisahwan, resep
                        keluarga yang kini telah menjadi ikon dan dikenal dengan teksturnya yang lembut serta
                        kaya rasa. Seluruh produk diracik menggunakan bahan berkualitas dengan sentuhan cita
                        rasa Nusantara.
                    </p>
                    <p data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800" class="mb-4">
                        Dalam perjalanannya, Lisahwan terus tumbuh menjadi brand yang dipercaya karena
                        konsistensi, kualitas, dan inovasi. Bagi Lisahwan, makanan bukan hanya soal rasa,
                        tetapi juga pengalaman, cerita, dan hubungan yang selalu dikenang oleh banyak hati.
                    </p>
                </div>
                <!-- Toggle button -->
                <button id="toggleBrandStory"
                    class="mb-6 text-sm text-yellow-500 font-medium hover:underline focus:outline-none">
                    Lihat lebih lanjut
                </button>
                <div class="flex flex-col sm:flex-row gap-y-2 sm:gap-y-0">
                    @if (!Auth::check())
                        <a data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            href="{{ route('register') }}"
                            class="sm:mr-2 cursor-pointer text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-3 text-center inline-flex items-center justify-center">
                            Order Sekarang
                            <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    @endif
                    <a data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800" href="/products"
                        class="cursor-pointer text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-3 text-center inline-flex items-center justify-center">
                        Lihat Produk
                        <svg class="w-5 h-5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M14 7h-4v3a1 1 0 0 1-2 0V7H6a1 1 0 0 0-.997.923l-.917 11.924A2 2 0 0 0 6.08 22h11.84a2 2 0 0 0 1.994-2.153l-.917-11.924A1 1 0 0 0 18 7h-2v3a1 1 0 1 1-2 0V7Zm-2-3a2 2 0 0 0-2 2v1H8V6a4 4 0 0 1 8 0v1h-2V6a2 2 0 0 0-2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800" class="mt-8 lg:mt-0">
                {{-- <img class="mb-2 sm:mb-4 lg:mb-0 w-full rounded-lg" src="/images/fotoproduk/GalleryCarousel_2.jpg"
                    alt="GalleryCarousel_2.jpg"> --}}
                <img class="mt-4 w-full rounded-lg" src="/images/fotoproduk/GalleryCarousel_8.jpg"
                    alt="GalleryCarousel_2.jpg">
                {{-- <img class="mb-2 sm:mb-4 lg:mb-0 w-full rounded-lg" src="/images/fotoproduk/GalleryCarousel_11.jpg"
                    alt="GalleryCarousel_2.jpg">
                <img class="mt-4 w-full lg:mt-10 rounded-lg" src="/images/fotoproduk/GalleryCarousel_5.jpg"
                    alt="GalleryCarousel_2.jpg"> --}}
            </div>
        </div>
    </section>

    <section class="bg-gray-900">
        <div class="py-8 px-8 mx-auto max-w-screen-xl lg:p-16">
            <div data-aos="fade-right" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="max-w-screen-lg mb-10 w-full">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-white">Apa saja yang spesial dari Lisahwan?</h2>
                <p class="sm:text-xl text-gray-400">
                    Produk Lisahwan dirancang untuk dinikmati oleh seluruh keluarga, mulai dari anak-anak hingga orang
                    dewasa dan orang tua. Dengan rasa yang sesuai selera serta kualitas premium, Lisahwan menjadi pilihan
                    untuk menemani momen kebersamaan keluarga sekaligus sebagai oleh-oleh spesial bercita rasa Nusantara.
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 lg:gap-12 mb-12">
                <!-- TRUST -->
                <div data-aos="fade-up" data-aos-duration="800" class="flex flex-col items-center text-center">
                    <svg class="w-6 h-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path d="M12 2L4 5v6c0 5.25 3.5 10.1 8 11.5 4.5-1.4 8-6.25 8-11.5V5l-8-3z" />
                    </svg>
                    <h3 class="mt-3 mb-2 text-xl font-bold text-yellow-500">Trust</h3>
                    <p class="text-gray-400">
                        Kepercayaan dibangun melalui konsistensi. Sejak 2007, Lisahwan menjaga kualitas rasa,
                        pemilihan bahan, dan proses produksi agar setiap produk selalu dapat diandalkan.
                    </p>
                </div>
                <!-- VALUE -->
                <div data-aos="fade-up" data-aos-duration="800" class="flex flex-col items-center text-center">
                    <svg class="w-6 h-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 18.657 3.172 10.828a4 4 0 010-5.656z" />
                    </svg>
                    <h3 class="mt-3 mb-2 text-xl font-bold text-yellow-500">Value</h3>
                    <p class="text-gray-400">
                        Setiap produk Lisahwan dibuat dari bahan pilihan dengan standar kualitas tinggi,
                        menghadirkan rasa khas Nusantara yang bernilai dan layak dibagikan.
                    </p>
                </div>
                <!-- EXPERIENCE -->
                <div data-aos="fade-up" data-aos-duration="800" class="flex flex-col items-center text-center">
                    <svg class="w-6 h-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.955a1 1 0 00.95.69h4.162c.969 0 1.371 1.24.588 1.81l-3.37 2.448a1 1 0 00-.364 1.118l1.286 3.955c.3.921-.755 1.688-1.54 1.118l-3.37-2.448a1 1 0 00-1.176 0l-3.37 2.448c-.784.57-1.838-.197-1.54-1.118l1.286-3.955a1 1 0 00-.364-1.118L2.012 9.382c-.783-.57-.38-1.81.588-1.81h4.162a1 1 0 00.95-.69l1.286-3.955z" />
                    </svg>
                    <h3 class="mt-3 mb-2 text-xl font-bold text-yellow-500">Experience</h3>
                    <p class="text-gray-400">
                        Lisahwan menghadirkan pengalaman menyeluruh, mulai dari rasa yang konsisten,
                        tampilan produk yang menarik, hingga pelayanan yang ramah dan berkesan.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 max-w-4xl mx-auto">
                <!-- HALAL -->
                <div data-aos="fade-up" data-aos-duration="800" class="flex flex-col items-center text-center">
                    <svg class="w-7 h-7 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10
                        10-4.477 10-10S17.523 2 12 2zm4.707 7.293a1 1 0 0 0-1.414 0L11 13.586
                        8.707 11.293a1 1 0 1 0-1.414 1.414l3 3a1 1 0 0 0 1.414 0l5-5a1 1 0 0 0 0-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                    <h3 class="mt-3 mb-2 text-xl font-bold text-yellow-500">
                        Halal
                    </h3>
                    <p class="text-gray-400">
                        Seluruh produk Lisahwan diproses dengan standar yang ketat dan telah
                        bersertifikasi halal, sebagai komitmen menghadirkan produk yang aman
                        dan berkualitas.
                    </p>
                </div>
                <!-- FAST RESPONSE -->
                <div data-aos="fade-up" data-aos-duration="800" class="flex flex-col items-center text-center">
                    <svg class="w-7 h-7 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path d="M11.3 1L1 11h6l-1 8 10.3-10H10l1.3-8z" />
                    </svg>
                    <h3 class="mt-3 mb-2 text-xl font-bold text-yellow-500">
                        Fast Response
                    </h3>
                    <p class="text-gray-400">
                        Kami berkomitmen memberikan respon cepat dan solutif agar setiap
                        kebutuhan pelanggan ditangani dengan tepat waktu.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="flex flex-col p-8 lg:p-16">
        <div class="flex flex-row justify-between items-center">
            <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="text-xl lg:text-3xl font-extrabold text-gray-900">Produk Bestseller</h1>
            <a data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                href="{{ route('products') }}">
                <p class="text-base font-medium text-yellow-500 hover:text-yellow-600">Lihat semua</p>
            </a>
        </div>
        <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
            class="h-px my-2 border-0 bg-gray-400">
        <div
            class = "md:w-full lg:w-4/6 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6 mt-4 mx-auto @if (count($products_bestseller) == 0) h-full justify-center items-center @endif">
            @if (count($products_bestseller) > 0)
                @foreach ($products_bestseller as $bestseller)
                    <div
                        class="w-full relative hover:shadow-xl transform transition duration-500 hover:-translate-y-4 hover:z-40 mx-auto">
                        <a href="{{ route('member.products.show', $bestseller->product->id) }}">
                            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="relative w-full h-full rounded-lg bg-gray-900 border-gray-800 mx-auto shadow-lg overflow-hidden flex flex-col">
                                @if (strlen($bestseller->product->image) > 30)
                                    <img class="w-full h-auto" src="{{ asset('storage/' . $bestseller->product->image) }}"
                                        alt="{{ $bestseller->product->image }}" />
                                @else
                                    <img class="w-full h-auto" src="/images/fotoproduk/{{ $bestseller->product->image }}"
                                        alt="{{ $bestseller->product->image }}" />
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
                                        @auth
                                            <!-- SVG icon di kanan bawah dari gambar -->
                                            <form action="{{ route('member.wishlist.store', $bestseller->product->id) }}"
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
    <script>
        $(document).ready(function() {
            let isExpanded = false;

            $('#toggleBrandStory').on('click', function() {
                if (!isExpanded) {
                    $('#brandStoryMore').slideDown(300);
                    $(this).text('Tutup');
                    isExpanded = true;
                } else {
                    $('#brandStoryMore').slideUp(300);
                    $(this).text('Lihat lebih lanjut');
                    isExpanded = false;
                }
            });
        });
    </script>
@endsection
