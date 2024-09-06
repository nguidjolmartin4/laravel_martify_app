<x-dashboard :email="$user->email" :image="$user->profile_picture">
    <div class="max-w-4xl px-4 py-4 sm:px-6">
        <div class="bg-white rounded-xl shadow p-4 sm:p-7">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="update_type" value="user_info">

                <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-0 first:pt-0 last:pb-0">
                    {{-- Alert messages --}}
                    <div class="sm:col-span-12">
                        @if (session('status'))
                            <div id="dismiss-alert"
                                class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border-t-2 border-teal-500 rounded-lg p-4"
                                role="alert" tabindex="-1" aria-labelledby="hs-bordered-success-style-label">
                                <div class="flex">
                                    <div class="shrink-0">
                                        <span
                                            class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800">
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
                                    <div class="ms-3 flex-1">
                                        <h3 id="hs-bordered-success-style-label" class="text-gray-800 font-semibold">
                                            Successfully updated.
                                        </h3>
                                        <p class="text-md text-gray-700">
                                            {{ session('status') }}
                                        </p>
                                    </div>
                                    <div class="ps-3">
                                        <button type="button"
                                            class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100"
                                            data-hs-remove-element="#dismiss-alert">
                                            <span class="sr-only">Dismiss</span>
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
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
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </span>
                                        <!-- End Icon -->
                                    </div>
                                    <div class="ms-3 flex-1">
                                        <h3 id="hs-bordered-red-style-label" class="text-gray-800 font-semibold">
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
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800">
                            User informations
                        </h2>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="fullname" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Full name
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <input id="fullname" type="text" name="first_name" autocomplete="family-name" required
                                value="{{ $user->first_name }}"
                                class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-md -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-md relative focus:z-10 focus:border-blue-500 focus:ring-blue-500">
                            <input type="text" name="last_name" autocomplete="given-name" required
                                value="{{ $user->last_name }}"
                                class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-md -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-md relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 ">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="email" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Email
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input id="email" type="email" name="email" autocomplete="email"
                            value="{{ $user->email }}"
                            class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-md text-md rounded-lg focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="country" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                                Country
                            </label>
                        </div>
                    </div>

                    <div class="sm:col-span-9">
                        <!-- Select -->
                        <select id="country" name="country"
                            data-hs-select='{
        "hasSearch": true,
        "searchPlaceholder": "Search your country...",
        "searchClasses": "block w-full text-md border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] py-3 px-3",
        "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0",
        "placeholder": "Select country...",
        "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 \" data-title></span></button>",
        "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-md focus:outline-none focus:ring-2 focus:ring-blue-500",
        "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300",
        "optionClasses": "py-3 px-4 w-full text-md text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100",
        "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 \" data-title></div></div></div>",
        "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
    }'
                            class="hidden" autocomplete="off">
                            <option value="">Select country...</option>
                            <option value="Cameroon" {{ $user->country === 'Cameroon' ? 'selected' : '' }}>
                                Cameroon
                            </option>
                            <option value="Central African Republic"
                                {{ $user->country === 'Central African Republic' ? 'selected' : '' }}>
                                Central African Republic
                            </option>
                            <option value="Chad" {{ $user->country === 'Chad' ? 'selected' : '' }}>
                                Chad
                            </option>
                            <option value="Equatorial Guinea"
                                {{ $user->country === 'Equatorial Guinea' ? 'selected' : '' }}>
                                Equatorial Guinea
                            </option>
                            <option value="Gabon" {{ $user->country === 'Gabon' ? 'selected' : '' }}>
                                Gabon
                            </option>
                            <option value="Republic of the Congo"
                                {{ $user->country === 'Republic of the Congo' ? 'selected' : '' }}>
                                Republic of the Congo
                            </option>
                        </select>


                        <div class="sm:flex mt-2">
                            <input id="region" type="text" name="region" value="{{ $user->region }}"
                                class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-md -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-md relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 "
                                autocomplete="off" placeholder="Region">
                            <input id="city" type="text" name="city" value="{{ $user->city }}"
                                class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-md -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-md relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 "
                                autocomplete="off" placeholder="City">
                            <input id="address" type="text" name="address" value="{{ $user->address }}"
                                class="py-3 px-3 pe-11 block w-full border-gray-200 shadow-md -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-md relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 "
                                autocomplete="off" placeholder="Addresse">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <div class="inline-block">
                            <label for="telephone" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                                Telephone
                            </label>
                        </div>
                    </div>

                    <div class="sm:col-span-9">
                        <input id="telephone" type="text" name="telephone" autocomplete="tel"
                            value="{{ $user->telephone }}"
                            class="py-3 px-3 pe-11 block w-full border-gray-900 shadow-md rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 ">
                    </div>

                    <div class="sm:col-span-3">
                        <label for="profile-photo" class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Profile picture
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <label for="profile-photo" class="sr-only">Choose file</label>
                        <input type="file" name="profile_picture" id="profile-photo"
                            class="block w-full border border-gray-200 shadow-md rounded-lg text-md focus:z-10 focus:border-blue-500 focus:ring-blue-500 file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
                    </div>

                    <div class="sm:col-span-3">
                        <p class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Current Profile Picture
                        </p>
                    </div>

                    <div class="sm:col-span-9 ">
                        @if (Illuminate\Support\Facades\Auth::user()->profile_picture)
                            <img src="{{ asset('storage/' . Illuminate\Support\Facades\Auth::user()->profile_picture) }}"
                                alt="Profile Picture" class="w-60 object-cover mx-auto rounded-md">
                        @else
                            <img src="{{ asset('images/default-profile.png') }}" alt="Default Profile Picture"
                                class="size-40 object-cover">
                        @endif
                    </div>

                    <div class="sm:col-span-3 my-6">
                        <button type="reset"
                            class="w-full text-center py-3 px-4 justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-md hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                            Cancel
                        </button>
                    </div>

                    <div class="sm:col-span-9 my-6">
                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 ">
                            Update user info
                        </button>
                    </div>
                </div>
            </form>
            <!-- End Section -->

            <!-- Section -->
            <form action="{{ route('profile.update') }}" method="post" id="user_password">
                @csrf
                @method('PUT')
                <input type="hidden" name="update_type" value="user_password">

                <div
                    class="grid sm:grid-cols-12 gap-2 sm:gap-4 py-8 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200">
                    <div class="sm:col-span-12">
                        <h2 class="text-lg font-semibold text-gray-800">
                            User password
                        </h2>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="hs-toggle-password-with-checkbox"
                            class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Current password
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <input id="hs-toggle-password-with-checkbox" type="password" name="current_password"
                            class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Enter new the current password">

                        <div class="flex mt-4">
                            <input
                                data-hs-toggle-password='{
          "target": "#hs-toggle-password-with-checkbox"
        }'
                                id="hs-toggle-password-checkbox" type="checkbox"
                                class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500">
                            <label for="hs-toggle-password-checkbox" class="text-md text-gray-500 ms-3">Show
                                password</label>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="hs-toggle-password-multi-toggle-np"
                            class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            New password
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <div class="relative">
                            <input id="hs-toggle-password-multi-toggle-np" type="password" name="new_password"
                                class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Enter new password">
                            <button type="button"
                                data-hs-toggle-password='{"target": ["#hs-toggle-password-multi-toggle", "#hs-toggle-password-multi-toggle-np"]}'
                                class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 ">
                                <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
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
                                        r="3">
                                    </circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="hs-toggle-password-multi-toggle-np"
                            class="inline-block text-md font-medium text-gray-500 mt-2.5">
                            Confirm new password
                        </label>
                    </div>

                    <div class="sm:col-span-9">
                        <div class="relative">
                            <input id="hs-toggle-password-multi-toggle" type="password"
                                name="new_password_confirmation"
                                class="py-3 ps-4 pe-10 block w-full border-gray-200 rounded-lg text-md focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none "
                                placeholder="Confirm new password">
                            <button type="button"
                                data-hs-toggle-password='{
                            "target": ["#hs-toggle-password-multi-toggle", "#hs-toggle-password-multi-toggle-np"]
                          }'
                                class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                                <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
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
                                        r="3">
                                    </circle>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="sm:col-span-3 my-6">
                        <button type="reset"
                            class="w-full text-center py-3 px-4 justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-gray-200 bg-white text-red-500 shadow-md hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                            Cancel
                        </button>
                    </div>

                    <div class="sm:col-span-9 my-6">
                        <button type="submit"
                            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 ">
                            Update password
                        </button>
                    </div>
            </form>
        </div>
    </div>

</x-dashboard>
