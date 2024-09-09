<x-layout>
    <div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">
        <div class="max-w-2xl">
            <div class="flex justify-between items-center mb-6">
                <div class="flex w-full sm:items-center gap-x-5 sm:gap-x-3">
                    <div class="shrink-0">
                        <img class="size-12 rounded-full" src="{{ asset('storage/' . $user->profile_picture) }}"
                            alt="Avatar">
                    </div>

                    <div class="grow">
                        <div class="flex justify-between items-center gap-x-2">
                            <div>
                                <div class="hs-tooltip [--trigger:hover] [--placement:bottom] inline-block">
                                    <div class="hs-tooltip-toggle sm:mb-1 block text-start">
                                        <a href="{{ route('posts.user', $post->user) }}"
                                            class="font-semibold text-gray-800 dark:text-neutral-200">
                                            {{ $user->full_name }}
                                        </a>
                                    </div>
                                </div>

                                <ul class="text-xs text-gray-500 dark:text-neutral-500">
                                    <li
                                        class="inline-block relative pe-6 last:pe-0 last-of-type:before:hidden before:absolute before:top-1/2 before:end-2 before:-translate-y-1/2 before:size-1 before:bg-gray-300 before:rounded-full dark:text-neutral-400 dark:before:bg-neutral-600">
                                        {{ $post->created_at->diffForHumans() }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-5 md:space-y-8">
                <div class="space-y-3">
                    <h2 class="text-2xl font-bold md:text-3xl dark:text-white">{{ $post->title }}
                    </h2>

                    <p class="text-lg text-gray-800 dark:text-neutral-200">{{ $post->body }}</p>
                </div>

                <figure>
                    <img class="w-full object-cover rounded-xl" src="{{ asset('storage/' . $post->cover_image) }}"
                        alt="Blog Image">
                    <figcaption class="mt-3 text-md text-center text-gray-500 dark:text-neutral-500">
                        Blog post cover
                    </figcaption>
                </figure>
            </div>
        </div>
    </div>
</x-layout>
