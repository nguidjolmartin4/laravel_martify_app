<x-dashboard :email="$user->email" :image="$user->profile_picture">
    <div class="max-w-4xl px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <div class="bg-white rounded-xl shadow p-4 sm:p-7">

            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 first:pt-0">
                    {{-- Errors Section --}}
                    <div class="sm:col-span-12">
                        @if (session('success'))
                            <x-flash-msg-success msg="{{ session('success') }}" />
                        @endif

                        @if ($errors->any())
                            <x-flash-msg-error msg="{{ session('success') }}" :errors="$errors" />
                        @endif
                    </div>


                    <div class="sm:col-span-12">
                        <h2 class="mb-3 text-2xl font-semibold text-gray-800">
                            Create a blog post.
                        </h2>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="blog_cover_image" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Blog Cover Image
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <label for="blog_cover_image" class="sr-only">Choose a cover image</label>
                        <input type="file" name="cover_image" id="blog_cover_image"
                            class="block w-full border border-gray-200 shadow-sm rounded-lg text-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                file:border-0
              file:bg-gray-100 file:me-4
              file:py-3 file:px-4
             ">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="blog_title" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Blog title
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input id="blog_title" type="text" name="title" value="{{ old('title') }}"
                            class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-sm text-md rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    </div>

                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="blog_body" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                                Blog body
                            </label>
                        </div>
                    </div>

                    <div class="sm:col-span-9">
                        <textarea id="blog_body" name="body"
                            class="py-3 px-3 block w-full border-gray-200 rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            rows="6" placeholder="Add a cover letter or anything else you want to share.">{{ old('body') }}</textarea>
                    </div>

                    {{-- <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="blog_tags" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                                Adding tags
                            </label>
                        </div>
                    </div>

                    <div class="sm:col-span-9">
                        <select multiple=""
                            data-hs-select='{
    "placeholder": "Select tags...",
    "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
    "optionClasses": "py-3 px-4 w-full text-md text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50",
    "mode": "tags",
    "wrapperClasses": "relative ps-0.5 pe-9 min-h-[46px] flex items-center flex-wrap text-nowrap w-full border border-gray-200 rounded-lg text-start text-md focus:border-blue-500 focus:ring-blue-500",
    "tagsItemTemplate": "<div class=\"flex flex-nowrap items-center relative z-10 bg-white border border-gray-200 rounded-full p-1 m-1 \"><div class=\"size-6 me-1\" data-icon></div><div class=\"whitespace-nowrap text-gray-800 \" data-title></div><div class=\"inline-flex shrink-0 justify-center items-center size-5 ms-2 rounded-full text-gray-800 bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 text-md cursor-pointer\" data-remove><svg class=\"shrink-0 size-3\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"M18 6 6 18\"/><path d=\"m6 6 12 12\"/></svg></div></div>",
    "tagsInputClasses": "py-3 px-2 rounded-lg order-1 text-md outline-none",
    "optionTemplate": "<div class=\"flex items-center\"><div class=\"size-8 me-2\" data-icon></div><div><div class=\"text-md font-semibold text-gray-800 \" data-title></div><div class=\"text-xs text-gray-500 \" data-description></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
    "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
  }'
                            class="hidden">
                            <option value="Technology">Technology</option>
                            <option value="Health">Health</option>
                            <option value="Lifestyle">Lifestyle</option>
                            <option value="Business">Business</option>
                            <option value="Travel">Travel</option>
                            <option value="Food">Food</option>
                            <option value="Education">Education</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Sports">Sports</option>
                            <option value="Finance">Finance</option>
                            <option value="DIY">DIY</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Fitness">Fitness</option>
                            <option value="Parenting">Parenting</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Personal Development">Personal Development</option>
                            <option value="Productivity">Productivity</option>
                            <option value="Environment">Environment</option>
                            <option value="Beauty">Beauty</option>
                            <option value="Innovation">Innovation</option>
                        </select>
                    </div> --}}

                    {{-- adding useful links to the blog post --}}
                    {{-- <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800">
                            Add some useful links
                        </h2>
                    </div>

                    @for ($i = 1; $i <= 3; $i++)
                        <div class="sm:col-span-3">
                            <label for="useful_links_{{ $i }}"
                                class="inline-block text-md font-medium text-gray-500 mt-2.5">
                                Website URL {{ $i }}
                            </label>
                        </div>
                        <div class="sm:col-span-9">
                            <input id="useful_links_{{ $i }}" type="text" name="useful_links[]"
                                value="{{ old('useful_links.' . ($i - 1)) }}"
                                class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-sm text-md rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                        </div>
                    @endfor
                </div> --}}

                    {{-- Consentment --}}
                    {{-- <div class="py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">
                        Submit application
                    </h2>
                    <p class="mt-3 text-md text-gray-600">
                        In order to contact you with future jobs that you may be interested in, we need to store your
                        personal data.
                    </p>
                    <p class="mt-2 text-md text-gray-600">
                        If you are happy for us to do so please click the checkbox below.
                    </p>

                    <div class="mt-5 flex">
                        <input type="checkbox"
                            class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            id="af-submit-application-privacy-check">
                        <label for="af-submit-application-privacy-check" class="text-md text-gray-500 ms-2">Allow us
                            to process your personal information.</label>
                    </div>
                </div> --}}

                    <div class="sm:col-span-3">
                        <button type="reset"
                            class="w-full text-center py-3 px-4 justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                            Cancel
                        </button>
                    </div>

                    <div class="sm:col-span-9">
                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Submit blog post
                        </button>
                    </div>
            </form>
        </div>
    </div>
</x-dashboard>
