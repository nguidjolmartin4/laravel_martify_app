<x-layout>
    <div class="relative overflow-hidden">
        <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-24">
            <div class="text-center">
                <h1 class="text-4xl sm:text-6xl font-bold text-gray-800 ">
                    <span class="text-blue-600">Martify</span> Blog Section
                </h1>

                <p class="mt-3 text-gray-600 ">
                    Stay in the know with insights from <span class="text-blue-600 font-medium">Martify</span> experts.
                </p>

                <div class="mt-7 sm:mt-12 mx-auto max-w-xl relative">
                    <form>
                        <div class="relative z-10 flex gap-x-3 bg-white border rounded-lg shadow-lg shadow-gray-100 ">
                            <div class="w-full">
                                <label for="hs-search-article-1" class="block text-md text-gray-700 font-medium "><span
                                        class="sr-only">Search article</span></label>
                                <input type="email" name="hs-search-article-1" id="hs-search-article-1"
                                    class="py-2.5 px-4 block w-full border-transparent rounded-lg focus:border-blue-500 focus:ring-blue-500 "
                                    placeholder="Search article">
                            </div>
                            <div>
                                <a class="size-[46px] inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                    href="#">
                                    <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8" />
                                        <path d="m21 21-4.3-4.3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </form>

                    <div class="hidden md:block absolute top-0 end-0 -translate-y-12 translate-x-20">
                        <svg class="w-16 h-auto text-orange-500" width="121" height="135" viewBox="0 0 121 135"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                            <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                            <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor"
                                stroke-width="10" stroke-linecap="round" />
                        </svg>
                    </div>

                    <div class="hidden md:block absolute bottom-0 start-0 translate-y-10 -translate-x-32">
                        <svg class="w-40 h-auto text-cyan-500" width="347" height="188" viewBox="0 0 347 188"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4 82.4591C54.7956 92.8751 30.9771 162.782 68.2065 181.385C112.642 203.59 127.943 78.57 122.161 25.5053C120.504 2.2376 93.4028 -8.11128 89.7468 25.5053C85.8633 61.2125 130.186 199.678 180.982 146.248L214.898 107.02C224.322 95.4118 242.9 79.2851 258.6 107.02C274.299 134.754 299.315 125.589 309.861 117.539L343 93.4426"
                                stroke="currentColor" stroke-width="7" stroke-linecap="round" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <div
                    class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5 dark:border-neutral-700 dark:hover:border-transparent dark:hover:shadow-black/40 dark:focus:border-transparent dark:focus:shadow-black/40">
                    <a href="{{ route('posts.show', $post) }}" class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl" src="{{ asset('storage/' . $post->cover_image) }}"
                            alt="Blog Image">
                    </a>
                    <div class="my-6">
                        <a href="{{ route('posts.show', $post) }}"
                            class="text-xl font-semibold text-gray-800 hover:text-blue-600">
                            {{ $post->title }}
                        </a>
                        <p class="mt-5 text-gray-600 ">
                            {{ \Illuminate\Support\Str::words($post->body, 15) }}
                        </p>
                    </div>
                    <div class="mt-auto flex items-center gap-x-3">
                        <img class="size-14 rounded-full" src="{{ asset('storage/' . $post->user->profile_picture) }}"
                            alt="Avatar">
                        <div>
                            <p class="text-md text-gray-500">Posted : {{ $post->created_at->diffForHumans() }} </p>
                            <span class="text-md text-gray-500">
                                By
                                <a href="{{ route('posts.user', $post->user) }}"
                                    class="text-md text-blue-600 font-medium hover:underline">
                                    {{ $post->user->full_name }}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-12 flex justify-between items-center ">
            {{ $posts->links() }}
        </div>
    </div>
</x-layout>
