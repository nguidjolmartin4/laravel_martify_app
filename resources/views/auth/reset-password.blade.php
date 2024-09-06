<x-form>
    <main id="content" class="w-full max-w-xl mx-auto p-6">

        <div class="bg-white border border-gray-200 rounded-xl shadow-md ">
            <div class="p-4 sm:p-7">
                <div class="text-center">
                    <h1 class="block text-2xl font-bold text-gray-800 ">Reset your password</h1>
                </div>

                <div class="mt-5">
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="grid gap-y-4">
                            <div>
                                <label for="email" class="block text-md mb-2 ">Email address</label>
                                <div class="relative">
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-md hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none @error('email')
                                            ring-red-600 shadow-red-600
                                        @enderror"
                                        required="" autocomplete="email">
                                    @error('email')
                                        <div class="absolute inset-y-0 end-0 mt-3 ml-3 pointer-events-none">
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
                                    <div id="hs-strong-password-api"
                                        class="hidden absolute z-10 w-full bg-white shadow-md rounded-lg p-4">
                                        <div id="hs-strong-password-api-in-popover"
                                            data-hs-strong-password='{
              "target": "#password",
              "hints": "#hs-strong-password-api",
              "stripClasses": "hs-strong-password:opacity-100 hs-strong-password-accepted:bg-teal-500 h-2 flex-auto rounded-full bg-blue-500 opacity-50 mx-1",
              "mode": "popover",
              "checksExclude": ["lowercase", "min-length"],
              "specialCharactersSet": "&!@"
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
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polyline points="20 6 9 17 4 12"></polyline>
                                                    </svg>
                                                </span>
                                                <span data-uncheck="">
                                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
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
                                    @error('password')
                                        <p class="text-xs text-red-600 mt-2" id="email-error"> {{ $message }} </p>
                                    @enderror
                                </div>

                            </div>

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

                            <button type="submit"
                                class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">Reset
                                Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</x-form>
