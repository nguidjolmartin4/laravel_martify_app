<x-layout>
    {{-- <x-navigation /> --}}
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

    <section>
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8">
            <header>
                <h2 class="text-xl font-bold text-gray-900 sm:text-3xl">Product Collection</h2>

                <p class="mt-4 max-w-md text-gray-500">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque praesentium cumque iure
                    dicta incidunt est ipsam, officia dolor fugit natus?
                </p>
            </header>

            <ul class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <li>
                    <a href="#" class="group block overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80"
                            alt=""
                            class="h-[350px] w-full object-cover transition duration-500 group-hover:scale-105 sm:h-[450px]" />

                        <div class="relative bg-white pt-3">
                            <h3 class="text-xs text-gray-700 group-hover:underline group-hover:underline-offset-4">
                                Basic Tee
                            </h3>

                            <p class="mt-2">
                                <span class="sr-only"> Regular Price </span>

                                <span class="tracking-wider text-gray-900"> £24.00 GBP </span>
                            </p>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </section>

    <x-testimonials />
    <x-faq />
    <x-blog-section />
    <x-newsletter />
</x-layout>
