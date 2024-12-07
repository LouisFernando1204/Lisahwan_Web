@extends('layouts.admin.frame_admin')

@section('content_page')

    <!-- Start block -->
    <section class="bg-neutral-200 p-2 sm:p-4 antialiased">
        <div class="bg-neutral-200 mx-auto max-w-screen-2xl pt-20 sm:pt-24 sm:ml-56">
            <div
                class="flex flex-col justify-center items-center w-full {{ session('addProduct_success') || session('updateProduct_success') || session('deleteProduct_success') || $errors->has('name') || $errors->has('price') || $errors->has('stock') || $errors->has('weight') || $errors->has('discount') || $errors->has('description') || $errors->has('special_status') || $errors->has('name_edit') || $errors->has('price_edit') || $errors->has('stock_edit') || $errors->has('weight_edit') || $errors->has('discount_edit') || $errors->has('description_edit') || $errors->has('special_status') || $errors->has('image') ? 'mb-6 mt-10 sm:mb-10 sm:mt-4' : '' }}">
                @error('name')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('name') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('price')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('price') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('weight')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('weight') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('special_status')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('special_status') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('description')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('description') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('name_edit')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('name_edit') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('price_edit')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('price_edit') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('stock_edit')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('stock_edit') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('weight_edit')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('weight_edit') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('discount_edit')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('discount_edit') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('special_status_edit')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('special_status_edit') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @error('description_edit')
                    <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('description_edit') ? 'mb-2' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
                @if (session('addProduct_success'))
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
                            <span class="font-medium">{{ session('addProduct_success') }}
                        </div>
                    </div>
                @endif
                @if (session('updateProduct_success'))
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
                            <span class="font-medium">{{ session('updateProduct_success') }}
                        </div>
                    </div>
                @endif
                @if (session('deleteProduct_success'))
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
                            <span class="font-medium">{{ session('deleteProduct_success') }}
                        </div>
                    </div>
                @endif
            </div>
            <div class="bg-white relative shadow-md rounded-md sm:rounded-lg overflow-hidden m-2 mt-8 sm:m-0">
                <div
                    class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="flex-1 flex items-center space-x-2">
                        <h5 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">
                            <span class="text-gray-500">Semua Produk:</span>
                            <span class="text-gray-500">{{ $products->count() }}</span>
                        </h5>
                    </div>
                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-lg font-bold text-gray-800">
                        Daftar Produk
                    </div>
                </div>
                <div
                    class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t">
                    <div class="w-full md:w-1/3">
                        <form data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="flex items-center" action="{{ route('owner.admin_products') }}" method="GET">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="currentColor"
                                        viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                                    </svg>
                                </div>
                                <input type="search" name="search" id="simple-search" placeholder="Cari produk"
                                    required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full pl-10 p-2">
                            </div>

                            <button type="submit" class="bg-yellow-500 ml-2 p-2 rounded-lg text-sm">
                                <p class="font-semibold text-white px-2">Search</p>
                            </button>
                        </form>
                    </div>
                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="flex flex-row justify-center mt-2 lg:mt-0">
                        <button type="button" data-modal-target="createProductModal"
                            data-modal-toggle="createProductModal"
                            class="flex flex-row items-center justify-center w-44 cursor-pointer text-yellow-500 bg-gray-900 hover:bg-gray-950 font-medium rounded-lg text-xs md:text-sm px-3 py-2.5 text-center">
                            <svg class="w-4 h-4 mr-2 text-yellow-500" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                    clip-rule="evenodd" />
                            </svg>
                            Tambah Produk
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto overflow-y-hidden">
                    <table class="w-full text-sm text-center text-gray-500">
                        <thead data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="text-xs text-center text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="p-4">No.</th>
                                <th scope="col" class="p-4">Nama</th>
                                <th scope="col" class="p-4">Harga</th>
                                <th scope="col" class="p-4">Stok</th>
                                <th scope="col" class="p-4">Berat</th>
                                <th scope="col" class="p-4">Rating</th>
                                <th scope="col" class="p-4">Diskon</th>
                                <th scope="col" class="p-4">Terjual</th>
                                <th scope="col" class="p-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->count() == 0)
                                <tr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800">
                                    <td colspan="20" class="p-4 text-center">
                                        <p class="text-gray-400">Belum ada product yang terdaftar</p>
                                    </td>
                                </tr>
                            @else
                                @foreach ($products as $product)
                                    <tr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                        class="border-b hover:bg-gray-100">
                                        <td class="p-4 w-4">
                                            {{ $loop->index + ($products->currentPage() - 1) * $products->perPage() + 1 }}
                                        </td>
                                        <td scope="row" class="font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex items-center mr-3">
                                                <div class="relative">
                                                    @if (strlen($product->image) > 25)
                                                        <img src="{{ asset('storage/' . $product->image) }}"
                                                            alt="product image"
                                                            class="w-10 h-10 mr-3 object-cover object-center rounded-full">
                                                    @else
                                                        <img src="/images/fotoproduk/{{ $product->image }}"
                                                            alt="product image"
                                                            class="w-10 h-10 mr-3 object-cover object-center rounded-full">
                                                    @endif
                                                    @if ($product->special_status == 'ya')
                                                        <span
                                                            class="top-0 left-7 absolute w-3 h-3 bg-green-500 rounded-full border border-1 border-yellow"></span>
                                                    @endif
                                                </div>
                                                <p
                                                    class="truncate hover:w-full hover:overflow-visible hover:whitespace-normal hover:text-ellipsis">
                                                    {{ $product->name }}</p>
                                            </div>
                                        </td>
                                        @if ($product->discount != 0)
                                            <td class="px-4 py-3 font-medium text-red-600 whitespace-nowrap">Rp.
                                                {{ number_format($product->countDiscount(), 0, ',', '.') }}</td>
                                        @else
                                            <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">Rp.
                                                {{ number_format($product->price, 0, ',', '.') }}</td>
                                        @endif
                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $product->stock }}</td>
                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $product->weight }}g</td>

                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $product->testimony->pluck('rating')->average())
                                                        <svg class="w-5 h-5 text-yellow-500" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 22 20">
                                                            <path
                                                                d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                                        </svg>
                                                    @else
                                                        <svg class="w-5 h-5 text-yellow-500" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 21 20">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m11.479 1.712 2.367 4.8a.532.532 0 0 0 .4.292l5.294.769a.534.534 0 0 1 .3.91l-3.83 3.735a.534.534 0 0 0-.154.473l.9 5.272a.535.535 0 0 1-.775.563l-4.734-2.49a.536.536 0 0 0-.5 0l-4.73 2.487a.534.534 0 0 1-.775-.563l.9-5.272a.534.534 0 0 0-.154-.473L2.158 8.48a.534.534 0 0 1 .3-.911l5.294-.77a.532.532 0 0 0 .4-.292l2.367-4.8a.534.534 0 0 1 .96.004Z" />
                                                        </svg>
                                                    @endif
                                                    </svg>
                                                @endfor

                                                @if ($product->testimony->isNotEmpty())
                                                    <span
                                                        class="text-gray-500 ml-2">{{ number_format($product->testimony->pluck('rating')->average(), 2) }}</span>
                                                @else
                                                    <span class="text-gray-500 ml-2">Belum ada.</span>
                                                @endif
                                            </div>
                                        </td>

                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $product->discount }}%</td>

                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                    fill="currentColor" class="w-5 h-5 text-gray-400 mr-2"
                                                    aria-hidden="true">
                                                    <path
                                                        d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
                                                </svg>
                                                {{ $product->order_detail->sum('quantity') }}
                                            </div>
                                        </td>

                                        <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex items-center space-x-4">

                                                <a href="{{ route('owner.admin_products.detail', $product->id) }}">
                                                    <button type="button"
                                                        class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-600 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                            fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                        </svg>
                                                        Detail
                                                    </button>
                                                </a>

                                                <button type="button"
                                                    data-modal-target="update-modal{{ $product->id }}"
                                                    data-modal-toggle="update-modal{{ $product->id }}"
                                                    class="py-2 px-3 flex items-center text-sm font-medium text-center text-gray-600 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                                    {{-- {{ $product_to_update = Product::where('id', $product->id)->first() }} --}}
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Edit
                                                </button>

                                                <button type="button"
                                                    data-modal-target="delete-modal{{ $product->id }}"
                                                    data-modal-toggle="delete-modal{{ $product->id }}"
                                                    class="flex items-center text-red-500 hover:text-white border border-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center"
                                                    onclick="changeDeleteModal('{{ route('owner.admin_products.destroy', $product->id) }}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5"
                                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <form id="update-form"
                                        action="{{ route('owner.admin_products.update', $product->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div id="update-modal{{ $product->id }}" tabindex="-1" aria-hidden="true"
                                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                            <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                                                <!-- Modal content -->
                                                <div id="update-modal-content"
                                                    class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                                                        <h3 class="text-lg font-semibold text-gray-900">Edit Produk</h3>
                                                        <button type="button"
                                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                            data-modal-toggle="update-modal{{ $product->id }}">
                                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                        <div>
                                                            <label for="name_edit"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Nama
                                                                Produk</label>
                                                            <input type="text" name="name_edit" id="name_edit"
                                                                class="{{ $errors->has('name_edit') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"
                                                                value="{{ old('name_edit', $product->name) }}" required>
                                                        </div>
                                                        <div>
                                                            <label for="price_edit"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Harga
                                                                (Rp)
                                                            </label>
                                                            <input type="number" name="price_edit" id="price_edit"
                                                                class="{{ $errors->has('price_edit') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"
                                                                value="{{ old('price_edit', $product->price) }}"
                                                                min="0" required>
                                                        </div>
                                                        <div>
                                                            <label for="weight_edit"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Berat
                                                                (gram)
                                                            </label>
                                                            <input type="number" name="weight_edit" id="weight_edit"
                                                                class="{{ $errors->has('weight_edit') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"
                                                                value="{{ old('weight_edit', $product->weight) }}"
                                                                min="0" required>
                                                        </div>
                                                        <div>
                                                            <label for="discount_edit"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Diskon
                                                                (%)</label>
                                                            <input type="number" name="discount_edit" id="discount_edit"
                                                                class="{{ $errors->has('discount_edit') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"
                                                                value="{{ old('discount_edit', $product->discount) }}"
                                                                min="0" required>
                                                        </div>
                                                        <div class="sm:col-span-2">
                                                            <label for="special_status"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Atur
                                                                Spesial</label>
                                                            <select data-aos="fade-up"
                                                                data-aos-anchor-placement="top-bottom"
                                                                data-aos-duration="800" id="special_status"
                                                                name="special_status"
                                                                class="{{ $errors->has('special_status') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm block w-full p-2.5 mt-3">
                                                                <option value="tidak"
                                                                    {{ old('special_status', $product->special_status) == 'tidak' ? 'selected' : '' }}>
                                                                    Tidak</option>
                                                                <option value="ya"
                                                                    {{ old('special_status', $product->special_status) == 'ya' ? 'selected' : '' }}>
                                                                    Ya</option>
                                                            </select>
                                                        </div>
                                                        <div class="sm:col-span-2">
                                                            <label for="description_edit"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                                                            <textarea name="description_edit" id="description_edit" rows="4"
                                                                class="{{ $errors->has('description_edit') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"required>{{ old('description_edit', $product->description) }}</textarea>
                                                        </div>
                                                        <p
                                                            class="mb-4 text-red-700 text-xs text-center md:text-start sm:col-span-2">
                                                            *Untuk edit foto dan stok produk, mohon ke halaman 'Detail'!</p>
                                                    </div>
                                                    <div class="items-center space-y-2 sm:flex sm:space-y-0 sm:space-x-2">
                                                        <button type="submit"
                                                            class="w-full sm:w-auto justify-center text-white inline-flex bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Perbarui
                                                            Produk</button>
                                                        <button data-modal-toggle="update-modal{{ $product->id }}"
                                                            type="button"
                                                            class="w-full sm:w-auto justify-center text-white inline-flex bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor"
                                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
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

                                    <div id="createProductModal" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                        <div class="relative p-4 w-full max-w-3xl h-full md:h-auto">
                                            <!-- Modal content -->
                                            <div class="relative p-4 bg-white rounded-lg shadow sm:p-5">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                                                    <h3 class="text-lg font-semibold text-gray-900">Tambah Produk</h3>
                                                    <button type="button"
                                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                        data-modal-toggle="createProductModal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form action="{{ route('owner.admin_products.store') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                                        <div>
                                                            <label for="name"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Nama
                                                                Produk</label>
                                                            <input type="text" name="name" id="name"
                                                                class="{{ $errors->has('name') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"
                                                                placeholder="(Contoh: Teri Oven)"
                                                                value="{{ old('name') }}" required>
                                                        </div>

                                                        <div>
                                                            <label for="price"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Harga
                                                                (Rp)</label>
                                                            <input type="number" name="price" id="price"
                                                                class="{{ $errors->has('price') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"
                                                                placeholder="(Contoh: 42000)" value="{{ old('price') }}"
                                                                min="0" required>
                                                        </div>

                                                        <div class="grid gap-4 sm:col-span-2 md:gap-4 sm:grid-cols-4">
                                                            <div>
                                                                <label for="weight"
                                                                    class="block mb-2 text-sm font-medium text-gray-900">Berat
                                                                    (gram)</label>
                                                                <input type="number" name="weight" id="weight"
                                                                    class="{{ $errors->has('weight') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"
                                                                    placeholder="(Contoh: 150)"
                                                                    value="{{ old('weight') }}" min="0" required>
                                                            </div>
                                                            <div>
                                                                <label for="stock"
                                                                    class="block mb-2 text-sm font-medium text-gray-900">Stok</label>
                                                                <input type="number" name="stock" id="stock"
                                                                    class="{{ $errors->has('stock') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"
                                                                    placeholder="(Contoh: 100)"
                                                                    value="{{ old('stock') }}" min="0" required>
                                                            </div>
                                                            <div>
                                                                <label for="discount"
                                                                    class="block mb-2 text-sm font-medium text-gray-900">Diskon
                                                                    (%)</label>
                                                                <input type="number" name="discount" id="discount"
                                                                    class="{{ $errors->has('discount') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"
                                                                    placeholder="(Contoh: 10)"
                                                                    value="{{ old('discount') }}" min="0"
                                                                    required>
                                                            </div>
                                                            <div>
                                                                <label for="special_status"
                                                                    class="block mb-2 text-sm font-medium text-gray-900">Atur
                                                                    Spesial</label>
                                                                <select data-aos="fade-up"
                                                                    data-aos-anchor-placement="top-bottom"
                                                                    data-aos-duration="800" id="special_status"
                                                                    name="special_status"
                                                                    class="{{ $errors->has('special_status') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm block w-full p-2.5 mt-3">
                                                                    <option value="tidak"
                                                                        {{ old('special_status') == 'tidak' ? 'selected' : '' }}>
                                                                        Tidak</option>
                                                                    <option value="ya"
                                                                        {{ old('special_status') == 'ya' ? 'selected' : '' }}>
                                                                        Ya</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="sm:col-span-2">
                                                            <label for="description"
                                                                class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                                                            <textarea name="description" id="description" rows="4"
                                                                class="{{ $errors->has('description') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm mt-3 block w-full p-2.5"
                                                                placeholder="Tuliskan deskripsi produk" required>{{ old('description') }}</textarea>
                                                        </div>
                                                    </div>

                                                    <div class="mb-8">
                                                        <span class="block mb-2 text-sm font-medium text-gray-900">Gambar
                                                            Produk</span>
                                                        <div id="existingImagePreviewId" class="mb-3"></div>
                                                        <label for="image"
                                                            class="flex flex-col justify-center items-center w-full h-44 bg-gray-50 rounded-lg border-1 border-gray-300 border-dashed cursor-pointer hover:bg-gray-100">
                                                            <input type="file" name="image" id="image"
                                                                class="hidden" onchange="displayImagePreview_Add(this)">
                                                            <div
                                                                class="flex flex-col justify-center items-center w-full pt-5 pb-6">
                                                                <svg aria-hidden="true"
                                                                    class="mb-3 w-10 h-10 text-gray-400" fill="none"
                                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                                                </svg>
                                                                <p class="mb-2 text-sm text-gray-500">
                                                                    <span class="font-semibold">Klik untuk upload</span>
                                                                </p>
                                                                <p class="text-xs text-gray-500">PNG, JPG atau JPEG (Ukuran
                                                                    File MAX.
                                                                    5MB)
                                                                </p>
                                                            </div>
                                                        </label>
                                                    </div>

                                                    <div class="items-center space-y-2 sm:flex sm:space-y-0 sm:space-x-2">
                                                        <button type="submit"
                                                            class="w-full sm:w-auto justify-center text-white inline-flex bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                                                            Produk</button>
                                                        <button data-modal-toggle="createProductModal" type="button"
                                                            class="w-full sm:w-auto justify-center text-white inline-flex bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor"
                                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                    clip-rule="evenodd" />
                                                            </svg>
                                                            Batal
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="delete-modal{{ $product->id }}" tabindex="-1"
                                        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full h-auto max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow">
                                                <form id="delete-form"
                                                    action="{{ route('owner.admin_products.destroy', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button"
                                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                                        data-modal-toggle="delete-modal{{ $product->id }}">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd"
                                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                    <div class="p-6 text-center">
                                                        <svg aria-hidden="true"
                                                            class="mx-auto mb-4 text-gray-400 w-14 h-14" fill="none"
                                                            stroke="currentColor" viewbox="0 0 24 24"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="1"
                                                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                        </svg>
                                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah anda
                                                            yakin ingin menghapus produk ini?
                                                        </h3>
                                                        <div
                                                            class="w-full justify-center items-center flex flex-col sm:flex-row space-y-2 sm:space-x-2 sm:space-y-0">
                                                            <button type="submit" id="delete" name="delete"
                                                                class="w-full justify-center text-white inline-flex bg-red-500 hover:bg-red-600 focus:ring-2 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">Ya,
                                                                yakin</button>
                                                            <button data-modal-toggle="delete-modal{{ $product->id }}"
                                                                type="button"
                                                                class="w-full text-gray-500 bg-white hover:bg-gray-100 focus:ring-2 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                                                batal</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <nav data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="flex flex-col md:flex-row justify-end items-center space-y-3 md:space-y-0 p-4"
                    aria-label="Table navigation">
                    {{ $products->links('vendor.pagination.tailwind') }}
                </nav>
            </div>
        </div>
    </section>
    <!-- End block -->

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

        function changeDeleteModal(url) {
            var deleteForm = $('#delete-form');
            deleteForm.action = url;
        }
    </script>
@endsection
