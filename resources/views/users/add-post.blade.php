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
                            Blog title <br>

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
                                <p class="text-sm text-gray-400">Note : for text formatting, you can use the html
                                    syntax for that!</p>
                            </label>
                        </div>
                    </div>

                    <div class="sm:col-span-9">
                        <textarea id="blog_body" name="body" id="body"
                            class="py-3 px-3 block w-full border-gray-200 rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            rows="6" placeholder="Add a cover letter or anything else you want to share.">{{ old('body') }}</textarea>
                    </div>

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
