<x-dashboard :email="$user->email" :image="$user->profile_picture">
    <div class="flex flex-col p-4 sm:p-6 space-y-4 sm:space-y-6">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div
                    class="bg-white border border-gray-200 rounded-xl shadow-md overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                Your blog posts
                            </h2>
                            <p class="text-md text-gray-600 dark:text-neutral-400">
                                Manage your blog posts, edit details and more.
                            </p>
                        </div>

                        <div>
                            <div class="inline-flex gap-x-2">
                                <a class="py-2 px-3 inline-flex items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                    href="{{ route('post.create') }}">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                    Add Blog Post
                                </a>
                            </div>
                        </div>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead class="bg-gray-50 ">
                            <tr>
                                <th scope="col" class="ps-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            ID
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Title
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Body
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Created at
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-end">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Action
                                        </span>
                                    </div>
                                </th>


                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @if (session('delete'))
                                <x-flash-msg-success msg="{{ session('delete') }}" />
                            @endif

                            <?php $i = 0; ?>
                            @foreach ($posts as $post)
                                <?php $i++; ?>
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span
                                                class="sr-onlyblock text-md font-semibold text-gray-800 dark:text-neutral-200">
                                                {{ $i }} </span>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <img src="{{ asset('storage/' . $post->cover_image) }}"
                                                    alt="blog cover image" class="w-10 h-10">
                                                <span
                                                    class="block text-md font-semibold text-gray-800 dark:text-neutral-200">{{ Str::words($post->title, 5) }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <span
                                                    class="block text-md font-semibold text-gray-800 dark:text-neutral-200">{{ Str::words($post->body, 10) }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <span
                                                    class="block text-md font-semibold text-gray-800 dark:text-neutral-200">{{ $post->created_at->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5 space-x-4 flex">
                                            <a class="inline-flex items-center gap-x-1 text-md text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500"
                                                href="{{ route('post.edit', $post) }}">
                                                Edit
                                            </a>

                                            <form action="{{ route('post.destroy', $post) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="inline-flex items-center gap-x-2 text-md py-2 px-3 rounded-md text-white bg-red-500 decoration-2 hover:bg-red-900 font-medium"
                                                    type="submit">
                                                    Delete
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                                    </svg>

                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-dashboard>
