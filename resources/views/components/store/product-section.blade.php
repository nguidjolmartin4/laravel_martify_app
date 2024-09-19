@props(['title', 'products', 'tag'])

<section class="bg-gray-50 py-8 antialiased md:py-12">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
        <!-- Heading & Filters -->
        <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
            <div>
                <h2 class="mt-3 text-xl font-semibold text-gray-900  sm:text-2xl">Shop our {{ $title }} </h2>
            </div>
        </div>
        <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($products as $product)
                <x-store.product-card :product="$product" />
            @endforeach
        </div>
        <div class="w-full text-center">
            <a type="button" href="#"
                class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-md font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 ">Show
                more</a>
        </div>
    </div>
</section>
