<x-layout>
    <section class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 sm:py-24">
        <img src="https://pagedone.io/asset/uploads/1705473908.png" alt="cover-image"
            class="w-full absolute top-0 left-0 z-0 h-30">
        <div class="w-full max-w-7xl mx-auto px-6 md:px-8">
            <div class="flex items-center justify-center sm:justify-start relative z-10 mb-5">
                <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="user-avatar-image"
                    class="border-4 border-solid border-white rounded-full size-40">
            </div>
            <div class="flex items-center justify-center flex-col sm:flex-row max-sm:gap-5 sm:justify-between mb-5">
                <div class="block">
                    <h3 class="font-manrope font-bold text-4xl text-gray-900 mb-1 max-sm:text-center">
                        {{ $user->full_name }}</h3>
                    <p class="font-normal text-base leading-7 text-gray-500  max-sm:text-center">Here your can discover
                        all the blog posts made by {{ $user->first_name }} </p>
                </div>
                <button
                    class="py-3 px-3 flex rounded-md bg-blue-600 items-center shadow-sm shadow-transparent transition-all duration-500 hover:bg-blue-700">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.3011 8.69881L8.17808 11.8219M8.62402 12.5906L8.79264 12.8819C10.3882 15.6378 11.1859 17.0157 12.2575 16.9066C13.3291 16.7974 13.8326 15.2869 14.8397 12.2658L16.2842 7.93214C17.2041 5.17249 17.6641 3.79266 16.9357 3.0643C16.2073 2.33594 14.8275 2.79588 12.0679 3.71577L7.73416 5.16033C4.71311 6.16735 3.20259 6.67086 3.09342 7.74246C2.98425 8.81406 4.36221 9.61183 7.11813 11.2074L7.40938 11.376C7.79182 11.5974 7.98303 11.7081 8.13747 11.8625C8.29191 12.017 8.40261 12.2082 8.62402 12.5906Z"
                            stroke="white" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <span class="px-2 font-semibold text-base leading-7 text-white">Send a message</span>
                </button>
            </div>
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

        <div class="mt-12 flex justify-between items-center ">
            {{ $posts->links() }}
        </div>
    </section>

</x-layout>
