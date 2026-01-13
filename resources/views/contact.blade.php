@extends('layouts.frame_auth')

@section('content_page')
    <section style="background-image: url('/images/fotoproduk/GalleryCarousel_8.jpg')"
        class="bg-center bg-cover bg-no-repeat bg-gray-700 bg-blend-multiply">
        <div class="px-4 py-20 mx-auto max-w-screen-xl text-center text-white flex flex-col gap-10">
            <div>
                <h2 data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="text-center mb-4 text-4xl font-bold px-4 lg:px-0">Segera Dapatkan <mark
                        class="px-2 text-yellow-500 bg-gray-900 rounded">Produk Lisahwan</mark>
                    di Tangan Anda!</h2>
                <h2 data-aos="fade-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="text-center text-4xl font-bold">Anda Dapat Menghubungi Kami Melalui,</h2>
            </div>

            <div class="flex flex-col lg:flex-row justify-evenly items-center gap-y-4 lg:gap-y-0">
                <a data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    href="https://api.whatsapp.com/send?phone=6282230308030" target="_blank" class="m-auto">
                    <button type="button" data-te-ripple-init data-te-ripple-color="light"
                        class="flex justify-center items-center inline-block rounded-lg px-4 py-2.5 text-xs font-medium leading-normal text-white shadow-md bg-green-500 hover:bg-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                        </svg>
                        <p class="ml-2 text-xl">Lisahwan</p>
                    </button>
                </a>
                <a data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    href="https://www.instagram.com/lisahwan" target="_blank" class="m-auto">
                    <button type="button" data-te-ripple-init data-te-ripple-color="light"
                        class="flex justify-center items-center inline-block rounded-lg px-4 py-2.5 text-xs font-medium leading-normal text-white shadow-md bg-pink-500 hover:bg-pink-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                        <p class="ml-2 text-xl">Lisahwan</p>

                    </button>
                </a>
                <a data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    href="https://www.tiktok.com/@lisahwan_official?_r=1&_t=ZS-931j0VRdAmq" target="_blank" class="m-auto">
                    <button type="button" data-te-ripple-init data-te-ripple-color="light"
                        class="flex justify-center items-center inline-block rounded-lg px-4 py-2.5 text-xs font-medium leading-normal text-white shadow-md bg-slate-950 hover:bg-slate-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M19.589 6.686a4.793 4.793 0 0 1-3.77-4.37V2h-3.45v13.672a2.889 2.889 0 1 1-2.889-2.889c.289 0 .567.045.832.127V9.4a6.346 6.346 0 0 0-.832-.056A6.328 6.328 0 1 0 15.808 15V8.873a8.268 8.268 0 0 0 4.781 1.526V7.027a4.818 4.818 0 0 1-.999-.341z" />
                        </svg>
                        <p class="ml-2 text-xl">Lisahwan</p>
                    </button>
                </a>
                <a data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    href="https://www.tokopedia.com/lisahwan" target="_blank" class="m-auto">
                    <button type="button" data-te-ripple-init data-te-ripple-color="light"
                        class="flex justify-center items-center inline-block rounded-lg px-3 py-1.5 text-xs font-medium leading-normal text-white shadow-md bg-lime-500 hover:bg-lime-600">
                        <img src="/images/tokopedia_logo.png" class="w-8" alt="Tokopedia">
                        <p class="ml-2 text-xl">Lisahwan</p>
                    </button>
                </a>
                <a data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    href="https://shopee.co.id/lisahwan" target="_blank" class="m-auto">
                    <button type="button" data-te-ripple-init data-te-ripple-color="light"
                        class="flex justify-center items-center inline-block rounded-lg px-3 py-2.5 text-xs font-medium leading-normal text-white shadow-md bg-orange-500 hover:bg-orange-600">
                        <img src="/images/shopee_logo.png" class="w-8" alt="Tokopedia">
                        <p class="ml-2 text-xl">Lisahwan</p>
                    </button>
                </a>
            </div>

            <iframe data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="mx-auto w-full px-3 md:px-6 lg:px-20 h-screen shadow-lg mt-2 lg:mt-6"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2250965699677!2d112.7342297!3d-7.3285967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb41eea3ee81%3A0x83d2a1606a6f6179!2sJl.%20Jemur%20Andayani%20XIII%20No.6%2C%20Jemur%20Wonosari%2C%20Kec.%20Wonocolo%2C%20Surabaya%2C%20Jawa%20Timur%2060237!5e0!3m2!1sen!2sid!4v1703209712146!5m2!1sen!2sid"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
