@props(['posts'])

<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
    <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
        <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">The Blog</h2>
        <p class="mt-1 text-gray-600">See how others users are show casing the products they are selling. And more
            products on the website</p>
    </div>

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
                        {{ Str::words($post->body, 15) }}
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

    <div class="mt-12 text-center">
        <a class="py-3 px-4 inline-flex items-center gap-x-1 text-md font-medium rounded-full border border-gray-200 bg-white text-blue-600 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
            href="{{ route('posts.index') }}">
            Read more
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </a>
    </div>
</div>
