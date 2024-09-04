<x-layout>
    <x-hero />
    <x-stats />

    {{-- Products Section --}}
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Repeat this section for different subcategories -->
        @foreach ($subcategories as $subcategory)
            <div class="my-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-2xl font-semibold">{{ $subcategory->name }}</h2>
                    <a href="{{ route('subcategory.show', $subcategory->id) }}" class="text-blue-500">View
                        all</a>
                </div>
                <div class="flex space-x-4 overflow-x-auto">
                    @foreach ($subcategory->products->take(10) as $product)
                        <x-product-card :id="$product->id" :image="asset('storage/' . $product->image_1)" :name="$product->name" :rating="$product->rating"
                            :price="$product->price" />
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    {{-- Category Section --}}
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <h1 class="text-3xl font-bold mb-4">Shop by Categories</h1>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
            @foreach ($categories as $category)
                <a class="group block relative overflow-hidden rounded-lg"
                    href="{{ route('category.show', $category->id) }}">
                    <p class="mb-2 md:hidden text-xl">{{ $category->name }}</p>
                    {{-- <img class="w-full size-60 object-cover bg-gray-100 rounded-lg" src="{{ $category->image_path }}" alt="{{ $category->name }}"> --}}
                    <img class="w-full size-60 object-cover bg-gray-100 rounded-lg"
                        src="{{ asset('storage/' . $category->image_path) }}" alt="{{ $category->name }}">
                    <div class="absolute bottom-1 end-1 opacity-0 group-hover:opacity-100 transition">
                        <div
                            class="flex items-center gap-x-1 py-1 px-2 bg-white border border-gray-200 text-gray-800 rounded-lg">
                            <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <path d="m21 21-4.3-4.3" />
                            </svg>
                            <span class="text-xl">Shop {{ $category->name }} </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <x-testimonials />
    <x-faq />
    <x-blog-section :posts="$posts" />
    <x-newsletter />
</x-layout>
