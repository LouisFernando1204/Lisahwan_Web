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
        @if (session('correctCoupon_success'))
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
                    <span class="font-medium">{{ session('correctCoupon_success') }}
                </div>
            </div>
        @endif
        @if (session('useCoupon_success'))
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
                    <span class="font-medium">{{ session('useCoupon_success') }}
                </div>
            </div>
        @endif
        @if (session('activatePoint_success'))
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
                    <span class="font-medium">{{ session('activatePoint_success') }}
                </div>
            </div>
        @endif
        @if (session('chooseShipmentPrice_success'))
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
                    <span class="font-medium">{{ session('chooseShipmentPrice_success') }}
                </div>
            </div>
        @endif
        @error('incorrectCoupon_error')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('incorrectCoupon_error') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('alreadyAddCoupon_error')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('alreadyAddCoupon_error') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('couponExpired_error')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('couponExpired_error') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('districtForgotten_error')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('districtForgotten_error') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('courier')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('courier') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('service')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('service') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('courierForgotten_error')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('courierForgotten_error') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('courierDistrictForgotten_error')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('courierDistrictForgotten_error') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('paymentUrl_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('paymentUrl_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('pendingPayment_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('pendingPayment_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('denyPayment_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('denyPayment_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('expirePayment_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('expirePayment_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('unverifiedSignatureKey_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('unverifiedSignatureKey_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('anotherPayment_ERROR')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('anotherPayment_ERROR') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        @error('service_NOTAVAILABLE')
            <div data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                class="w-10/12 md:w-9/12 lg:w-6/12 flex justify-center items-center p-4 {{ $errors->has('service_NOTAVAILABLE') ? 'mt-8' : '' }} text-sm rounded-lg bg-gray-900 text-red-400"
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
        <div class="flex flex-col gap-y-8 lg:gap-y-8 p-8 sm:p-12 mx-auto w-full">
            <div class="flex flex-col lg:flex-row w-full col-span-2 lg:gap-x-6">
                <div class="flex flex-col mx-auto w-full mb-8 lg:mb-0">
                    @error('payment_upload')
                        <p data-aos="zoom-in-down" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mb-2 w-full text-center text-base text-red-500"><span
                                class="font-medium">{{ $message }}
                        </p>
                    @enderror
                    <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="mb-5 text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900">Detail Pengiriman</h1>
                    <form action="{{ route('member.checkout.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $total_poin }}" name="total_poin">
                        <input type="hidden" value="{{ $reward_now }}" name="reward_now">
                        <input type="hidden" id="courier_hidden" value="{{ session('checkout.courier', '') }}" name="courier">
                        <input type="hidden" id="service_hidden" value="{{ session('checkout.service', '') }}" name="service">
                        <input type="hidden" id="final_province_id" name="province_id"
                            value="{{ old('province_id', session('checkout.province_id')) }}">
                        <input type="hidden" id="final_city_id" name="city_id"
                            value="{{ old('city_id', session('checkout.city_id')) }}">
                        <input type="hidden" id="final_district_id" name="district_id"
                            value="{{ old('district_id', session('checkout.district_id')) }}">
                        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    for="address" class="block mb-2 text-sm font-semibold text-gray-900">Alamat</label>
                                <select data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    id="address_id" name="address_id"
                                    class="{{ $errors->has('address_id') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm block w-full p-2.5 mt-3">
                                    <option value="0" data-city="" data-province="" data-postal_code="">Tambah
                                        alamat</option>
                                    @foreach ($addresses as $address)
                                        <option value="{{ $address->id }}" data-city="{{ $address->city_id }}"
                                            data-province="{{ $address->province }}"
                                            data-postal_code="{{ $address->postal_code }}"
                                            {{ old('address_id', session('checkout.address_id')) == $address->id ? 'selected' : '' }}>
                                            {{ $address->address }}
                                        </option>
                                    @endforeach
                                </select>
                                <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    id="new_address_container" style="display: none;">
                                    <input data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                        data-aos-duration="800" type="text" name="address" id="address"
                                        value="{{ old('address', session('checkout.address')) }}"
                                        class="{{ $errors->has('address') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm block w-full p-2.5 mt-3"
                                        placeholder="(Contoh: Jln. Indonesia Raya No. 17, RT. 08 RW. 08)">
                                    @error('address')
                                        <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                            class="mt-2 text-sm text-red-500"><span class="font-medium">{{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full">
                                <label data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    for="province_id"
                                    class="block mb-2 text-sm font-semibold text-gray-900">Provinsi</label>
                                <select data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    id="province_id" name="province_id"
                                    class="{{ $errors->has('province_id') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400 focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm block w-full p-2.5 mt-3">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province['id'] }}"
                                            {{ old('province_id', session('checkout.province_id')) == $province['id'] ? 'selected' : '' }}>
                                            {{ $province['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('province_id')
                                    <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                        class="mt-2 text-sm text-red-500"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    for="city_id"
                                    class="block mb-2 text-sm font-semibold text-gray-900">Kota/Kabupaten</label>
                                <select data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    id="city_id" name="city_id" disabled
                                    class="{{ $errors->has('city_id') ? 'bg-red-100 border-red-400 text-red-500' : 'bg-white border-yellow-500 text-gray-900 focus:ring-yellow-500 focus:border-yellow-500 disabled:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed' }} rounded-lg border-1 text-sm block w-full p-2.5 mt-3">
                                    <option value="">Pilih Provinsi Terlebih Dahulu</option>
                                </select>
                                @error('city_id')
                                    <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                        class="mt-2 text-sm text-red-500"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>

                            <div class="w-full">
                                <label data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    for="district_id"
                                    class="block mb-2 text-sm font-semibold text-gray-900">Kecamatan</label>
                                <select data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    id="district_id" name="district_id" disabled
                                    class="{{ $errors->has('district_id') ? 'bg-red-100 border-red-400 text-red-500' : 'bg-white border-yellow-500 text-gray-900 focus:ring-yellow-500 focus:border-yellow-500 disabled:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed' }} rounded-lg border-1 text-sm block w-full p-2.5 mt-3">
                                    <option value="">Pilih Kota Terlebih Dahulu</option>
                                </select>
                                @error('district_id')
                                    <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                        class="mt-2 text-sm text-red-500"><span
                                            class="font-medium">{{ $message }}</span></p>
                                @enderror
                            </div>
                            <div>
                                <label data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    for="note" class="block mb-2 text-sm font-semibold text-gray-900">Catatan</label>
                                <textarea data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800" id="note"
                                    name="note" rows="4"
                                    class="{{ $errors->has('note') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} rounded-lg border-1 text-sm block w-full p-2.5 mt-3"
                                    placeholder="Tambahkan catatan jika perlu...">{{ old('note', session('checkout.note')) }}</textarea>
                                @error('note')
                                    <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                        class="mt-2 text-sm text-red-500"><span class="font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div id="payment-modal" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-lg max-h-full">
                                <div class="relative rounded-lg shadow bg-white">
                                    <button type="button"
                                        class="cursor-pointer absolute top-3 end-2.5 text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white"
                                        data-modal-hide="payment-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-gray-400 w-14 h-14" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah anda sudah yakin dengan
                                            detail pesanan anda?
                                        </h3>
                                        <div
                                            class="w-full justify-center items-center flex flex-col sm:flex-row space-y-2 sm:space-x-2 sm:space-y-0">
                                            <button type="submit"
                                                class="w-full justify-center text-white inline-flex bg-yellow-500 hover:bg-yellow-600 focus:ring-2 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Ya,
                                                yakin</button>
                                            <button data-modal-toggle="payment-modal" type="button"
                                                class="w-full text-gray-500 bg-white hover:bg-gray-100 focus:ring-2 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Tidak,
                                                batal</button>
                                        </div>
                                        {{-- <button type="submit"
                                            onclick="return confirm('Apakah anda sudah yakin dengan detail pemesanan anda?')"
                                            class="cursor-pointer mt-3 w-full text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-2.5 text-center items-center">
                                            Selesaikan Pembayaran
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="free-payment-modal" tabindex="-1"
                            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-lg max-h-full">
                                <div class="relative rounded-lg shadow bg-gray-900">
                                    <button type="button"
                                        class="cursor-pointer absolute top-3 end-2.5 text-green-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-green-600 hover:text-white"
                                        data-modal-hide="free-payment-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                    <div class="p-4 md:p-5 text-center">
                                        <svg class="mx-auto mb-4 text-green-400 w-14 h-14" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z" />
                                        </svg>
                                        <h3 class="mb-5 text-lg font-normal text-green-400">Selamat!!! <br>
                                            Anda tidak perlu membayar sepeser pun.</h3>
                                        <div
                                            class="w-full justify-center items-center flex flex-col sm:flex-row space-y-2 sm:space-x-2 sm:space-y-0">
                                            <button type="submit"
                                                class="w-full justify-center text-white inline-flex bg-yellow-500 hover:bg-yellow-600 focus:ring-2 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Selesai</button>
                                            <button data-modal-toggle="free-payment-modal" type="button"
                                                class="w-full text-gray-500 bg-white hover:bg-gray-100 focus:ring-2 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                                        </div>
                                        {{-- <button type="submit"
                                        onclick="return confirm('Apakah anda sudah yakin dengan detail pemesanan anda?')"
                                        class="cursor-pointer mt-3 w-full text-white bg-yellow-500 hover:bg-yellow-600 font-medium rounded-lg text-base px-5 py-2.5 text-center items-center">
                                        Selesaikan Pembayaran
                                    </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('member.cekOngkir') }}" method="POST" enctype="multipart/form-data"
                        class="flex flex-row mt-6">
                        @csrf
                        @php
                            $courierStatus_lion = Session::get('courierStatus_lion');
                            $courierStatus_anteraja = Session::get('courierStatus_anteraja');
                            // Session::forget('costs');
                            // Session::forget([
                            //     'checkout.address',
                            //     'checkout.city',
                            //     'checkout.province',
                            //     'checkout.postal_code',
                            //     'checkout.note',
                            // ]);
                        @endphp
                        <input type="hidden" id="destination_address_id" name="address_id"
                            value="{{ old('address_id', session('checkout.address_id')) }}">
                        <input type="hidden" id="destination_address" name="address"
                            value="{{ old('address', session('checkout.address')) }}">
                        <input type="hidden" id="destination_province" name="province_id"
                            value="{{ old('province_id', session('checkout.province_id')) }}">
                        <input type="hidden" id="destination_city" name="city_id"
                            value="{{ old('city_id', session('checkout.city_id')) }}">
                        <input type="hidden" id="destination_district" name="district_id"
                            value="{{ old('district_id', session('checkout.district_id')) }}">
                        <input type="hidden" id="destination_note" name="note"
                            value="{{ old('note', session('checkout.note')) }}">
                        <div class="w-full">
                            <label data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                for="ongkir" class="block mb-3 text-sm font-semibold text-gray-900">Cek
                                Ongkir</label>
                            <div class="flex flex-col lg:flex-row lg:space-x-2 space-y-2 lg:space-y-0 w-full">
                                <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    type="submit"
                                    class="w-full flex flex-row  text-sm font-medium text-yellow-500 bg-gray-900 rounded-lg justify-center items-center">
                                    <div
                                        class="px-4 flex justify-center items-center w-full border-gray-600 sm:border-b-0 border-r">
                                        <div class="w-full flex items-center justify-center">
                                            <input id="lion-checkbox-list" type="checkbox" name="courier" value="lion"
                                                {{ isset($courierStatus_lion) ? 'checked' : '' }}
                                                class="courier-checkbox w-4 h-4 text-yellow-500 bg-gray-600 rounded focus:ring-yellow-500 focus:ring-1">
                                            <label for="lion-checkbox-list"
                                                class="py-3 ms-2 text-sm font-medium text-yellow-500">LION</label>
                                        </div>
                                    </div>
                                    <div class="px-4 w-full border-gray-600">
                                        <div class="w-full flex items-center justify-center">
                                            <input id="anteraja-checkbox-list" type="checkbox" name="courier"
                                                value="anteraja" {{ isset($courierStatus_anteraja) ? 'checked' : '' }}
                                                class="courier-checkbox w-4 h-4 text-yellow-500 bg-gray-600 rounded focus:ring-yellow-500 focus:ring-1">
                                            <label for="anteraja-checkbox-list"
                                                class="py-3 ms-2 text-sm font-medium text-yellow-500">ANTERAJA</label>
                                        </div>
                                    </div>
                                </div>
                                <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    type="submit"
                                    class="flex flex-row items-center justify-center w-full cursor-pointer text-yellow-500 bg-gray-900 hover:bg-gray-950 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                    <svg class="w-4 h-4 mr-2 text-yellow-500" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd"
                                            d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Cek Ongkir
                                </button>
                            </div>
                        </div>
                    </form>
                    @if (session('costs') && (Session::has('courierStatus_lion') || Session::has('courierStatus_anteraja')))
                        {{-- @dd(session('costs')) --}}
                        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mt-3 w-full bg-gray-900 divide-y divide-gray-100 rounded-lg shadow">
                            <ul class="p-2 space-y-1 text-sm text-yellow-500">
                                @foreach (session('costs') as $index => $cost)
                                    @php
                                        $destinationId = session('checkout.district_id');
                                        $courierCode = $cost['code'];
                                        $sessionKey =
                                            'costStatus_' . $index . '_' . $destinationId . '_' . $courierCode;
                                        $isChecked = Session::has($sessionKey);
                                    @endphp

                                    <form id="checkboxCostForm_{{ $index }}"
                                        action="{{ route('member.pilihOngkir', $index) }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="destination_address_id_{{ $index }}"
                                            name="address_id" value="{{ session('checkout.address_id') }}">
                                        <input type="hidden" id="destination_address_{{ $index }}"
                                            name="address" value="{{ session('checkout.address') }}">
                                        <input type="hidden" id="destination_province_{{ $index }}"
                                            name="province_id" value="{{ session('checkout.province_id') }}">
                                        <input type="hidden" id="destination_city_{{ $index }}" name="city_id"
                                            value="{{ session('checkout.city_id') }}">
                                        <input type="hidden" id="destination_district_{{ $index }}"
                                            name="district_id" value="{{ session('checkout.district_id') }}">
                                        <input type="hidden" name="courier" value="{{ $courierCode }}">
                                        <input type="hidden" id="destination_note_{{ $index }}" name="note"
                                            value="{{ session('checkout.note') }}">
                                        <li>
                                            <div
                                                class="flex flex-col md:flex-row justify-between items-center p-2 rounded hover:bg-gray-800 w-full md:space-x-4">
                                                <label class="inline-flex items-center cursor-pointer w-full md:w-auto">
                                                    <input type="checkbox"
                                                        id="autoSubmitCheckboxCost_{{ $index }}"
                                                        value="{{ $cost['service'] }}" {{ $isChecked ? 'checked' : '' }}
                                                        class="cost-checkbox sr-only peer">
                                                    <div
                                                        class="relative w-9 h-5 bg-gray-600 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-yellow-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:bg-yellow-500 after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all shrink-0">
                                                    </div>
                                                    <span class="ms-3 text-xs sm:text-sm font-medium text-yellow-500">
                                                        {{ $cost['name'] }} - {{ $cost['service'] }}
                                                        <span
                                                            class="text-xs text-gray-400 hidden sm:inline">({{ $cost['description'] }})</span>
                                                    </span>
                                                </label>
                                                <div
                                                    class="flex flex-row items-center justify-between md:justify-end w-full md:w-auto mt-2 md:mt-0 space-x-2 pl-12 md:pl-0">
                                                    <span
                                                        class="text-yellow-500 text-xs sm:text-sm font-bold whitespace-nowrap">
                                                        Rp. {{ number_format($cost['cost'], 0, ',', '.') }}
                                                    </span>
                                                    <span class="w-1.5 h-1.5 bg-gray-600 rounded-full shrink-0"></span>
                                                    <span
                                                        class="text-yellow-500 text-xs sm:text-sm font-medium whitespace-nowrap">
                                                        (Estimasi {{ $cost['etd'] }}
                                                        {{ stripos($cost['etd'], 'hari') === false ? 'hari' : '' }})
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </form>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (count($coupons) > 0)
                        <form action="{{ route('member.cekKupon') }}" method="POST" enctype="multipart/form-data"
                            class="flex flex-row mb-4 mt-6">
                            @csrf
                            <input type="hidden" id="addressHidden_id" name="address_id"
                                value="{{ old('address_id', session('checkout.address_id')) }}">
                            <input type="hidden" id="addressHidden" name="address"
                                value="{{ old('address', session('checkout.address')) }}">
                            <input type="hidden" id="provinceHidden" name="province_id"
                                value="{{ old('province_id', session('checkout.province_id')) }}">
                            <input type="hidden" id="cityHidden" name="city_id"
                                value="{{ old('city_id', session('checkout.city_id')) }}">
                            <input type="hidden" id="districtHidden" name="district_id"
                                value="{{ old('district_id', session('checkout.district_id')) }}">
                            <input type="hidden" id="noteHidden" name="note"
                                value="{{ old('note', session('checkout.note')) }}">
                            <div class="w-full">
                                <label data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                    for="coupon" class="block mb-3 text-sm font-semibold text-gray-900">Cek
                                    Kupon</label>
                                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 w-full">
                                    <input data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                        data-aos-duration="800" type="text" name="coupon" id="coupon"
                                        value="{{ old('coupon') }}"
                                        class="{{ $errors->has('coupon') || $errors->has('alreadyAddCoupon_error') || $errors->has('incorrectCoupon_error') ? 'bg-red-100 border-red-400 text-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500' : 'bg-white border-yellow-500 text-gray-900 placeholder-gray-400  focus:ring-yellow-500 focus:border-yellow-500' }} w-full rounded-lg border-1 text-sm block p-2.5"
                                        placeholder="(Contoh: JULYCERIA)">
                                    <button data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                        data-aos-duration="800" type="submit"
                                        class="flex flex-row items-center justify-center w-full cursor-pointer text-yellow-500 bg-gray-900 hover:bg-gray-950 font-medium rounded-lg text-sm px-3 py-2.5 text-center">
                                        <svg class="w-4 h-4 mr-2 text-yellow-500" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M12 2c-.791 0-1.55.314-2.11.874l-.893.893a.985.985 0 0 1-.696.288H7.04A2.984 2.984 0 0 0 4.055 7.04v1.262a.986.986 0 0 1-.288.696l-.893.893a2.984 2.984 0 0 0 0 4.22l.893.893a.985.985 0 0 1 .288.696v1.262a2.984 2.984 0 0 0 2.984 2.984h1.262c.261 0 .512.104.696.288l.893.893a2.984 2.984 0 0 0 4.22 0l.893-.893a.985.985 0 0 1 .696-.288h1.262a2.984 2.984 0 0 0 2.984-2.984V15.7c0-.261.104-.512.288-.696l.893-.893a2.984 2.984 0 0 0 0-4.22l-.893-.893a.985.985 0 0 1-.288-.696V7.04a2.984 2.984 0 0 0-2.984-2.984h-1.262a.985.985 0 0 1-.696-.288l-.893-.893A2.984 2.984 0 0 0 12 2Zm3.683 7.73a1 1 0 1 0-1.414-1.413l-4.253 4.253-1.277-1.277a1 1 0 0 0-1.415 1.414l1.985 1.984a1 1 0 0 0 1.414 0l4.96-4.96Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Cek kupon
                                    </button>
                                </div>
                                @error('coupon')
                                    <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                        class="mt-2 text-sm text-red-500"><span class="font-medium">{{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </form>
                        <div class="relative inline-block w-full z-10">
                            <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                id="dropdownToggleButton" data-dropdown-toggle="dropdownToggle"
                                data-dropdown-placement="bottom"
                                class="flex flex-row justify-center w-full text-yellow-500 bg-gray-900 hover:bg-gray-950 focus:ring-2 focus:outline-none focus:ring-yellow-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center items-center"
                                type="button">
                                Lihat kupon anda
                                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownToggle"
                                class="hidden absolute left-0 top-0 bottom-0 right-0 mt-3 w-full bg-gray-900 divide-y divide-gray-100 rounded-lg shadow">
                                @if (count($user_coupons) > 0)
                                    <ul class="p-2 space-y-1 text-sm text-yellow-500"
                                        aria-labelledby="dropdownToggleButton">
                                        @foreach ($user_coupons as $coupon)
                                            @php
                                                $couponStatus = Session::get('couponStatus_' . $coupon->coupon->id);
                                                // ini untuk hgapus session nya kalau kelupaan hapus pas migrate ulang buat debugging
                                                // Session::forget('couponStatus_' .  $coupon->coupon->id);

                                                // Session::forget([
                                                //     'checkout.address',
                                                //     'checkout.city',
                                                //     'checkout.province',
                                                //     'checkout.postal_code',
                                                //     'checkout.note',
                                                // ]);
                                            @endphp

                                            <form id="checkboxForm_{{ $coupon->coupon->id }}"
                                                action="{{ route('member.pilihKupon', $coupon->coupon->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" id="addressHidden_id_{{ $coupon->coupon->id }}"
                                                    name="address_id"
                                                    value="{{ old('address_id', session('checkout.address_id')) }}">
                                                <input type="hidden" id="addressHidden_{{ $coupon->coupon->id }}"
                                                    name="address"
                                                    value="{{ old('address', session('checkout.address')) }}">
                                                <input type="hidden" id="provinceHidden_{{ $coupon->coupon->id }}"
                                                    name="province_id"
                                                    value="{{ old('province_id', session('checkout.province_id')) }}">
                                                <input type="hidden" id="cityHidden_{{ $coupon->coupon->id }}"
                                                    name="city_id"
                                                    value="{{ old('city_id', session('checkout.city_id')) }}">
                                                <input type="hidden" id="districtHidden_{{ $coupon->coupon->id }}"
                                                    name="district_id"
                                                    value="{{ old('district_id', session('checkout.district_id')) }}">
                                                <input type="hidden" id="noteHidden_{{ $coupon->coupon->id }}"
                                                    name="note" value="{{ old('note', session('checkout.note')) }}">
                                                <li>
                                                    <div
                                                        class="flex flex-col md:flex-row justify-between items-center p-2 rounded hover:bg-gray-800 w-full md:space-x-4">
                                                        <label
                                                            class="inline-flex items-center cursor-pointer w-full md:w-auto">
                                                            <input type="checkbox"
                                                                id="autoSubmitCheckbox_{{ $coupon->coupon->id }}"
                                                                value=""
                                                                {{ isset($couponStatus) ? 'checked' : '' }}
                                                                class="coupon-checkbox sr-only peer">
                                                            <div
                                                                class="relative w-9 h-5 bg-gray-600 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-yellow-500 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:translate-x-[-100%] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-yellow-500 shrink-0">
                                                            </div>
                                                            <span
                                                                class="ms-3 text-xs sm:text-sm font-medium text-yellow-500 truncate">
                                                                {{ $coupon->coupon->title }}
                                                            </span>
                                                        </label>
                                                        <div
                                                            class="flex flex-row items-center justify-between md:justify-end w-full md:w-auto mt-2 md:mt-0 space-x-2 pl-12 md:pl-0">
                                                            <span
                                                                class="text-yellow-500 text-xs sm:text-sm font-semibold whitespace-nowrap">
                                                                {{ $coupon->quantity }} kupon
                                                            </span>
                                                            <span
                                                                class="w-1.5 h-1.5 bg-gray-600 rounded-full shrink-0"></span>
                                                            <span
                                                                class="text-yellow-500 text-xs sm:text-sm font-semibold whitespace-nowrap">
                                                                (Berlaku s/d
                                                                {{ date('d M Y', strtotime($coupon->coupon->ending_time)) }})
                                                            </span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </form>
                                        @endforeach
                                    </ul>
                                @else
                                    <ul class="p-4 space-y-1 text-sm text-yellow-500 text-center"
                                        aria-labelledby="dropdownToggleButton">
                                        <li>
                                            <span class="ms-3 text-sm font-medium text-yellow-500 text-center">Oops, kupon
                                                belum
                                                ditambahkan!</span>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    @else
                    @endif
                </div>

                <div class="flex flex-col mx-auto w-full">
                    <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="mb-5 text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900">Detail Pesanan</h1>
                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="bg-white border border-gray-300 rounded-lg p-5 drop-shadow-md">
                        @php
                            $countSubtotal = 0;
                        @endphp
                        <div class="flex flex-col-reverse">
                            @if (!empty($carts))
                                @foreach ($carts as $cart)
                                    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                        data-aos-duration="800" class="flex flex-row items-center w-full">
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
                                            {{-- Ubah class di bawah ini --}}
                                            <img class="w-32 h-32 sm:w-40 sm:h-40 object-cover object-center rounded-lg drop-shadow-md shrink-0"
                                                src="{{ asset('storage/' . $cart->product->image) }}"
                                                alt="{{ $cart->product->image }}" />
                                        @else
                                            {{-- Ubah class di bawah ini --}}
                                            <img class="w-32 h-32 sm:w-40 sm:h-40 object-cover object-center rounded-lg drop-shadow-md shrink-0"
                                                src="/images/fotoproduk/{{ $cart->product->image }}"
                                                alt="{{ $cart->product->name }}">
                                        @endif
                                        <div class="flex flex-col ml-4 justify-center w-full space-y-8">
                                            <div>
                                                <p class="text-base sm:text-lg font-semibold text-gray-900">
                                                    {{ $cart->product->name }}</p>
                                                <p class="text-xs sm:text-sm font-normal text-gray-400">
                                                    {{ $cart->quantity }} buah
                                                    ({{ $cart->weight }} gram)
                                                </p>
                                                @php
                                                    $originalPrice = Session::get('originalPrice_' . $cart->id);
                                                @endphp

                                                <div class="flex flex-col sm:flex-row justify-between">
                                                    <p class="text-sm sm:text-base font-medium text-gray-900">
                                                        Rp. {{ number_format($cart->price, 0, ',', '.') }}
                                                    </p>
                                                    @if ($originalPrice)
                                                        <p
                                                            class="text-sm sm:text-base font-medium text-red-600 line-through">
                                                            Rp. {{ number_format($originalPrice, 0, ',', '.') }}
                                                        </p>
                                                    @endif
                                                </div>
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
                                                        <input type="hidden"
                                                            id="destination_district_delete_{{ $cart->id }}"
                                                            name="district_id" value="">
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
                                        <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom"
                                            data-aos-duration="800" class="h-px my-4 border-0 bg-gray-400">
                                    @endif
                                @endforeach
                            @else
                                <div class="flex flex-col items-center justify-center">
                                    <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                        class="text-center text-xl font-bold text-gray-400">Keranjang
                                        anda kosong</h1>
                                    <a data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                        href="{{ route('products') }}">
                                        <p class="text-center text-base font-normal text-yellow-500">Belanja sekarang!</p>
                                    </a>
                                </div>
                            @endif
                        </div>
                        {{-- @if ($countSubtotal && $shipment_price) --}}
                        <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="h-px my-7 border-2 border-yellow-500">
                        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="flex flex-row justify-between items-center">
                            <p class="text-base font-medium text-gray-900">
                                Subtotal:
                            </p>
                            <p class="text-base text-right font-medium text-gray-900">
                                Rp. {{ number_format($countSubtotal, 0, ',', '.') }}
                            </p>
                        </div>
                        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mt-1 flex flex-row justify-between items-center">
                            <p class="text-base font-medium text-gray-900">
                                Biaya Pengiriman:
                            </p>
                            @if ($shipment_price == 0)
                                <p class="text-base text-right font-medium text-red-600">
                                    (Belum ada)
                                </p>
                            @else
                                <p class="text-base text-right font-medium text-gray-900">
                                    Rp. {{ number_format($shipment_price, 0, ',', '.') }}
                                </p>
                            @endif
                        </div>
                        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mt-1 flex flex-row justify-between items-center">
                            <p class="text-base font-medium text-gray-900">
                                Biaya Admin:
                            </p>
                            <p class="text-base text-right font-medium text-gray-900">
                                Rp. {{ number_format($admin_fee, 0, ',', '.') }}
                            </p>
                        </div>
                        <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mt-1 text-sm font-medium text-green-500">
                            *Dapatkan <span class="font-bold">{{ number_format($total_poin, 0, ',', '.') }}
                                poin (Rp. {{ number_format($total_money, 0, ',', '.') }})</span>!
                        </p>
                        <p data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="mt-1 text-sm font-bold text-gray-900">
                            *Pesanan hari minggu akan diproses pada hari senin!
                        </p>
                        <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="h-px my-7 border-2 border-yellow-500">
                        @php
                            $pointStatus = Session::get('pointStatus');
                            // Session::forget('pointStatus');
                        @endphp
                        <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="flex flex-row justify-between items-center">
                            <p class="text-xl font-bold text-gray-900">
                                Total:
                            </p>
                            <div class="flex flex-col space-y-0 justify-center items-end">
                                <span
                                    class="font-bold {{ isset($pointStatus) ? 'text-red-600 line-through text-lg' : ' text-xl text-gray-900 ' }}">
                                    Rp. {{ number_format($countSubtotal + $shipment_price + $admin_fee, 0, ',', '.') }}
                                </span>
                                @if (isset($pointStatus))
                                    @if ($reward_now >= $countSubtotal + $shipment_price + $admin_fee)
                                        <span class="text-xl font-bold text-gray-900">
                                            Rp.
                                            {{ number_format(0, 0, ',', '.') }}
                                        </span>
                                    @else
                                        <span class="text-xl font-bold text-gray-900">
                                            Rp.
                                            {{ number_format($countSubtotal + $shipment_price + $admin_fee - $reward_now, 0, ',', '.') }}
                                        </span>
                                    @endif
                                @endif
                            </div>
                        </div>
                        @if (Auth::user()->reward > 0)
                            <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="h-px my-7 border-2 border-yellow-500">
                            <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="flex flex-col space-y-2">
                                <form id="togglePointForm" action="{{ route('member.aktifPoin') }}" method="POST">
                                    @csrf
                                    <input type="hidden" id="addressHide_id" name="address_id"
                                        value="{{ old('address_id', session('checkout.address_id')) }}">
                                    <input type="hidden" id="addressHide" name="address"
                                        value="{{ old('address', session('checkout.address')) }}">
                                    <input type="hidden" id="provinceHide" name="province_id"
                                        value="{{ old('province_id', session('checkout.province_id')) }}">
                                    <input type="hidden" id="cityHide" name="city_id"
                                        value="{{ old('city_id', session('checkout.city_id')) }}">
                                    <input type="hidden" id="districtHide" name="district_id"
                                        value="{{ old('district_id', session('checkout.district_id')) }}">
                                    <input type="hidden" id="noteHide" name="note"
                                        value="{{ old('note', session('checkout.note')) }}">
                                    <label
                                        class="inline-flex items-center cursor-pointer bg-gray-900 rounded-full px-3 py-2">
                                        <input type="checkbox" id="togglePoint" value=""
                                            {{ isset($pointStatus) ? 'checked' : '' }} class="sr-only peer">
                                        <div
                                            class="relative w-9 h-5 bg-gray-600 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-yellow-500 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:translate-x-[-100%] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-yellow-500">
                                        </div>
                                        <span class="ms-2.5 text-base font-semibold text-yellow-500">Pakai Poin</span>
                                    </label>
                                </form>
                                @if (Session::has('pointStatus'))
                                    @if ($reward_now <= $countSubtotal + $shipment_price + $admin_fee)
                                        <span class="flex flex-row  items-center text-gray-900 text-sm">*Poin anda
                                            sekarang:
                                            {{ abs(number_format(0, 0, ',', '.')) }}<img src="/images/coin_icon.png"
                                                alt="Poin" class="w-4 h-4 ms-1"></span>
                                    @else
                                        <span class="flex flex-row  items-center text-gray-900 text-sm">*Poin anda
                                            sekarang:
                                            {{ abs(number_format(($countSubtotal + $shipment_price + $admin_fee - $reward_now) / $point->money_per_poin, 0, ',', '')) }}<img
                                                src="/images/coin_icon.png" alt="Poin" class="w-4 h-4 ms-1"></span>
                                    @endif
                                @else
                                    <span class="flex flex-row  items-center text-gray-900 text-sm">*Poin anda sekarang:
                                        {{ abs(number_format(Auth::user()->reward, 0, ',', '')) }}<img
                                            src="/images/coin_icon.png" alt="Poin" class="w-4 h-4 ms-1"></span>
                                @endif
                            </div>
                        @else
                        @endif
                        <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                            class="h-px my-7 border-2 border-yellow-500">
                        @if ($reward_now > $countSubtotal + $shipment_price + $admin_fee && Session::has('pointStatus'))
                            <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                type="button" data-modal-target="free-payment-modal"
                                data-modal-toggle="free-payment-modal"
                                class="cursor-pointer w-full text-yellow-500 bg-gray-900 hover:bg-gray-800 font-medium rounded-lg text-base px-5 py-2.5 text-center items-center">
                                Bayar Sekarang
                            </button>
                        @else
                            <button data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                type="button" data-modal-target="payment-modal" data-modal-toggle="payment-modal"
                                class="cursor-pointer w-full text-yellow-500 bg-gray-900 hover:bg-gray-800 font-medium rounded-lg text-base px-5 py-2.5 text-center items-center">
                                Bayar Sekarang
                            </button>
                        @endif
                        {{-- @endif --}}
                    </div>
                </div>
            </div>
            <div class="flex flex-col col-span-2">
                <div class="flex flex-row justify-between items-center">
                    <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        class="text-xl sm:text-2xl lg:text-3xl font-bold text-gray-900">Produk Bestseller</h1>
                    <a data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                        href="{{ route('products') }}">
                        <p class="text-base font-medium text-yellow-500 hover:text-yellow-600">Lihat semua</p>
                    </a>
                </div>
                <hr data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                    class="h-px my-2 border-0 bg-gray-400">
                <div
                    class = "pt-2 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mx-auto @if (count($products_bestseller) == 0) h-full justify-center items-center @endif">
                    @if (count($products_bestseller) > 0)
                        @foreach ($products_bestseller as $bestseller)
                            <div
                                class="relative hover:shadow-xl transform transition duration-500 hover:-translate-y-4 hover:z-5">
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
                                                        {{ number_format($bestseller->product->price, 0, ',', '.') }}
                                                    </p>
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
                                                        {{ number_format($bestseller->product->price, 0, ',', '.') }}
                                                    </p>
                                                @endif
                                            </div>
                                            {{-- @if ($bestseller->product->stock == 0)
                                                <p
                                                    class="text-sm sm:text-base md:text-base lg:text-sm font-normal text-red-600 text-center mt-2">
                                                    Stok Habis!</p>
                                            @else
                                                <p
                                                    class="text-sm sm:text-base md:text-base lg:text-sm font-normal text-lime-500 text-center mt-2">
                                                    Tersisa {{ $bestseller->product->stock }}
                                                    stok
                                                    lagi!</p>
                                            @endif --}}
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
                                        <!-- Diskon di pojok kanan atas -->
                                        @if ($bestseller->product->discount != 0)
                                            <div
                                                class="absolute top-0 right-0 m-4 text-lg text-red-600 rounded-lg font-bold bg-gray-900 p-2">
                                                {{ $bestseller->product->discount }}%</div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-span-4 flex flex-col items-center justify-center">
                            <h1 data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="800"
                                class="text-center text-lg font-bold text-gray-400">Mohon maaf,
                                belum
                                ada
                                produk best seller!</h1>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script language="javascript">
        $(document).ready(function() {

            // =================================================================
            // 1. DEFINISI VARIABEL SESSION (DARI LARAVEL KE JS)
            // =================================================================
            var savedProvinceId = "{{ old('province_id', session('checkout.province_id')) }}";
            var savedCityId = "{{ old('city_id', session('checkout.city_id')) }}";
            var savedDistrictId = "{{ old('district_id', session('checkout.district_id')) }}";

            // =================================================================
            // 2. FUNGSI AJAX YANG DIPERBARUI (BISA AUTO-SELECT)
            // =================================================================

            // Fungsi Load Kota
            function loadCities(provinceId, autoSelectCityId = null) {
                if (!provinceId) return;

                // URL Fix (Http/Https Mixed Content)
                var urlCities = "{{ route('member.ajax.getCities', ':province_id') }}".replace('http://',
                    'https://');
                urlCities = urlCities.replace(':province_id', provinceId);

                // Reset Dropdown Kota & Kecamatan
                $('#city_id').empty().append('<option value="">Sedang memuat...</option>').prop('disabled', true);
                $('#district_id').empty().append('<option value="">Pilih Kota Terlebih Dahulu</option>').prop(
                    'disabled', true);

                $.ajax({
                    url: urlCities,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#city_id').empty().append('<option value="">Pilih Kota/Kabupaten</option>');

                        $.each(data, function(key, city) {
                            var isSelected = (autoSelectCityId && city.id == autoSelectCityId) ?
                                'selected' : '';
                            $('#city_id').append('<option value="' + city.id + '" ' +
                                isSelected + '>' + city.name + '</option>');
                        });

                        $('#city_id').prop('disabled', false);

                        // --- CHAINING: Jika Kota terpilih otomatis, langsung load Kecamatan ---
                        if (autoSelectCityId) {
                            loadDistricts(autoSelectCityId, savedDistrictId);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching cities:", error);
                        $('#city_id').empty().append('<option value="">Gagal memuat kota</option>');
                    }
                });
            }

            // Fungsi Load Kecamatan
            function loadDistricts(cityId, autoSelectDistrictId = null) {
                if (!cityId) return;

                var urlDistricts = "{{ route('member.ajax.getDistricts', ':city_id') }}".replace('http://',
                    'https://');
                urlDistricts = urlDistricts.replace(':city_id', cityId);

                $('#district_id').empty().append('<option value="">Sedang memuat...</option>').prop('disabled',
                    true);

                $.ajax({
                    url: urlDistricts,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#district_id').empty().append('<option value="">Pilih Kecamatan</option>');

                        $.each(data, function(key, district) {
                            var isSelected = (autoSelectDistrictId && district.id ==
                                autoSelectDistrictId) ? 'selected' : '';
                            $('#district_id').append('<option value="' + district.id + '" ' +
                                isSelected + '>' + district.name + '</option>');
                        });

                        $('#district_id').prop('disabled', false);

                        // Trigger change agar input hidden terisi setelah auto-select
                        if (autoSelectDistrictId) {
                            $('#district_id').trigger('change');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error fetching districts:", error);
                        $('#district_id').empty().append(
                            '<option value="">Gagal memuat kecamatan</option>');
                    }
                });
            }

            // =================================================================
            // 3. EVENT LISTENERS (INTERAKSI USER)
            // =================================================================

            // --- [BARU] LOGIC TAMBAH ALAMAT ---
            $('#address_id').on('change', function() {
                if ($(this).val() == '0') {
                    $('#new_address_container').slideDown();
                } else {
                    $('#new_address_container').slideUp();
                }
            });

            // Cek kondisi awal (untuk reload validation error)
            if ($('#address_id').val() == '0') {
                $('#new_address_container').show();
            } else {
                $('#new_address_container').hide();
            }
            // ----------------------------------

            // User ganti Provinsi -> Load Kota
            $('#province_id').on('change', function() {
                loadCities($(this).val(), null);
            });

            // User ganti Kota -> Load Kecamatan
            $('#city_id').on('change', function() {
                loadDistricts($(this).val(), null);
            });

            // =================================================================
            // 4. AUTO-RUN SAAT HALAMAN RELOAD (RE-HYDRATION)
            // =================================================================

            // Jika session provinsi ada isinya, jalankan rantai pemuatan
            if (savedProvinceId) {
                loadCities(savedProvinceId, savedCityId);
            }

            // =================================================================
            // 5. UPDATE HIDDEN INPUTS & SINKRONISASI
            // =================================================================

            function syncInput(sourceId, targetId) {
                var source = $(sourceId);
                var target = $(targetId);

                // Saat user mengetik/memilih
                source.on('input change', function() {
                    target.val($(this).val());
                });

                // Saat halaman load (copy nilai session awal)
                if (source.val()) {
                    target.val(source.val());
                }
            }

            // A. Sinkronisasi ke Form "Cek Ongkir" & "Bayar"
            syncInput('#address_id', '#destination_address_id');
            syncInput('#address', '#destination_address');
            syncInput('#note', '#destination_note');

            syncInput('#province_id', '#destination_province');
            syncInput('#city_id', '#destination_city');
            syncInput('#district_id', '#destination_district');

            // B. Sinkronisasi ke Form Bayar (Store) - ID Unik
            syncInput('#province_id', '#final_province_id');
            syncInput('#city_id', '#final_city_id');
            syncInput('#district_id', '#final_district_id');

            // C. Sinkronisasi ke Form "Cek Kupon"
            syncInput('#address_id', '#addressHidden_id');
            syncInput('#address', '#addressHidden');
            syncInput('#province_id', '#provinceHidden');
            syncInput('#city_id', '#cityHidden');
            syncInput('#district_id', '#districtHidden');
            syncInput('#note', '#noteHidden');

            // D. Sinkronisasi ke Form "Toggle Poin"
            syncInput('#address_id', '#addressHide_id');
            syncInput('#address', '#addressHide');
            syncInput('#province_id', '#provinceHide');
            syncInput('#city_id', '#cityHide');
            syncInput('#district_id', '#districtHide');
            syncInput('#note', '#noteHide');

            // E. Sinkronisasi Looping (Ongkir & Kupon)
            @if (session('costs'))
                var costFormIds = [
                    @foreach (session('costs') as $index => $cost)
                        '{{ $index }}',
                    @endforeach
                ];
                costFormIds.forEach(function(formId) {
                    syncInput('#address_id', '#destination_address_id_' + formId);
                    syncInput('#address', '#destination_address_' + formId);
                    syncInput('#province_id', '#destination_province_' + formId);
                    syncInput('#city_id', '#destination_city_' + formId);
                    syncInput('#district_id', '#destination_district_' + formId);
                    syncInput('#note', '#destination_note_' + formId);
                });
            @endif

            @foreach ($coupons as $coupon)
                var couponId = '{{ $coupon->id }}';
                syncInput('#address_id', '#addressHidden_id_' + couponId);
                syncInput('#address', '#addressHidden_' + couponId);
                syncInput('#province_id', '#provinceHidden_' + couponId);
                syncInput('#city_id', '#cityHidden_' + couponId);
                syncInput('#district_id', '#districtHidden_' + couponId);
                syncInput('#note', '#noteHidden_' + couponId);
            @endforeach

            @foreach ($carts as $cart)
                syncInput('#district_id', '#destination_district_delete_{{ $cart->id }}');
            @endforeach

            // =================================================================
            // 6. HELPER FUNCTIONS (Checkbox, Image Preview, Loading)
            // =================================================================

            function updateCourierHidden() {
                var checkedValue = $('.courier-checkbox:checked').val();
                $('#courier_hidden').val(checkedValue || '');
            }
            updateCourierHidden();
            $('.courier-checkbox').on('change', function() {
                if (this.checked) {
                    $('.courier-checkbox').not(this).prop('checked', false);
                }
                updateCourierHidden();
                // Clear selected service when courier changes, forcing user to pick again
                $('#service_hidden').val('');
                $('.cost-checkbox').prop('checked', false);
                // Hide old costs list if any, so user knows they must click Cek Ongkir
                $('.cost-checkbox').closest('div.bg-gray-900').hide();
            });

            function updateCostHidden() {
                if ($('.cost-checkbox').length > 0) {
                    var checkedValue = $('.cost-checkbox:checked').val();
                    $('#service_hidden').val(checkedValue || '');
                }
            }
            updateCostHidden();
            $('.cost-checkbox').on('change', function() {
                if (this.checked) {
                    $('.cost-checkbox').not(this).prop('checked', false);
                }
                updateCostHidden();
            });

            // Auto Submit Handlers
            $('[id^=autoSubmitCheckbox_]').change(function() {
                var formId = $(this).attr('id').replace('autoSubmitCheckbox_', 'checkboxForm_');
                $('#loadingOverlay').css('display', 'flex');
                $(this).prop('disabled', true);
                sessionStorage.setItem('loadingDisplayed', true);
                $('#' + formId).submit();
            });

            $('[id^=autoSubmitCheckboxCost_]').change(function() {
                var formId = $(this).attr('id').replace('autoSubmitCheckboxCost_', 'checkboxCostForm_');
                $('#loadingOverlay').css('display', 'flex');
                $(this).prop('disabled', true);
                sessionStorage.setItem('loadingDisplayed', true);
                $('#' + formId).submit();
            });

            $('#togglePoint').on('change', function() {
                $('#loadingOverlay').css('display', 'flex');
                $(this).prop('disabled', true);
                sessionStorage.setItem('loadingDisplayed', true);
                $('#togglePointForm').submit();
            });

            $('.coupon-checkbox').on('change', function() {
                if (this.checked) {
                    $('.coupon-checkbox').not(this).prop('checked', false);
                }
            });

            function displayImagePreview(input) {
                var preview = $('#imagePreview');
                preview.empty();
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
        });
    </script>
@endsection
