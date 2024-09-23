<x-dashboard.layout>
    <div class="border-2 border-dashed rounded-lg border-gray-300 dark:border-gray-600 h-auto mb-4">
        <section class="bg-white dark:bg-gray-900">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-4 px-4 mx-auto max-w-2xl lg:p-8">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
                    <form action="#">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">

                            {{-- product name --}}
                            <div class="col-span-3">
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                    Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Type product name" required="">
                            </div>

                            {{-- category --}}
                            <div class="max-sm:col-span-3 md:col-span-2">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                <select id="category" name="category"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected="">Select category</option>
                                    <option value="TV">TV/Monitors</option>
                                    <option value="PC">PC</option>
                                    <option value="GA">Gaming/Console</option>
                                    <option value="PH">Phones</option>
                                </select>
                            </div>

                            {{-- brand --}}
                            <div class="max-sm:col-span-3">
                                <label for="brand"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                <input type="text" name="brand" id="brand"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Product brand" required="">
                            </div>

                            {{-- price --}}
                            <div class="w-full max-sm:col-span-3">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="number" name="price" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="F CFA 5,000" required="">
                            </div>

                            {{-- item weight --}}
                            <div class="max-sm:col-span-3">
                                <label for="item-weight"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item Weight
                                    (kg)</label>
                                <input type="number" name="item-weight" id="item-weight"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="12" required="">
                            </div>

                            {{-- stock --}}
                            <div class="max-sm:col-span-3">
                                <label for="stock"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock
                                </label>
                                <input type="number" name="stock" id="stock"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="10" required="">
                            </div>

                            {{-- product state --}}
                            <div class="max-sm:col-span-3">
                                <label for="condition"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product
                                    State</label>
                                <select id="condition" name="condition"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected="" value="New">New</option>
                                    <option value="Pre-owned">Pre-owned</option>
                                    <option value="Rezafurbished">Refurbished</option>
                                </select>
                            </div>

                            {{-- ship from address --}}
                            <div class="max-sm:col-span-3">
                                <label for="ship_from"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ship
                                    from</label>
                                <input type="text" name="ship_from" id="ship_from"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Type product addresse" required="">
                            </div>

                            {{-- shipping fee --}}
                            <div class="max-sm:col-span-3">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shipping
                                    fee</label>
                                <input type="number" name="price" id="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="F CFA 500" required="">
                            </div>

                            {{-- description --}}
                            <div class="col-span-3">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="description" rows="8"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Your description here"></textarea>
                            </div>

                            {{-- <div class="col-span-3">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <div
                                    data-hs-file-upload='{
                                    "url": "/upload",
                                    "acceptedFiles": "image/*",
                                    "autoHideTrigger": false,
                                    "extensions": {
                                      "default": {
                                        "class": "shrink-0 size-5"
                                      },
                                      "xls": {
                                        "class": "shrink-0 size-5"
                                      },
                                      "zip": {
                                        "class": "shrink-0 size-5"
                                      },
                                      "csv": {
                                        "icon": "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4\"/><path d=\"M14 2v4a2 2 0 0 0 2 2h4\"/><path d=\"m5 12-3 3 3 3\"/><path d=\"m9 18 3-3-3-3\"/></svg>",
                                        "class": "shrink-0 size-5"
                                      }
                                    }
                                  }'>
                                    <template data-hs-file-upload-preview="">
                                        <div class="relative mt-2 p-2 bg-white border border-gray-200 rounded-xl">
                                            <img class="mb-2 w-full object-cover rounded-lg" data-dz-thumbnail="">

                                            <div
                                                class="mb-1 flex justify-between items-center gap-x-3 whitespace-nowrap">
                                                <div class="w-10">
                                                    <span class="text-sm text-gray-800">
                                                        <span data-hs-file-upload-progress-bar-value="">0</span>%
                                                    </span>
                                                </div>

                                                <div class="flex items-center gap-x-2">
                                                    <button type="button"
                                                        class="text-gray-500 hover:text-gray-800 focus:outline-none focus:text-gray-800"
                                                        data-hs-file-upload-remove="">
                                                        <svg class="shrink-0 size-3.5"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M3 6h18"></path>
                                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                            <line x1="10" x2="10" y1="11"
                                                                y2="17"></line>
                                                            <line x1="14" x2="14" y1="11"
                                                                y2="17"></line>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="flex w-full h-2 bg-gray-200 rounded-full overflow-hidden"
                                                role="progressbar" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100" data-hs-file-upload-progress-bar="">
                                                <div class="flex flex-col justify-center rounded-full overflow-hidden bg-blue-600 text-xs text-white text-center whitespace-nowrap transition-all duration-500 hs-file-upload-complete:bg-green-500"
                                                    style="width: 0" data-hs-file-upload-progress-bar-pane=""></div>
                                            </div>
                                        </div>
                                    </template>

                                    <div class="cursor-pointer p-12 flex justify-center bg-white border border-dashed border-gray-300 rounded-xl"
                                        data-hs-file-upload-trigger="">
                                        <div class="text-center">
                                            <span
                                                class="inline-flex justify-center items-center size-16 bg-gray-100 text-gray-800 rounded-full">
                                                <svg class="shrink-0 size-6" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                    <polyline points="17 8 12 3 7 8"></polyline>
                                                    <line x1="12" x2="12" y1="3"
                                                        y2="15"></line>
                                                </svg>
                                            </span>

                                            <div
                                                class="mt-4 flex flex-wrap items-center justify-center text-sm leading-6 text-gray-600">
                                                <span
                                                    class="pe-1 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Drop your file here or
                                                </span>
                                                <span
                                                    class="bg-white font-semibold text-blue-600 hover:text-blue-700 rounded-lg decoration-2 hover:underline focus-within:outline-none focus-within:ring-2 focus-within:ring-blue-600 focus-within:ring-offset-2">browse</span>
                                            </div>

                                            <p class="mt-1 text-sm text-gray-400">
                                                Supported image extensions<br>
                                                jpg, jpeg, png, webp
                                            </p>
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-4 gap-x-2 empty:gap-0" data-hs-file-upload-previews="">
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-span-3">
                                <label for="product-images-dropzone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <div class="dropzone" id="product-images-dropzone"></div>
                            </div>

                            <div class="flex flex-column space-x-3 col-span-3">
                                <button type="submit"
                                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                    Add product
                                </button>
                                <button type="reset"
                                    class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </section>
    </div>

    <script>
        Dropzone.autoDiscover = false;
        let myDropzone = new Dropzone('#product-images-dropzone', {
            url: '/product-images/upload',
            autoProcessQueue: false,
            maxFiles: 5,
            acceptedFiles: 'image/*',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            success: function(file, response) {
                console.log('Image uploaded successfully:', response.path);
            },
            error: function(file, response) {
                console.error('Image upload failed:', response);
            }
        });

        document.getElementById('product-form').addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);

            axios.post('/products', formData)
                .then(function(response) {
                    var productId = response.data.product_id;

                    myDropzone.on('sending', function(file, xhr, formData) {
                        formData.append('product_id', productId);
                    });

                    myDropzone.processQueue();
                })
                .catch(function(error) {
                    if (error.response && error.response.data.errors) {
                        alert('Product creation failed. Please check the validation errors.');
                    }
                });
        });
    </script>
</x-dashboard.layout>
