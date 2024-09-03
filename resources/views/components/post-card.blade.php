@props(['image', 'title', 'body', 'profile', 'date', 'user'])

<a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5 dark:border-neutral-700 dark:hover:border-transparent dark:hover:shadow-black/40 dark:focus:border-transparent dark:focus:shadow-black/40"
    href="#">
    <div class="aspect-w-16 aspect-h-11">
        <img class="w-full object-cover rounded-xl" src="{{ asset('storage/' . $post->cover_image) }}" alt="Blog Image">
    </div>
    <div class="my-6">
        <h3 class="text-xl font-semibold text-gray-800 ">
            {{ $post->title }}
        </h3>
        <p class="mt-5 text-gray-600 ">
            {{ Str::words($post->body, 15) }}
        </p>
    </div>
    <div class="mt-auto flex items-center gap-x-3">
        <img class="size-14 rounded-full"
            src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
            alt="Avatar">
        <div>
            <p class="text-md text-gray-500">Posted : {{ $post->created_at->diffForHumans() }} </p>
            <h5 class="text-md text-gray-800">By Lauren Waller</h5>
        </div>
    </div>
</a>
