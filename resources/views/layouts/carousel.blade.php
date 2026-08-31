<div id="indicators-carousel" class="relative w-full" data-carousel="slide">
    <div class="relative h-56 overflow-hidden md:h-96">
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="{{ $carousel_1 }}"
                class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center"
                alt="{{ $carousel_1 }}">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ $carousel_2 }}"
                class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center"
                alt="{{ $carousel_2 }}">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ $carousel_3 }}"
                class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center"
                alt="{{ $carousel_3 }}">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ $carousel_4 }}"
                class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center"
                alt="{{ $carousel_4 }}">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ $carousel_5 }}"
                class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center"
                alt="{{ $carousel_5 }}">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ $carousel_6 }}"
                class="absolute block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 object-cover object-center"
                alt="{{ $carousel_6 }}">
        </div>
    </div>
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
            data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
            data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
            data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
            data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
            data-carousel-slide-to="4"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6"
            data-carousel-slide-to="5"></button>
    </div>
    <button type="button"
        class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
            <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
