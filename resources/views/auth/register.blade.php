<x-form>
    <main id="content" class="w-full max-w-xl mx-auto p-6">

        <div class="bg-white border border-gray-200 rounded-xl shadow-md ">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 ">Hello and Welcome</h1>
                    <p class="mt-2 text-mc text-gray-600 ">
                        Already have an account?
                        <a class="text-blue-600 decoration-0.5 hover:underline focus:outline-none focus:underline font-medium "
                            href="{{ route('login') }}">
                            Sign in here
                        </a>
                    </p>
                </div>

                <div class="mt-5">
                    <a href="{{ route('google.redirect') }}"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none ">
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
                        Sign up with Google
                    </a>

                    <div
                        class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-gray-200 before:me-6 after:flex-1 after:border-t after:border-gray-200 after:ms-6 ">
                        Or</div>

                    <!-- Form -->
                    <form action="{{ route('user.register') }}" method="post" x-data="formSubmit"
                        @submit.prevent="submit">
                        @csrf

                        <div class="grid gap-y-4">
                            <!-- Form Group -->
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block text-md mb-2 ">First name</label>
                                    <div class="relative">
                                        <input type="text" id="first_name" name="first_name"
                                            value="{{ old('first_name') }}"
                                            class="w-full py-3 px-4 inline-flex justify-center items-center  text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none @error('first_name')
                                            ring-red-600 shadow-red-600
                                        @enderror"
                                            autocomplete="name" required>
                                        @error('first_name')
                                            <div class="absolute inset-y-0 end-0 pointer-events-none pe-3">
                                                <svg class="size-5 text-red-500" width="16" height="16"
                                                    fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                </svg>
                                            </div>
                                        @enderror
                                    </div>
                                    @error('first_name')
                                        <p class="text-xs text-red-600 mt-2" id="email-error"> {{ $message }} </p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="last_name" class="block text-md mb-2 ">Last name</label>
                                    <div class="relative">
                                        <input type="text" id="last_name" name="last_name"
                                            value="{{ old('last_name') }}"
                                            class="w-full py-3 px-4 inline-flex justify-center items-center text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none @error('last_name')
                                            ring-red-600 shadow-red-600
                                        @enderror"
                                            autocomplete="name" required>
                                        @error('last_name')
                                            <div class="absolute inset-y-0 pointer-events-none">
                                                <svg class="size-5 text-red-500" width="16" height="16"
                                                    fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                </svg>
                                            </div>
                                        @enderror
                                    </div>
                                    @error('last_name')
                                        <p class="text-xs text-red-600 mt-2" id="email-error"> {{ $message }} </p>
                                    @enderror
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="email" class="block text-md mb-2 ">Email address</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none @error('email')
                                            ring-red-600 shadow-red-600
                                        @enderror"
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
                                    <p class="text-xs text-red-600 mt-2" id="email-error"> {{ $message }} </p>
                                @enderror
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="password" class="block text-md mb-2 ">Password</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password"
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none @error('password')
                                            ring-red-600 shadow-red-600
                                        @enderror">
                                    <button type="button"
                                        data-hs-toggle-password='{
                                            "target": ["#password", "#password_confirmation"]
                                          }'
                                        class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600">
                                        <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
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
                                    <div id="hs-strong-password-api"
                                        class="hidden absolute z-10 w-full bg-white shadow-md rounded-lg p-4">
                                        <div id="hs-strong-password-api-in-popover"
                                            data-hs-strong-password='{
                                                "target": "#password",
                                                "hints": "#hs-strong-password-api",
                                                "stripClasses": "hs-strong-password:opacity-100 hs-strong-password-accepted:bg-teal-500 h-2 flex-auto rounded-full bg-blue-500 opacity-50 mx-1",
                                                "mode": "popover",
                                                "checksExclude": ["lowercase", "min-length"],
                                                "specialCharactersSet": "&!@&_-()="
                                            }'
                                            class="flex mt-2 -mx-1">
                                        </div>

                                        <h4 class="mt-3 text-md font-semibold text-gray-800">
                                            To have a strong password, it should contain:
                                        </h4>

                                        <ul class="space-y-1 text-md text-gray-500">
                                            <li data-hs-strong-password-hints-rule-text="uppercase"
                                                class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                                <span class="hidden" data-check="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </span>
                                                <span data-uncheck="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </span>
                                                Should contain uppercase.
                                            </li>
                                            <li data-hs-strong-password-hints-rule-text="numbers"
                                                class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                                <span class="hidden" data-check="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </span>
                                                <span data-uncheck="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </span>
                                                Should contain numbers.
                                            </li>
                                            <li data-hs-strong-password-hints-rule-text="special-characters"
                                                class="hs-strong-password-active:text-teal-500 flex items-center gap-x-2">
                                                <span class="hidden" data-check="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </span>
                                                <span data-uncheck="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </span>
                                                Should contain special characters (available chars: &!@).
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div>
                                <label for="password_confirmation" class="block text-md mb-2 ">Confirm
                                    Password</label>
                                <div class="relative">
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none @error('password')
                                            ring-red-600 shadow-red-600
                                        @enderror"
                                        required="">
                                    <button type="button"
                                        data-hs-toggle-password='{
                                            "target": ["#password", "#password_confirmation"]
                                          }'
                                        class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600">
                                        <svg class="shrink-0 size-3.5" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <div>
                                @if ($errors->any())
                                    <div id="error-alert"
                                        class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border-s-4 border-red-500 p-4"
                                        role="alert" tabindex="-1" aria-labelledby="hs-bordered-red-style-label">
                                        <div class="flex">
                                            <div class="shrink-0">
                                                <!-- Icon -->
                                                <span
                                                    class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </span>
                                                <!-- End Icon -->
                                            </div>
                                            <div class="ms-3 flex-1">
                                                <h3 id="hs-bordered-red-style-label"
                                                    class="text-gray-800 font-semibold">
                                                    Error!
                                                </h3>
                                                <p class="text-md text-gray-700">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </p>
                                            </div>
                                            <div class="ps-3">
                                                <button type="button"
                                                    class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:bg-red-100"
                                                    data-hs-remove-element="#error-alert">
                                                    <span class="sr-only">Dismiss</span>
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6 6 18"></path>
                                                        <path d="m6 6 12 12"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Checkbox -->
                            <div class="flex items-center">
                                <div class="flex">
                                    <input type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                        id="checkbox">
                                </div>
                                <div class="ms-3">
                                    <label for="checkbox" class="text-md ">I accept the <a
                                            class="text-blue-600 decoration-0.5 hover:underline focus:outline-none focus:underline font-medium "
                                            href="https://preline.co/examples/html/signup.html#">Terms and
                                            Conditions</a></label>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <!-- Checkbox -->
                            <div class="flex items-center">
                                <div class="flex">
                                    <input type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                        id="subscribe" name="subscribe">
                                </div>
                                <div class="ms-3">
                                    <label for="subscribe" class="text-md ">I wish to subscribe the to
                                        newsletter</label>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <button type="submit" x-ref="btn"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Sign
                                up</button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </div>
    </main>
</x-form>
