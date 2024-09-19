<x-dashboard :email="$user->email" :image="$user->profile_picture">
    <div class="max-w-4xl px-4 py-4 sm:px-6">
        <div class="bg-white rounded-xl shadow p-4 sm:p-7">
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-5">
                    {{-- Alert messages --}}
                    <div class="sm:col-span-12">
                        @if (session('status'))
                            <div id="dismiss-alert"
                                class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4"
                                role="alert" tabindex="-1" aria-labelledby="hs-bordered-success-style-label">
                                <div class="flex">
                                    <div class="shrink-0">
                                        <span
                                            class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path
                                                    d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z">
                                                </path>
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="ms-3 flex-1">
                                        <h3 id="hs-bordered-success-style-label" class="text-gray-800 font-semibold">
                                            Successfully updated.
                                        </h3>
                                        <p class="text-md text-gray-700">
                                            {{ session('status') }}
                                        </p>
                                    </div>
                                    <div class="ps-3">
                                        <button type="button"
                                            class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100"
                                            data-hs-remove-element="#dismiss-alert">
                                            <span class="sr-only">Dismiss</span>
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div id="error-alert"
                                class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border-s-4 border-red-500 p-4"
                                role="alert" tabindex="-1" aria-labelledby="hs-bordered-red-style-label">
                                <div class="flex">
                                    <div class="shrink-0">
                                        <!-- Icon -->
                                        <span
                                            class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </span>
                                        <!-- End Icon -->
                                    </div>
                                    <div class="ms-3 flex-1">
                                        <h3 id="hs-bordered-red-style-label" class="text-gray-800 font-semibold">
                                            Error!
                                        </h3>
                                        <p class="text-md text-gray-700">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </p>
                                    </div>
                                    <div class="ps-3">
                                        <button type="button"
                                            class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100"
                                            data-hs-remove-element="#error-alert">
                                            <span class="sr-only">Dismiss</span>
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800">
                            Add a product
                        </h2>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="product_name" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Product name
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input id="product_name" type="text" name="name" autocomplete="name"
                            value="{{ old('name') }}"
                            class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-md focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="category_id" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Product category
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <select
                            data-hs-select='{
    "hasSearch": true,
    "searchPlaceholder": "Search for a category...",
    "searchClasses": "block w-full text-md border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] py-3 px-3",
    "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
    "placeholder": "Select a category...",
    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 \" data-title></span></button>",
    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-md focus:outline-none focus:ring-2 focus:ring-blue-500",
    "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
    "optionClasses": "py-3 px-4 w-full text-md text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100",
    "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 \" data-title></div></div></div>",
    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
  }'
                            class="hidden" name="category_id" id="category_id">
                            <option value="">Choose a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="brand" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Brand
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input id="brand" type="text" name="brand" autocomplete="off"
                            placeholder="ex. Apple, Samsung..." value="{{ old('brand') }}"
                            class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-md focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="description" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Description
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <textarea id="description" type="text" name="description" rows="10" value="{{ old('description') }}"
                            class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-sm text-md rounded-lg focus:border-blue-500 focus:ring-blue-500 "></textarea>
                    </div>

                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="price" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                                Price
                            </label>
                        </div>
                    </div>

                    <div class="sm:col-span-9">
                        <input id="price" type="text" name="price" autocomplete="price"
                            value="{{ old('price') }}"
                            class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-sm rounded-lg text-md focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="condition" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                                Condition
                            </label>
                        </div>
                    </div>

                    <div class="sm:col-span-9">
                        <select id="condition"
                            data-hs-select='{
    "placeholder": "In which condition is your product...",
    "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
    "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-md focus:outline-none focus:ring-2 focus:ring-blue-500",
    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
    "optionClasses": "py-3 px-4 w-full text-md text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
    "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 \" xmlns=\"http:.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
    }'
                            class="hidden" name="condition">
                            <option value="new">Brand new</option>
                            <option value="used">Used</option>
                        </select>
                    </div>

                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="stock_quantity" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                                Quantity in stock
                            </label>
                        </div>
                    </div>

                    <div class="sm:col-span-9">
                        <div class="py-3 px-3 bg-white border border-gray-200 rounded-lg"
                            data-hs-input-number='{"min": 0}'>
                            <div class="w-full flex justify-between items-center gap-x-3">
                                <input
                                    class="w-full p-0 bg-transparent border-0 text-gray-800 focus:ring-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:appearance-none"
                                    style="-moz-appearance: textfield;" type="number" placeholder="0"
                                    id="stock_quantity" aria-roledescription="Number field"
                                    data-hs-input-number-input="" name="stock_quantity">
                                <div class="flex justify-end items-center gap-x-1.5">
                                    <button type="button"
                                        class="size-6 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        tabindex="-1" aria-label="Decrease" data-hs-input-number-decrement="">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                        </svg>
                                    </button>
                                    <button type="button"
                                        class="size-6 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                        tabindex="-1" aria-label="Increase" data-hs-input-number-increment="">
                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5v14"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800">
                            Add your product's images
                        </h2><span class="text-md italic text-gray-400">You need to upload 1 image at
                            least</span>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="image_1" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Image 1
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="file" name="image_1" id="image_1"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                              file:bg-gray-50 file:border-0
                              file:me-4
                              file:py-3 file:px-4
                             ">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="image_2" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Image 2
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="file" name="image_2" id="image_2"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                              file:bg-gray-50 file:border-0
                              file:me-4
                              file:py-3 file:px-4
                             ">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="image_3" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Image 3
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="file" name="image_3" id="image_3"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                              file:bg-gray-50 file:border-0
                              file:me-4
                              file:py-3 file:px-4
                             ">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="image_4" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Image 4
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="file" name="image_4" id="image_4"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                              file:bg-gray-50 file:border-0
                              file:me-4
                              file:py-3 file:px-4
                             ">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="image_5" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Image 5
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input type="file" name="image_5" id="image_5"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                              file:bg-gray-50 file:border-0
                              file:me-4
                              file:py-3 file:px-4
                             ">
                    </div>

                    <div class="sm:col-span-3">
                        <button type="reset"
                            class="w-full text-center py-3 px-4 justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                            Cancel
                        </button>
                    </div>
                    <div class="sm:col-span-9">
                        <button type="mit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 ">
                            Add product to site
                        </button>
                    </div>

                </div>

            </form>
        </div>
    </div>
</x-dashboard>
