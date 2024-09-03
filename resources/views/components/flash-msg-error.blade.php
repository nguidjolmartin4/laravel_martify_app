@props(['title', 'msg', 'errors'])

<div id="error-alert"
    class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border-s-4 border-red-500 p-4"
    role="alert" tabindex="-1" aria-labelledby="hs-bordered-red-style-label">
    <div class="flex">
        <div class="shrink-0">
            <!-- Icon -->
            <span
                class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </span>
            <!-- End Icon -->
        </div>
        <div class="ms-3 flex-1">
            <h3 id="hs-bordered-red-style-label" class="text-gray-800 font-semibold">
                Error !
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
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M18 6 6 18"></path>
                    <path d="m6 6 12 12"></path>
                </svg>
            </button>
        </div>
    </div>
</div>
