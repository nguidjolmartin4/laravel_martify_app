<section class="max-w-2xl px-6 py-8 mx-auto bg-white dark:bg-gray-900">
    <header>
        <a href="http://localhost:8000/">
            Martify Online Shopping
        </a>
    </header>

    <main class="mt-8">
        <img class="object-cover w-full h-56 rounded-lg md:h-72"
            src="{{ $message->embed('storage/' . $post->cover_image) }}" alt="" width="100">

        <h2 class="mt-6 text-gray-700 dark:text-gray-200">Hi {{ $user->full_name }},</h2>

        <p class="mt-2 leading-loose text-gray-600 dark:text-gray-300">
            We're glad to have you onboard! You're already on your way to
            creating beautiful visual products.
            Whether you're here for your brand, for a cause, or just for fun —
            welcome! If there's anything you need, we'll be here every step of the way.
        </p>

        <p class="mt-2 text-gray-600 dark:text-gray-300">
            Thanks, <br>
            Martify Online Team
        </p>

        <a href="http://localhost:8000/dashboard/posts"
            class="px-6 py-2 mt-8 text-md font-medium tracking-wider text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-700 focus:ring-opacity-80">
            Check your dahsboard
        </a>
    </main>


    <footer class="mt-8">
        <p class="text-gray-500 dark:text-gray-400">
            This email was sent by <a href="#" class="text-blue-600 hover:underline dark:text-blue-400"
                target="_blank">no-reply@martify.com</a>.
            If you'd rather not receive this kind of email, you can <a href="#"
                class="text-blue-600 hover:underline dark:text-blue-400">unsubscribe</a> or <a href="#"
                class="text-blue-600 hover:underline dark:text-blue-400">manage your email preferences</a>.
        </p>

        <p class="mt-3 text-gray-500 dark:text-gray-400">Copyright © {{ new Date() . getFullYear() }} Martify Online
            Shopping 2024. All Rights
            Reserved.</p>
    </footer>
</section>
