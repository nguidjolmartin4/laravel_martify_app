<!-- resources/views/components/product-card.blade.php -->
<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
    <!-- Product Image -->
    <a href="#">
        <img class="w-full rounded-t-lg" src="{{ $image }}" alt="{{ $name }}" />
    </a>
    <div class="px-5 py-5">
        <!-- Product name -->
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $name }}</h5>
        </a>
        <div class="flex items-center mt-2.5 mb-5">
            <span
                class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded ms-3">{{ $rating }}</span>
        </div>

        <div class="flex flex-col space-y-2">
            <p class="text-3xl font-bold text-gray-900">{{ $price }} FCFA</p>
            <a href="#"
                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md px-5 py-2.5 text-center">Add
                to cart</a>
        </div>
    </div>
</div>

{{-- <a href="#" class="group block overflow-hidden h-[350px] sm:h-[450px]">
    <div class="relative h-[350px] sm:h-[450px]">
        <img src="{{ $image1 }}" alt="{{ $name }}"
            class="absolute inset-0 h-full w-full object-cover opacity-100 group-hover:opacity-0" />

        <img src="{{ $image2 }}" alt="{{ $name }}"
            class="absolute inset-0 h-full w-full object-cover opacity-0 group-hover:opacity-100" />
    </div>

    <div class="relative bg-white pt-3">
        <h3 class="text-md text-gray-700 group-hover:underline group-hover:underline-offset-4">
            {{ $name }}
        </h3>

        <div class="mt-1.5 flex items-center justify-between text-gray-900">
            <p class="tracking-wide">{{ $price }} F CFA</p>

            <p class="text-xs uppercase tracking-wide">{{ $rating }}</p>
        </div>
    </div>
</a> --}}
