<x-form>
    <main id="content" class="w-full max-w-xl mx-auto p-6">
        <div class="bg-white border border-gray-200 rounded-xl shadow-md">
            <div class="p-4 sm:p-7">
                {{-- Session Messages --}}
                @if (session('status'))
                    <div class="absolute top-0 left-0 mt-4 ml-4">
                        <div class="space-y-5">
                            <div class="bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4 dark:bg-teal-800/30"
                                role="alert" tabindex="-1" aria-labelledby="hs-bordered-success-style-label">
                                <div class="flex">
                                    <div class="shrink-0">
                                        <span
                                            class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-400">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path
                                                    d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z">
                                                </path>
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="ms-3">
                                        <h3 id="hs-bordered-success-style-label"
                                            class="text-gray-800 font-semibold dark:text-white">
                                            Success.
                                        </h3>
                                        <p class="text-sm text-gray-700 dark:text-neutral-400">
                                            {{ session('status') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800">Request a password reset email</h1>
                    <p class="mt-2 text-md text-gray-600 ">
                        Remember your password?
                        <a class="text-blue-600 decoration-2 focus:outline-none font-medium"
                            href="{{ route('login') }}">
                            Sign in here
                        </a>
                    </p>
                </div>

                <div class="mt-5">
                    <form action="{{ route('password.request') }}" method="post" x-data="formSubmit"
                        @submit.prevent="submit">
                        @csrf
                        <div class="grid gap-y-4">
                            <div>
                                <label for="email" class="block text-md mb-2 ">Email address</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email"
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none "
                                        required="" autocomplete="email">
                                </div>
                            </div>

                            <button type="submit" x-ref="btn"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Reset
                                password
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
</x-form>
