<nav class="bg-gray-900 w-full z-20 top-0 left-0 border-b border-black">
    <div class="flex flex-wrap items-center justify-between mx-auto py-4 px-4 md:px-8">
        <a href="/" class="flex items-center">
            <img src="/images/lisahwan_logo.png" class="mr-3 w-16" alt="Lisahwan Logo" />
        </a>
        <div class="flex md:order-2">

            <!-- Right Side Of Navbar -->
            <ul class="flex flex-row justify-center items-center gap-2 md:gap-4 mt-1 md:mt-0">
                @auth
                    @if (Auth::user()->isOwner())
                        <li>
                            <a href="{{ route('owner.admin') }}"
                                class="block py-2 pl-3 pr-4 {{ $active_5 ?? 'text-white rounded md:hover:text-yellow-500 md:p-0' }}">
                                <svg class="w-6 h-6 text-white hover:text-yellow-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M7.824 5.937a1 1 0 0 0 .726-.312 2.042 2.042 0 0 1 2.835-.065 1 1 0 0 0 1.388-1.441 3.994 3.994 0 0 0-5.674.13 1 1 0 0 0 .725 1.688Z" />
                                    <path
                                        d="M17 7A7 7 0 1 0 3 7a3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V7a5 5 0 1 1 10 0v7.083A2.92 2.92 0 0 1 12.083 17H12a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a1.993 1.993 0 0 0 1.722-1h.361a4.92 4.92 0 0 0 4.824-4H17a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3Z" />
                                </svg>
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->isAdmin())
                        <li>
                            <a href="{{ route('admin.admin') }}"
                                class="block py-2 pl-3 pr-4 {{ $active_5 ?? 'text-white rounded md:hover:text-yellow-500 md:p-0' }}">
                                <svg class="w-6 h-6 text-white hover:text-yellow-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M7.824 5.937a1 1 0 0 0 .726-.312 2.042 2.042 0 0 1 2.835-.065 1 1 0 0 0 1.388-1.441 3.994 3.994 0 0 0-5.674.13 1 1 0 0 0 .725 1.688Z" />
                                    <path
                                        d="M17 7A7 7 0 1 0 3 7a3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V7a5 5 0 1 1 10 0v7.083A2.92 2.92 0 0 1 12.083 17H12a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a1.993 1.993 0 0 0 1.722-1h.361a4.92 4.92 0 0 0 4.824-4H17a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3Z" />
                                </svg>
                            </a>
                        </li>
                    @endif

                    @if (Auth::user()->isMember())
                        {{-- cartnya hanya bisa diklik/show kalo member, kalo guest/admin/owner ga bisa jg --}}
                        <li>
                            <button type="button" data-drawer-target="drawer-right-example"
                                data-drawer-show="drawer-right-example" data-drawer-placement="right"
                                aria-controls="drawer-right-example" class="mt-1">
                                <div class="rounded-lg border border-yellow-500 border-0.5 p-2 relative">
                                    <svg class="w-6 h-6 text-yellow-500 " aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1"
                                            d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1" />
                                    </svg>
                                    @if (!empty($carts))
                                        <div
                                            class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900">
                                            {{ $carts->sum('quantity') }}</div>
                                    @endif
                                </div>
                            </button>
                        </li>
                    @endif

                    <!-- drawer component -->
                    <div id="drawer-right-example"
                        class="fixed top-0 right-0 z-40 w-full sm:w-7/12 lg:w-5/12 h-screen pt-6 p-5 overflow-y-auto transition-transform translate-x-full bg-gray-900"
                        tabindex="-1" aria-labelledby="drawer-right-label">
                        <div class="flex flex-row items-center mb-4 justify-between">
                            <h5 id="drawer-right-label"
                                class="inline-flex justify-center items-center text-xl sm:text-lg font-semibold text-yellow-500">
                                <svg class="w-6 h-6 mr-2 text-yellow-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1"
                                        d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1" />
                                </svg>Keranjang
                            </h5>
                            <button type="button" data-drawer-hide="drawer-right-example"
                                aria-controls="drawer-right-example"
                                class="cursor-pointer text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 inline-flex items-center justify-center hover:bg-yellow-500 hover:text-white">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close menu</span>
                            </button>
                        </div>
                        <div
                            class="flex flex-col-reverse mt-6 @if (empty($carts)) h-full justify-center items-center @endif">
                            @php
                                $countSubtotal = 0;
                            @endphp
                            @if (!empty($carts))
                                @foreach ($carts as $cart)
                                    <div class="flex flex-row items-center w-full">
                                        {{-- @if (strlen($cart->product->image) > 30)
                                            <img class="h-40 w-44 object-cover object-bottom rounded-lg drop-shadow-md"
                                                src="{{ asset('storage/' . $cart->product->image) }}"
                                                alt="{{ $cart->product->image }}" />
                                        @else
                                            <img class="h-40 w-44 object-cover object-bottom rounded-lg drop-shadow-md"
                                                src="/images/fotoproduk/{{ $cart->product->image }}"
                                                alt="{{ $cart->product->name }}">
                                        @endif --}}
                                        @if (strlen($cart->product->image) > 30)
                                            <img class="w-32 h-32 sm:w-40 sm:h-40 object-cover object-center rounded-lg drop-shadow-md shrink-0"
                                                src="{{ asset('storage/' . $cart->product->image) }}"
                                                alt="{{ $cart->product->image }}" />
                                        @else
                                            <img class="w-32 h-32 sm:w-40 sm:h-40 object-cover object-center rounded-lg drop-shadow-md shrink-0"
                                                src="/images/fotoproduk/{{ $cart->product->image }}"
                                                alt="{{ $cart->product->name }}">
                                        @endif
                                        <div class="flex flex-col ml-4 justify-center w-full space-y-8">
                                            <div>
                                                <p class="text-base sm:text-lg font-semibold text-white">
                                                    {{ $cart->product->name }}</p>
                                                <p class="text-xs sm:text-sm font-normal text-gray-400">
                                                    {{ $cart->quantity }} buah
                                                    ({{ $cart->weight }} gram)
                                                </p>
                                                <p class="text-sm sm:text-base font-medium text-white">Rp.
                                                    {{ number_format($cart->price, 0, ',', '.') }}
                                                </p>
                                            </div>
                                            <div>
                                                <div
                                                    class="flex flex-col sm:flex-row items-start sm:items-center sm:justify-between">
                                                    <form action="{{ route('member.carts.edit', $cart->product_id) }}"
                                                        method="GET">
                                                        @csrf
                                                        <button type="submit"
                                                            class="cursor-pointer text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-md text-xs sm:text-sm px-2 py-1 inline-flex items-center">
                                                            <svg class="w-4 h-4 sm:mr-1 text-white" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                viewBox="0 0 20 18">
                                                                <path
                                                                    d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                                                                <path
                                                                    d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                                                            </svg>
                                                            <span class="sm:inline-block">Ubah Pesanan</span>
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('member.carts.destroy', $cart->id) }}"
                                                        method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            class="cursor-pointer text-xs sm:text-sm font-medium text-yellow-500 hover:text-yellow-600"
                                                            onclick="return confirm('Apakah anda ingin menghapus pesanan ini?')">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $countSubtotal += $cart->price;
                                    @endphp
                                    @if (!$loop->last)
                                        <hr class="h-px my-4 border-0 bg-gray-400">
                                    @else
                                    @endif
                                @endforeach
                            @else
                                <div class="flex flex-col items-center justify-center">
                                    <h1 class="text-center text-xl font-bold text-gray-400">Keranjang
                                        anda kosong</h1>
                                    <a href="/products">
                                        <p class="text-center text-base font-normal text-yellow-500">Belanja sekarang!</p>
                                    </a>
                                </div>
                            @endif
                        </div>
                        @if ($countSubtotal)
                            <hr class="h-px my-7 border-2 border-yellow-500">
                            <div class="flex flex-row justify-between items-center">
                                <p class="text-lg font-medium text-white">
                                    Subtotal:
                                </p>
                                <p class="text-lg font-medium text-white">
                                    Rp. {{ number_format($countSubtotal, 0, ',', '.') }}
                                </p>
                            </div>
                            <p class="text-sm font-normal text-gray-400">
                                Ongkos kirim ditambahkan ketika checkout.
                            </p>
                            <form action="{{ route('member.checkout') }}" method="GET">
                                <button type="submit"
                                    class="cursor-pointer mt-7 w-full text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-2.5 text-center items-center">
                                    Checkout
                                </button>
                            </form>
                            <a href="/products" class="mt-3 flex flex-row justify-center items-center w-full">
                                <p class="text-sm font-normal text-gray-400">
                                    atau <span class="text-yellow-500">Lanjut Belanja</span>
                                </p>
                                <svg class="ml-1 w-4 h-4 text-yellow-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="1" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        @endif
                    </div>
                @endauth
                <!-- Authentication Links -->
                @guest
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring focus:ring-gray-500"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-12 h-12 rounded-full text-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            <p class="text-sm text-gray-900" role="none">
                                Segera daftarkan diri anda!
                            </p>
                        </div>
                        <ul class="py-1" role="none">
                            <li>
                                <a href="{{ route('register') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-500"
                                    role="menuitem">Daftar</a>
                            </li>
                            <li>
                                <a href="{{ route('login') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-500"
                                    role="menuitem">Masuk</a>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="">
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring focus:ring-gray-500"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            @if (is_null(Auth::user()->profile_picture))
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-10 h-10 rounded-full text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            @else
                                @if (Auth::user()->isAdmin() || Auth::user()->isOwner())
                                    <img class="w-10 h-10 rounded-full object-cover"
                                        src="{{ asset('images/' . Auth::user()->profile_picture) }}" alt="user photo">
                                @else
                                    @if (strlen(Auth::user()->profile_picture) > 25)
                                        <img class="w-10 h-10 rounded-full object-cover"
                                            src="{{ asset('storage/' . Auth::user()->profile_picture) }}"
                                            alt="user photo">
                                    @else
                                        <img class="w-10 h-10 rounded-full object-cover"
                                            src="/images/{{ Auth::user()->profile_picture }}" alt="user photo">
                                    @endif
                                @endif
                            @endif
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                        id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                            @if (Auth::user()->isOwner())
                                <p class="text-sm text-gray-900" role="none">
                                    Selamat datang kembali, Owner!
                                </p>
                            @elseif (Auth::user()->isAdmin())
                                <p class="text-sm text-gray-900" role="none">
                                    Selamat datang kembali, Admin!
                                </p>
                            @else
                                <p class="text-sm text-gray-900" role="none">
                                    Sudahkah nyemil Lisahwan hari ini?
                                </p>
                            @endif
                            <br>
                            <p class="text-sm text-gray-900" role="none">
                                {{ Auth::user()->name }}
                            </p>
                            <p class="text-sm font-medium text-gray-900 truncate" role="none">
                                {{ Auth::user()->email }}
                            </p>
                            @if (Session::has('pointStatus'))
                                @if ($reward_now <= $countSubtotal + $shipment_price + $admin_fee)
                                    <p class="flex flex-row mt-4 text-sm text-gray-900 font-semibold truncate"
                                        role="none">
                                        Poin:
                                        {{ abs(number_format(0, 0, ',', '.')) }}
                                        <img src="/images/coin_icon.png" alt="Poin" class="w-4 h-4 ms-1">
                                    </p>
                                @else
                                    <p class="flex flex-row mt-4 text-sm text-gray-900 font-semibold truncate"
                                        role="none">
                                        Poin:
                                        {{ abs(number_format(($countSubtotal + $shipment_price + $admin_fee - $reward_now) / $point->money_per_poin, 0, ',', '')) }}
                                        <img src="/images/coin_icon.png" alt="Poin" class="w-4 h-4 ms-1">
                                    </p>
                                @endif
                            @else
                                <p class="flex flex-row mt-4 text-sm text-gray-900 font-semibold truncate" role="none">
                                    Poin: {{ number_format(Auth::user()->reward, 0, ',', '') }}<img
                                        src="/images/coin_icon.png" alt="Poin" class="w-4 h-4 ms-1">
                                </p>
                            @endif
                        </div>
                        <ul class="" role="none">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-500" role="menuitem">
                                    Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </ul>

            <button data-collapse-toggle="navbar-sticky" type="button"
                class="mt-2 ml-2 md:ml-4 inline-flex items-center p-2 w-10 h-10 justify-center text-sm bg-gray-900 border border-gray-500 text-gray-500 rounded-lg lg:hidden focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-sticky">

            <ul
                class="flex flex-col p-4 md:p-0 font-medium rounded-lg bg-gray-900 md:flex-row md:space-x-8  md:border-0 md:bg-gray-900">

                <li>
                    <a href="/"
                        class="block py-2 pl-3 pr-4 {{ $active_1 ?? 'text-white rounded md:hover:text-yellow-500 md:p-0' }}">Home</a>
                </li>
                <li>
                    <a href="/products"
                        class="block py-2 pl-3 pr-4 {{ $active_2 ?? 'text-white rounded md:hover:text-yellow-500 md:p-0' }}"
                        aria-current="page">Products</a>
                </li>
                @auth
                    @if (Auth::user()->isMember())
                        <li>
                            <a href="{{ route('member.wishlist') }}"
                                class="block py-2 pl-3 pr-4 {{ $active_wishlist ?? 'text-white rounded md:hover:text-yellow-500 md:p-0' }}"
                                aria-current="page">Wishlist</a>
                        </li>
                        <li>
                            <a href="{{ route('member.orderhistory') }}"
                                class="block py-2 pl-3 pr-4 {{ $active_history ?? 'text-white rounded md:hover:text-yellow-500 md:p-0' }}"
                                aria-current="page">Order History</a>
                        </li>
                    @endif
                @endauth

                <li>
                    <a href="/gallery"
                        class="block py-2 pl-3 pr-4 {{ $active_3 ?? 'text-white rounded md:hover:text-yellow-500 md:p-0' }}">Gallery</a>
                </li>

                <li>
                    <a href="/contactus"
                        class="block py-2 pl-3 pr-4 {{ $active_4 ?? 'text-white rounded md:hover:text-yellow-500 md:p-0' }}">Contact
                        us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
