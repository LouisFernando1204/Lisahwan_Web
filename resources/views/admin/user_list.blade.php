@extends('layouts.admin.frame_admin')

@section('content_page')

    <!-- Start block -->
    <section class="bg-neutral-200 p-2 sm:p-4 antialiased">
        <div class="bg-neutral-200 mx-auto max-w-screen-2xl pt-20 sm:pt-24 sm:ml-56">
            <div
                class="flex flex-col justify-center items-center w-full {{ session('setPoint_success') || session('unsetPoint_success') || session('setCoupon_success') || session('deleteCoupon_success') || $errors->has('percentage_from_totalprice') || $errors->has('money_per_poin') || $errors->has('alreadySetPoint_error') || $errors->has('forgotPercentage_error') || $errors->has('forgotMoney_error') || $errors->has('forgotAll_error') || $errors->has('title') || $errors->has('starting_time') || $errors->has('ending_time') || $errors->has('discount') || $errors->has('quantity') ? 'mb-6 mt-10 sm:mb-10 sm:mt-4' : '' }}">
                @error('percentage_from_totalprice')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('percentage_from_totalprice') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('money_per_poin')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('money_per_poin') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('alreadySetPoint_error')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('alreadySetPoint_error') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('forgotPercentage_error')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('forgotPercentage_error') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('forgotMoney_error')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('forgotMoney_error') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('forgotAll_error')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('forgotAll_error') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('title')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('title') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('starting_time')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('starting_time') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('ending_time')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('ending_time') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('discount')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('discount') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('quantity')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 text-sm rounded-lg bg-gray-900 text-red-400"
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
                @if (session('setPoint_success'))
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 text-sm rounded-lg bg-gray-900 text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ session('setPoint_success') }}
                        </div>
                    </div>
                @endif
                @if (session('unsetPoint_success'))
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom"
                        data-aos-duration="800"class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 text-sm rounded-lg bg-gray-900 text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ session('unsetPoint_success') }}
                        </div>
                    </div>
                @endif
                @if (session('setCoupon_success'))
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 text-sm rounded-lg bg-gray-900 text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ session('setCoupon_success') }}
                        </div>
                    </div>
                @endif
                @if (session('deleteCoupon_success'))
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 text-sm rounded-lg bg-gray-900 text-green-400"
                        role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium">{{ session('deleteCoupon_success') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="bg-white relative shadow-md rounded-md sm:rounded-lg overflow-hidden m-2 mt-8 sm:m-0">
                <div
                    class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="flex-1 flex items-center space-x-2">
                        <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">
                            <span class="text-gray-500">Semua User:</span>
                            <span class="text-gray-500">{{ $users->count() }}</span>
                        </h5>
                    </div>
                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-lg font-bold text-gray-800">
                        Daftar User
                    </div>
                </div>
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t">
                    <div class="flex flex-col lg:flex-row justify-between w-full">
                        <form data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="flex items-center" action="{{ route('owner.admin_users') }}" method="GET">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="search" name="search" id="simple-search" placeholder="Cari user"
                                    required=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full pl-10 p-2">
                            </div>

                            <button type="submit" class="bg-yellow-500 ml-2 p-2 rounded-lg text-sm">
                                <p class="font-semibold text-white px-2">Search</p>
                            </button>
                        </form>
                        <div class="flex flex-col space-y-2 md:flex-row md:space-y-0 justify-center gap-x-2 mt-2 lg:mt-0">
                            <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                type="button" data-modal-target="add_coupon_modal" data-modal-toggle="add_coupon_modal"
                                class="flex flex-row items-center justify-center w-full lg:w-36 cursor-pointer text-yellow-500 bg-gray-900 hover:bg-gray-950 font-medium rounded-lg text-xs md:text-sm px-3 py-2.5 text-center">
                                <svg class="w-4 h-4 mr-2 text-yellow-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Atur Kupon
                            </button>
                            <div id="add_coupon_modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md  max-h-full">
                                    <div class="relative rounded-lg shadow bg-white">
                                        <button type="button"
                                            class="cursor-pointer absolute top-3 end-2.5 text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                                            data-modal-hide="add_coupon_modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center w-full block">
                                            <span class="mb-4 block text-lg font-bold text-gray-900 w-full">Atur
                                                Kupon</span>
                                            <div class="flex flex-col ">
                                                <div
                                                    class="flex flex-col justify-center items-center text-gray-900 w-full">
                                                    <form action="{{ route('owner.aturKupon') }}" method="POST"
                                                        enctype="multipart/form-data" class="w-full">
                                                        @csrf
                                                        <label for="title"
                                                            class="mb-2 block text-sm font-semibold text-gray-900">Nama</label>
                                                        <input type="text" id="title" name="title"
                                                            aria-describedby="helper-text-explanation"
                                                            class="{{ $errors->has('title') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5 mb-4"
                                                            value="{{ old('title') }}">
                                                        <label for="starting_time"
                                                            class="mb-2 block text-sm font-semibold text-gray-900">Tanggal
                                                            Mulai</label>
                                                        <input type="datetime-local" id="starting_time"
                                                            name="starting_time"
                                                            aria-describedby="helper-text-explanation"
                                                            class="{{ $errors->has('starting_time') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5 mb-4"
                                                            value="{{ old('starting_time') ? \Carbon\Carbon::parse(old('starting_time'))->format('Y-m-d\TH:i') : '' }}">
                                                        <label for="starting_time"
                                                            class="mb-2 block text-sm font-semibold text-gray-900">Tanggal
                                                            Berakhir</label>
                                                        <input type="datetime-local" id="ending_time" name="ending_time"
                                                            aria-describedby="helper-text-explanation"
                                                            class="{{ $errors->has('ending_time') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5 mb-4"
                                                            value="{{ old('ending_time') ? \Carbon\Carbon::parse(old('ending_time'))->format('Y-m-d\TH:i') : '' }}">
                                                        <label for="discount"
                                                            class="mb-2 block text-sm font-semibold text-gray-900">Diskon</label>
                                                        <input type="number" id="discount" name="discount"
                                                            aria-describedby="helper-text-explanation"
                                                            class="{{ $errors->has('discount') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5 mb-4"
                                                            placeholder="Rentang diskon dari 1-100" min="0"
                                                            value="{{ old('discount') }}">
                                                        <label for="quantity"
                                                            class="mb-2 block text-sm font-semibold text-gray-900">Jumlah</label>
                                                        <input type="number" id="quantity" name="quantity"
                                                            aria-describedby="helper-text-explanation"
                                                            class="{{ $errors->has('quantity') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                            placeholder="Jumlah kupon minimal 1" min="0"
                                                            value="{{ old('quantity') }}">
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah anda sudah yakin?')"
                                                            class="cursor-pointer mt-6 w-full text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-2.5 text-center items-center">
                                                            Terapkan Sistem Kupon
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if (!$coupons->isEmpty())
                                <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    type="button" data-modal-target="coupon_modal" data-modal-toggle="coupon_modal"
                                    class="flex flex-row items-center justify-center  w-full lg:w-36 cursor-pointer text-yellow-500 bg-gray-900 hover:bg-gray-950 font-medium rounded-lg text-xs md:text-sm px-3 py-2.5 text-center">
                                    <svg class="w-4 h-4 mr-2 text-yellow-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6Zm4.996 2a1 1 0 0 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 8a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 11a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Zm-4.004 3a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM11 14a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2h-6Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Kupon
                                </button>
                            @endif
                            <div id="coupon_modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-h-full">
                                    <div class="relative rounded-lg shadow bg-white">
                                        <button type="button"
                                            class="cursor-pointer absolute top-3 end-2.5 text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                                            data-modal-hide="coupon_modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center w-full block">
                                            <span class="mb-4 block text-lg font-bold text-gray-900 w-full">Atur
                                                Kupon</span>
                                            <div class="flex flex-col w-full overflow-x-auto">
                                                <table
                                                    class="w-full text-sm text-left rtl:text-right text-gray-900 border-0">
                                                    <thead class="text-xs text-gray-900 uppercase bg-yellow-500">
                                                        <tr>
                                                            <th scope="col" class="px-6 py-3 text-center">
                                                                Nama
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-center">
                                                                Tanggal Mulai
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-center">
                                                                Tanggal Akhir
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-center">
                                                                Diskon
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-center">
                                                                Jumlah
                                                            </th>
                                                            <th scope="col" class="px-6 py-3 text-center">
                                                                Aksi
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($coupons as $coupon)
                                                            <form action="{{ route('owner.ubahKupon', $coupon->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('put')
                                                                <tr
                                                                    class="bg-gray-100 border-b hover:bg-slate-200 text-center">
                                                                    <td class="p-4 text-gray-900">
                                                                        <input type="text" id="title"
                                                                            name="title"
                                                                            aria-describedby="helper-text-explanation"
                                                                            class="{{ $errors->has('title') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                                            value="{{ old('title', $coupon->title) }}">
                                                                    </td>
                                                                    <td class="p-4 text-gray-900">
                                                                        <input type="datetime-local" id="starting_time"
                                                                            name="starting_time"
                                                                            aria-describedby="helper-text-explanation"
                                                                            class="{{ $errors->has('starting_time') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                                            value="{{ $coupon->starting_time ? \Carbon\Carbon::parse($coupon->starting_time)->format('Y-m-d\TH:i') : '' }}">
                                                                    </td>
                                                                    <td class="p-4 text-gray-900">
                                                                        <input type="datetime-local" id="ending_time"
                                                                            name="ending_time"
                                                                            aria-describedby="helper-text-explanation"
                                                                            class="{{ $errors->has('ending_time') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                                            value="{{ $coupon->ending_time ? \Carbon\Carbon::parse($coupon->ending_time)->format('Y-m-d\TH:i') : '' }}">
                                                                    </td>
                                                                    <td class="p-4 text-gray-900">
                                                                        <input type="number" id="discount"
                                                                            name="discount"
                                                                            aria-describedby="helper-text-explanation"
                                                                            class="{{ $errors->has('discount') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                                            placeholder="Rentang diskon dari 1-100"
                                                                            min="0"
                                                                            value="{{ old('discount', $coupon->discount) }}">
                                                                    </td>
                                                                    <td class="p-4 text-gray-900">
                                                                        <input type="number" id="quantity"
                                                                            name="quantity"
                                                                            aria-describedby="helper-text-explanation"
                                                                            class="{{ $errors->has('quantity') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                                            placeholder="Jumlah kupon minimal 1"
                                                                            min="0"
                                                                            value="{{ old('quantity', $coupon->initial_quantity) }}">
                                                                    </td>
                                                                    <td class="p-4 text-gray-900">
                                                                        <div
                                                                            class="flex flex-row justify-center items-center gap-x-4">
                                                                            <button type="submit"
                                                                                onclick="return confirm('Apakah anda sudah yakin?')"
                                                                                class="cursor-pointer w-full text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center">
                                                                                Perbarui
                                                                            </button>
                                                            </form>
                                                            <form action="{{ route('owner.hapusKupon', $coupon->id) }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    onclick="return confirm('Apakah anda sudah yakin?')"
                                                                    class="cursor-pointer text-sm font-medium text-red-500 hover:underline">
                                                                    Hapus
                                                                </button>
                                                            </form>
                                            </div>
                                            </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($point)
                            <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                type="button" data-modal-target="point_modal" data-modal-toggle="point_modal"
                                class="flex flex-row items-center justify-center  w-full lg:w-36 cursor-pointer text-yellow-500 bg-gray-900 hover:bg-gray-950 font-medium rounded-lg text-xs md:text-sm px-3 py-2.5 text-center">
                                <svg class="w-4 h-4 mr-2 text-yellow-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Ubah Poin
                            </button>
                            <form action="{{ route('owner.ubahPoin') }}" method="POST" enctype="multipart/form-data"
                                id="point_modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                @csrf
                                @method('PUT')
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative rounded-lg shadow bg-white">
                                        <button type="button"
                                            class="cursor-pointer absolute top-3 end-2.5 text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                                            data-modal-hide="point_modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <span class="mb-4 block text-lg font-bold text-gray-900">Atur Poin</span>
                                            <div class="flex flex-col justify-center items-center w-full">
                                                <label for="percentage_from_totalprice"
                                                    class="mb-2 block text-sm font-semibold text-gray-900">Persentase
                                                    dari
                                                    Total
                                                    Harga</label>
                                                <input type="number" step="any" id="percentage_from_totalprice"
                                                    name="percentage_from_totalprice"
                                                    aria-describedby="helper-text-explanation"
                                                    class="{{ $errors->has('percentage_from_totalprice') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5 mb-4"
                                                    placeholder="Rentang persentase dari 1 - 100" min="0"
                                                    max="100"
                                                    value="{{ old('percentage_from_totalprice', $point->percentage_from_totalprice) }}">
                                                <label for="money_per_poin"
                                                    class="mb-2 block text-sm font-semibold text-gray-900">Jumlah
                                                    Uang/Poin</label>
                                                <input type="number" id="money_per_poin" name="money_per_poin"
                                                    aria-describedby="helper-text-explanation"
                                                    class="{{ $errors->has('money_per_poin') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                    placeholder="Jumlah uang minimal 1" min="0"
                                                    value="{{ old('money_per_poin', $point->money_per_poin) }}">
                                            </div>
                                            <button type="submit" onclick="return confirm('Apakah anda sudah yakin?')"
                                                class="cursor-pointer mt-6 w-full text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-2.5 text-center items-center">
                                                Terapkan Sistem Poin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                type="button" data-modal-target="point_modal" data-modal-toggle="point_modal"
                                class="flex flex-row items-center justify-center  w-full lg:w-36 cursor-pointer text-yellow-500 bg-gray-900 hover:bg-gray-950 font-medium rounded-lg text-xs md:text-sm px-3 py-2.5 text-center">
                                <svg class="w-4 h-4 mr-2 text-yellow-500" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                        clip-rule="evenodd" />
                                </svg>
                                Atur Poin
                            </button>
                            <form action="{{ route('owner.aturPoin') }}" method="POST" enctype="multipart/form-data"
                                id="point_modal" tabindex="-1"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                @csrf
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative rounded-lg shadow bg-white">
                                        <button type="button"
                                            class="cursor-pointer absolute top-3 end-2.5 text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                                            data-modal-hide="point_modal">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <span class="mb-4 block text-lg font-bold text-gray-900">Atur Poin</span>
                                            <div class="flex flex-col justify-center items-center w-full">
                                                <label for="percentage_from_totalprice"
                                                    class="mb-2 block text-sm font-semibold text-gray-900">Persentase
                                                    dari
                                                    Total
                                                    Harga</label>
                                                <input type="number" step="any" id="percentage_from_totalprice"
                                                    name="percentage_from_totalprice"
                                                    aria-describedby="helper-text-explanation"
                                                    class="{{ $errors->has('percentage_from_totalprice') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5 mb-4"
                                                    placeholder="Rentang persentase dari 1 - 100" min="0"
                                                    max="100" value="{{ old('percentage_from_totalprice') }}">
                                                <label for="money_per_poin"
                                                    class="mb-2 block text-sm font-semibold text-gray-900">Jumlah
                                                    Uang/Poin</label>
                                                <input type="number" id="money_per_poin" name="money_per_poin"
                                                    aria-describedby="helper-text-explanation"
                                                    class="{{ $errors->has('money_per_poin') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} text-center rounded-lg border-1 text-sm block w-full p-2.5"
                                                    placeholder="Jumlah uang minimal 1" min="0"
                                                    value="{{ old('money_per_poin') }}">
                                            </div>
                                            <button type="submit" onclick="return confirm('Apakah anda sudah yakin?')"
                                                class="cursor-pointer mt-6 w-full text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-2.5 text-center items-center">
                                                Terapkan Sistem Poin
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto overflow-y-hidden">
                <table class="w-full text-sm text-center text-gray-500">
                    <thead data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-xs text-center text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="p-4">No.</th>
                            <th scope="col" class="p-4">Nama</th>
                            <th scope="col" class="p-4">Role</th>
                            <th scope="col" class="p-4">Poin</th>
                            <th scope="col" class="p-4">Status</th>
                            <th scope="col" class="p-4">Email</th>
                            <th scope="col" class="p-4">No Telp/WA</th>
                            <th scope="col" class="p-4">Alamat</th>

                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->count() == 0)
                            <tr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">
                                <td colspan="6" class="p-4 text-center">
                                    <p class="text-gray-400">Belum ada user yang terdaftar</p>
                                </td>
                            </tr>
                        @else
                            @foreach ($users as $user)
                                <tr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    class="border-b hover:bg-gray-100">
                                    <td class="p-4 w-4">
                                        {{ $loop->index + ($users->currentPage() - 1) * $users->perPage() + 1 }}
                                    </td>
                                    <td scope="row" class="pe-8 font-medium text-gray-900">
                                        <div class="ml-4 flex items-center w-full">
                                            @if ($user->profile_picture == null)
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-8 h-8 mr-3 rounded-full text-gray-700">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                                </svg>
                                            @elseif (strlen($user->profile_picture) > 25)
                                                <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                    alt="profile picture"
                                                    class="w-8 h-8 mr-3 object-cover object-center rounded-full">
                                            @else
                                                <img src="/images/profile_picture/{{ $user->profile_picture }}"
                                                    alt="profile picture"
                                                    class="w-8 h-8 mr-3 object-cover object-center rounded-full">
                                            @endif
                                            <p
                                                class="truncate hover:w-full hover:overflow-visible hover:whitespace-normal hover:text-ellipsis text-left">
                                                {{ $user->name }}
                                            </p>
                                        </div>
                                    </td>

                                    @if ($user->role_id == 1)
                                        <td class="text-center font-medium text-gray-900 whitespace-nowrap p-4">
                                            Owner</td>
                                    @elseif ($user->role_id == 2)
                                        <td class="text-center font-medium text-gray-900 whitespace-nowrap p-4">
                                            Admin</td>
                                    @elseif ($user->role_id == 3)
                                        <td class="text-center font-medium text-gray-900 whitespace-nowrap p-4">
                                            Member</td>
                                    @endif

                                    <td class="text-center font-medium text-gray-900 whitespace-nowrap px-4">
                                        {{ $user->reward }}</td>

                                    @if ($user->is_active == 1)
                                        <td class=" px-4">
                                            <div class="flex items-center">
                                                <div class="h-3 w-3 rounded-full inline-block mr-2 bg-green-400"></div>
                                                Online
                                            </div>
                                        </td>
                                    @else
                                        <td class=" px-4">
                                            <div class="flex items-center">
                                                <div class="h-3 w-3 rounded-full inline-block mr-2 bg-red-700"></div>
                                                Offline
                                            </div>
                                        </td>
                                    @endif

                                    <td class="text-center font-medium text-gray-900 whitespace-nowrap px-4">
                                        {{ $user->email }}</td>
                                    <td class="text-center font-medium text-gray-900 whitespace-nowrap px-4">
                                        {{ substr($user->phone_number, 0, 4) . '-' . substr($user->phone_number, 4, 4) . '-' . substr($user->phone_number, 8) }}
                                    </td>

                                    @if ($user->address->isNotEmpty())
                                        <td class="text-center font-medium text-gray-900 whitespace-nowrap px-4">
                                            {{ $user->address->first()->address }},
                                            {{ $user->address->first()->city }},
                                            {{ $user->address->first()->province }},
                                            {{ $user->address->first()->postal_code }}
                                        </td>
                                    @else
                                        <td class="text-center font-medium text-red-700 whitespace-nowrap  px-4">
                                            Alamat belum diisi
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <nav data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="flex flex-col md:flex-row justify-end items-center space-y-3 md:space-y-0 p-4"
                aria-label="Table navigation">
                {{ $users->links('vendor.pagination.tailwind') }}
            </nav>
        </div>
        </div>
    </section>
    <!-- End block -->

@endsection
