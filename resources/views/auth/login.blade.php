<x-form>
    <main id="content" class="w-full max-w-xl mx-auto p-6">

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-3xl font-bold text-gray-800">Welcome back</h1>
                    <p class="mt-2 text-md font-medium text-gray-600 ">
                        No account yet?
                        <a class="text-blue-600 decoration-0.5 hover:underline focus:outline-none"
                            href="{{ route('register') }}">
                            Sign up here
                        </a>
                    </p>
                </div>

                <div class="mt-5">
                    <button type="button" disabled
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none ">
                        <svg class="w-4 h-auto" width="46" height="47" viewBox="0 0 46 47" fill="none">
                            <path
                                d="M46 24.0287C46 22.09 45.8533 20.68 45.5013 19.2112H23.4694V27.9356H36.4069C36.1429 30.1094 34.7347 33.37 31.5957 35.5731L31.5663 35.8669L38.5191 41.2719L38.9885 41.3306C43.4477 37.2181 46 31.1669 46 24.0287Z"
                                fill="#4285F4"></path>
                            <path
                                d="M23.4694 47C29.8061 47 35.1161 44.9144 39.0179 41.3012L31.625 35.5437C29.6301 36.9244 26.9898 37.8937 23.4987 37.8937C17.2793 37.8937 12.0281 33.7812 10.1505 28.1412L9.88649 28.1706L2.61097 33.7812L2.52296 34.0456C6.36608 41.7125 14.287 47 23.4694 47Z"
                                fill="#34A853"></path>
                            <path
                                d="M10.1212 28.1413C9.62245 26.6725 9.32908 25.1156 9.32908 23.5C9.32908 21.8844 9.62245 20.3275 10.0918 18.8588V18.5356L2.75765 12.8369L2.52296 12.9544C0.909439 16.1269 0 19.7106 0 23.5C0 27.2894 0.909439 30.8731 2.49362 34.0456L10.1212 28.1413Z"
                                fill="#FBBC05"></path>
                            <path
                                d="M23.4694 9.07688C27.8699 9.07688 30.8622 10.9863 32.5344 12.5725L39.1645 6.11C35.0867 2.32063 29.8061 0 23.4694 0C14.287 0 6.36607 5.2875 2.49362 12.9544L10.0918 18.8588C11.9987 13.1894 17.25 9.07688 23.4694 9.07688Z"
                                fill="#EB4335"></path>
                        </svg>
                        Login with Google
                    </button>

                    <div
                        class="py-3 flex items-center text-md text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 ">
                        Or</div>

                    <!-- Form -->
                    <form action="{{ route('user.login') }}" method="post">
                        @csrf
                        <input type="hidden" name="login_type" value="user">
                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div>
                                <label for="email" class="block mb-2 text-md font-medium">Email address</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none @error('email')
                                            ring-red-600 shadow-red-600
                                        @enderror "
                                        required="" autocomplete="email">
                                    @error('email')
                                        <div class="absolute inset-y-0 end-0 mt-3 mr-3 pointer-events-none">
                                            <svg class="size-5 text-red-500" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                                @error('email')
                                    <p class="text-md text-red-600 mt-2" id="email-error"> {{ $message }} </p>
                                @enderror
                            </div>
                            <!-- Form Group -->
                            <div>
                                <div class="flex justify-between items-center">
                                    <label for="password" class="block mb-2 text-md font-medium">Password</label>
                                    <a class="inline-flex items-center text-md font-medium text-blue-600 decoration-0.5 hover:underline focus:outline-none focus:underline"
                                        href="{{ route('password.request') }}">Forgot password?</a>
                                </div>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none @error('password')
                                            ring-red-600 shadow-red-600
                                        @enderror"
                                        required="" autocomplete="current-password">
                                    <button type="button"
                                        data-hs-toggle-password='{
                                            "target": "#password"
                                          }'
                                        class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 ">
                                        <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                            </path>
                                            <path class="hs-password-active:hidden"
                                                d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                            </path>
                                            <line class="hs-password-active:hidden" x1="2" x2="22"
                                                y1="2" y2="22"></line>
                                            <path class="hidden hs-password-active:block"
                                                d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                            <circle class="hidden hs-password-active:block" cx="12"
                                                cy="12" r="3"></circle>
                                        </svg>
                                    </button>
                                    @error('password')
                                        <p class="text-md text-red-600 mt-2" id="email-error"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="flex items-center space-x-2 ml-2">
                                <input type="checkbox"
                                    class="border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    id="remember" name="remember">
                                <label for="remember" class="text-md font-medium">Remember me</label>
                            </div>

                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Login</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </main>

    @if (session('status'))
        {{-- Here you place the flash message after reseting the password - green alert messasge --}}
        <div class="absolute top-0 left-0 mt-4 ml-4">
            <div class="bg-green-50 border-s-4 border-green-500 p-4" role="alert" tabindex="-1"
                aria-labelledby="hs-bordered-red-style-label">
                <div class="flex">
                    <div class="shrink-0">
                        <!-- Icon -->
                        <span
                            class="inline-flex justify-center items-center size-8 rounded-full border-4 border-green-100 bg-green-200 text-green-800">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </span>
                        <!-- End Icon -->
                    </div>
                    <div class="ms-3">
                        <h3 id="hs-bordered-red-style-label" class="text-gray-800 font-medium">
                            Succes!
                        </h3>
                        <p class="text-md text-gray-700">
                            Your password has been reset successfully.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @error('passkey')
        <div class="absolute top-0 left-5 mt-4 ml-4">
            <div class="bg-red-50 border-s-4 border-red-500 p-4" role="alert" tabindex="-1"
                aria-labelledby="hs-bordered-red-style-label">
                <div class="flex">
                    <div class="shrink-0">
                        <!-- Icon -->
                        <span
                            class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M18 6 6 18"></path>
                                <path d="m6 6 12 12"></path>
                            </svg>
                        </span>
                        <!-- End Icon -->
                    </div>
                    <div class="ms-3">
                        <h3 id="hs-bordered-red-style-label" class="text-gray-800 font-medium">
                            Error!
                        </h3>
                        <p class="text-md text-gray-700">
                            The provided admin passkey is incorrect.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @enderror

    <button type="button"
        class="absolute bottom-0 right-0 mb-4 mr-4.5 py-2 px-3 inline-flex items-center gap-x-4 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
        aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-focus-management-modal"
        data-hs-overlay="#hs-focus-management-modal">
        Admin
    </button>

    <div id="hs-focus-management-modal"
        class="hs-overlay hidden size-full fixed top-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
        role="dialog" tabindex="-1" aria-labelledby="hs-focus-management-modal-label">
        <div
            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
            <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                <div class="flex justify-between items-center py-3 px-4 border-b">
                    <h3 id="hs-focus-management-modal-label" class="font-bold text-gray-800">
                        Admin Dashboard Access
                    </h3>
                    <button type="button"
                        class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                        aria-label="Close" data-hs-overlay="#hs-focus-management-modal">
                        <span class="sr-only">Close</span>
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <form action="{{ route('user.login') }}" method="post">
                    @csrf
                    <input type="hidden" name="login_type" value="admin">

                    <div class="p-4 overflow-y-auto">
                        <!-- Form Group -->
                        <div>
                            <div class="flex justify-between items-center">
                                <label for="passkey" class="block text-md mb-2 ">Enter admin password</label>
                                <a class="inline-flex items-center text-md text-blue-600 decoration-0.5 hover:underline focus:outline-none focus:underline font-medium "
                                    href="{{ route('password.request') }}">Forgot password?</a>
                            </div>
                            <div class="relative">
                                <input type="password" id="passkey" name="passkey"
                                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                                    required="" autocomplete="current-password">
                                <button type="button"
                                    data-hs-toggle-password='{
                                        "target": "#passkey"
                                      }'
                                    class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 ">
                                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                        </path>
                                        <path class="hs-password-active:hidden"
                                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                                        </path>
                                        <line class="hs-password-active:hidden" x1="2" x2="22"
                                            y1="2" y2="22"></line>
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12"
                                            r="3"></circle>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                        <button type="button"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none"
                            data-hs-overlay="#hs-focus-management-modal">
                            Cancel
                        </button>
                        <button type="submit"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-form>
