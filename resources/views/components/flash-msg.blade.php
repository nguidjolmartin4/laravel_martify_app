@props(['title', 'msg'])

<div id="dismiss-alert"
    class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border-y-2 border-teal-500 p-4"
    role="alert" tabindex="-1" aria-labelledby="hs-bordered-success-style-label">
    <div class="flex">
        <div class="shrink-0">
            <span
                class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z">
                    </path>
                    <path d="m9 12 2 2 4-4"></path>
                </svg>
            </span>
        </div>
        <div class="ms-3 flex-1">
            <h3 id="hs-bordered-success-style-label" class="text-gray-800 font-semibold">
                Success !
            </h3>
            <p class="text-md text-gray-700">
                {{ $msg }}
            </p>
        </div>
        <div class="ps-3">
            <button type="button"
                class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:bg-teal-100"
                data-hs-remove-element="#dismiss-alert">
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
