<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title> Dashboard </title>
    @vite(['resources/css/main.min.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 ">
    <header
        class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-md py-2.5 lg:ps-[260px]">
        <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
            <div class="me-5 lg:me-0 lg:hidden">
                <a class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                    href="{{ route('home') }}" aria-label="Martify">
                    Martify
                </a>
            </div>

            <div class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3">
                <div class="hidden md:block"></div>

                {{-- Profile Dropdown --}}
                <div class="flex flex-row items-center justify-end gap-1">
                    <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                        <button id="hs-dropdown-account" type="button"
                            class="size-[38px] inline-flex justify-center items-center gap-x-2 text-md font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
                            aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <img class="shrink-0 size-[38px] rounded-full" src="{{ asset('storage/' . $image) }}"
                                alt="Avatar" />
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-sm rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                            <div class="py-3 px-5 bg-gray-100 rounded-t-lg ">
                                <p class="text-md text-gray-500 ">
                                    Signed in as
                                </p>
                                <p class="text-md font-medium text-gray-800 ">
                                    {{ $email }}
                                </p>
                            </div>
                            <div class="p-1.5 space-y-0.5">
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-md text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 "
                                    href="{{ route('home') }}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4 8.50001V17C4 18.8856 4 19.8284 4.58579 20.4142C5.17157 21 6.11438 21 8 21H16C17.8856 21 18.8284 21 19.4142 20.4142C20 19.8284 20 18.8856 20 17V8.5"
                                            stroke="black" stroke-width="null" class="my-path"></path>
                                        <path
                                            d="M2 9.7501L9.76211 4.51068C10.8461 3.77895 11.3882 3.41309 12 3.41309C12.6118 3.41309 13.1539 3.77895 14.2379 4.51068L22 9.7501"
                                            stroke="black" stroke-width="null" stroke-linecap="round" class="my-path">
                                        </path>
                                        <path d="M12 13.125L12 16.5" stroke="black" stroke-width="null"
                                            stroke-linecap="round" class="my-path"></path>
                                    </svg>
                                    Back to home page
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-md text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 "
                                    href="{{ route('product.create') }}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3 6.5C3 4.567 4.567 3 6.5 3C8.433 3 10 4.567 10 6.5C10 8.433 8.433 10 6.5 10C4.567 10 3 8.433 3 6.5Z"
                                            stroke="black" stroke-width="null" class="my-path"></path>
                                        <path
                                            d="M14 6.5C14 5.09554 14 4.39331 14.3371 3.88886C14.483 3.67048 14.6705 3.48298 14.8889 3.33706C15.3933 3 16.0955 3 17.5 3C18.9045 3 19.6067 3 20.1111 3.33706C20.3295 3.48298 20.517 3.67048 20.6629 3.88886C21 4.39331 21 5.09554 21 6.5C21 7.90446 21 8.60669 20.6629 9.11114C20.517 9.32952 20.3295 9.51702 20.1111 9.66294C19.6067 10 18.9045 10 17.5 10C16.0955 10 15.3933 10 14.8889 9.66294C14.6705 9.51702 14.483 9.32952 14.3371 9.11114C14 8.60669 14 7.90446 14 6.5Z"
                                            stroke="black" stroke-width="null" class="my-path"></path>
                                        <path
                                            d="M14 17.5C14 15.567 15.567 14 17.5 14C19.433 14 21 15.567 21 17.5C21 19.433 19.433 21 17.5 21C15.567 21 14 19.433 14 17.5Z"
                                            stroke="black" stroke-width="null" class="my-path"></path>
                                        <path
                                            d="M3 17.5C3 16.0955 3 15.3933 3.33706 14.8889C3.48298 14.6705 3.67048 14.483 3.88886 14.3371C4.39331 14 5.09554 14 6.5 14C7.90446 14 8.60669 14 9.11114 14.3371C9.32952 14.483 9.51702 14.6705 9.66294 14.8889C10 15.3933 10 16.0955 10 17.5C10 18.9045 10 19.6067 9.66294 20.1111C9.51702 20.3295 9.32952 20.517 9.11114 20.6629C8.60669 21 7.90446 21 6.5 21C5.09554 21 4.39331 21 3.88886 20.6629C3.67048 20.517 3.48298 20.3295 3.33706 20.1111C3 19.6067 3 18.9045 3 17.5Z"
                                            stroke="black" stroke-width="null" class="my-path"></path>
                                    </svg>
                                    Add a product
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-md text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 "
                                    href="{{ route('post.create') }}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.5 18.5L7.11634 16.3302C7.5466 16.072 7.76173 15.943 7.98774 15.8719C8.32836 15.7648 8.69144 15.7509 9.03927 15.8315C9.27007 15.885 9.49447 15.9972 9.94326 16.2216C10.4255 16.4627 10.6666 16.5833 10.9134 16.6366C11.2853 16.7168 11.6725 16.6893 12.0293 16.5572C12.2661 16.4696 12.4877 16.3162 12.931 16.0093L16.0527 13.8481C17.002 13.1909 17.4767 12.8623 18.023 12.8235C18.5693 12.7847 19.0857 13.0428 20.1184 13.5592L21 14M21 14V9M21 14C21 16.8089 21 18.2134 20.3259 19.2223C20.034 19.659 19.659 20.034 19.2223 20.3259C18.2134 21 16.8089 21 14 21H11C7.22876 21 5.34315 21 4.17157 19.8284C3 18.6569 3 16.7712 3 13V11C3 7.22876 3 5.34315 4.17157 4.17157C5.34315 3 7.22876 3 11 3H15"
                                            stroke="black" stroke-width="null" stroke-linecap="round" class="my-path">
                                        </path>
                                        <path
                                            d="M11 9C11 10.1046 10.1046 11 9 11C7.89543 11 7 10.1046 7 9C7 7.89543 7.89543 7 9 7C10.1046 7 11 7.89543 11 9Z"
                                            stroke="black" stroke-width="null" class="my-path"></path>
                                        <path d="M19 3L19 7" stroke="black" stroke-width="null" stroke-linecap="round"
                                            class="my-path"></path>
                                        <path d="M21 5H17" stroke="black" stroke-width="null" stroke-linecap="round"
                                            class="my-path"></path>
                                    </svg>
                                    Add a blog post
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-md text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 "
                                    href="#">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.5 3H10.5C7.21252 3 5.56878 3 4.46243 3.90796C4.25989 4.07418 4.07418 4.25989 3.90796 4.46243C3 5.56878 3 7.21252 3 10.5V14.6667C3 16.5076 4.49238 18 6.33333 18H6.5C7.32843 18 8 18.6716 8 19.5C8 20.118 8.70557 20.4708 9.2 20.1L11 18.75C11.4623 18.4033 11.6934 18.23 11.9584 18.1296C12.0086 18.1106 12.0595 18.0936 12.111 18.0787C12.3833 18 12.6722 18 13.25 18H13.5C16.7875 18 18.4312 18 19.5376 17.092C19.7401 16.9258 19.9258 16.7401 20.092 16.5376C21 15.4312 21 13.7875 21 10.5C21 7.21252 21 5.56878 20.092 4.46243C19.9258 4.25989 19.7401 4.07418 19.5376 3.90796C18.4312 3 16.7875 3 13.5 3Z"
                                            stroke="black" stroke-width="null" class="my-path"></path>
                                        <path d="M7 8H17" stroke="black" stroke-width="null" stroke-linecap="round"
                                            class="my-path"></path>
                                        <path d="M7 12H12" stroke="black" stroke-width="null" stroke-linecap="round"
                                            class="my-path"></path>
                                    </svg>
                                    View messages
                                </a>
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-md text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 "
                                    href="#">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z"
                                            stroke="black" stroke-width="null" class="my-path"></path>
                                        <path
                                            d="M20 21V20.1429C20 19.0805 20 18.5493 19.8997 18.1099C19.5578 16.6119 18.3881 15.4422 16.8901 15.1003C16.4507 15 15.9195 15 14.8571 15H10C8.13623 15 7.20435 15 6.46927 15.3045C5.48915 15.7105 4.71046 16.4892 4.30448 17.4693C4 18.2044 4 19.1362 4 21"
                                            stroke="black" stroke-width="null" stroke-linecap="round"
                                            class="my-path">
                                        </path>
                                    </svg>
                                    Your profile
                                </a>

                                {{-- Sign-out form --}}
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button type="submit"
                                        class="flex w-full items-center gap-x-3.5 py-2 px-3 rounded-lg text-md text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 ">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M15 10C15 11.6569 13.6569 13 12 13C10.3431 13 9 11.6569 9 10C9 8.34315 10.3431 7 12 7C13.6569 7 15 8.34315 15 10Z"
                                                stroke="black" stroke-width="null" class="my-path"></path>
                                            <path
                                                d="M6 20.8863C6 18.1249 8.68781 16 12.0015 16C15.3152 16 18 18.1249 18 20.8863"
                                                stroke="black" stroke-width="null" class="my-path"></path>
                                            <path
                                                d="M3 11C3 7.22876 3 5.34315 4.17157 4.17157C5.34315 3 7.22876 3 11 3H13C16.7712 3 18.6569 3 19.8284 4.17157C21 5.34315 21 7.22876 21 11V13C21 16.7712 21 18.6569 19.8284 19.8284C18.6569 21 16.7712 21 13 21H11C7.22876 21 5.34315 21 4.17157 19.8284C3 18.6569 3 16.7712 3 13V11Z"
                                                stroke="black" stroke-width="null" class="my-path"></path>
                                        </svg>
                                        Sign out
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    {{-- Sidebar Toggle --}}
    <div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 lg:hidden ">
        <div class="flex items-center py-2">
            <button type="button"
                class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none "
                aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar"
                aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
                <span class="sr-only">Toggle Navigation</span>
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round">
                    <rect width="18" height="18" x="3" y="3" rx="2" />
                    <path d="M15 3v18" />
                    <path d="m8 9 3 3-3 3" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Application Sidebar --}}
    <div id="hs-application-sidebar"
        class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform w-[260px] h-full hidden fixed inset-y-0 start-0 z-[60] bg-white border-e border-gray-200 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 "
        role="dialog" tabindex="-1" aria-label="Sidebar">
        <div class="relative flex flex-col h-full max-h-full">
            <div class="px-6 pt-4">
                <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80"
                    href="#" aria-label="Martify">
                    Martify
                </a>
            </div>

            <div
                class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 ">
                <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                    <ul class="flex flex-col space-y-1">
                        <li>
                            <x-nav-link href="{{ route('user.dashboard') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 21C4.05719 21 3.58579 21 3.29289 20.7071C3 20.4142 3 19.9428 3 19L3 5C3 4.05719 3 3.58579 3.29289 3.29289C3.58579 3 4.05719 3 5 3L7 3C7.94281 3 8.41421 3 8.70711 3.29289C9 3.58579 9 4.05719 9 5L9 19C9 19.9428 9 20.4142 8.70711 20.7071C8.41421 21 7.94281 21 7 21H5Z"
                                        stroke="black" stroke-width="null" class="my-path"></path>
                                    <path
                                        d="M11 21C10.0572 21 9.58579 21 9.29289 20.7071C9 20.4142 9 19.9428 9 19L9 5C9 4.05719 9 3.58579 9.29289 3.29289C9.58579 3 10.0572 3 11 3L13 3C13.9428 3 14.4142 3 14.7071 3.29289C15 3.58579 15 4.05719 15 5L15 19C15 19.9428 15 20.4142 14.7071 20.7071C14.4142 21 13.9428 21 13 21H11Z"
                                        stroke="black" stroke-width="null" class="my-path"></path>
                                    <path
                                        d="M17 21C16.0572 21 15.5858 21 15.2929 20.7071C15 20.4142 15 19.9428 15 19L15 5C15 4.05719 15 3.58579 15.2929 3.29289C15.5858 3 16.0572 3 17 3L19 3C19.9428 3 20.4142 3 20.7071 3.29289C21 3.58579 21 4.05719 21 5L21 19C21 19.9428 21 20.4142 20.7071 20.7071C20.4142 21 19.9428 21 19 21H17Z"
                                        stroke="black" stroke-width="null" class="my-path"></path>
                                    <path
                                        d="M4.5 13C4.03406 13 3.80109 13 3.61732 12.9239C3.37229 12.8224 3.17761 12.6277 3.07612 12.3827C3 12.1989 3 11.9659 3 11.5L3 7.5C3 7.03406 3 6.80109 3.07612 6.61732C3.17761 6.37229 3.37229 6.17761 3.61732 6.07612C3.80109 6 4.03406 6 4.5 6C4.96594 6 5.19891 6 5.38268 6.07612C5.62771 6.17761 5.82239 6.37229 5.92388 6.61732C6 6.80109 6 7.03406 6 7.5L6 11.5C6 11.9659 6 12.1989 5.92388 12.3827C5.82239 12.6277 5.62771 12.8224 5.38268 12.9239C5.19891 13 4.96594 13 4.5 13Z"
                                        stroke="black" stroke-width="null" class="my-path"></path>
                                    <path
                                        d="M10.5 13C10.0341 13 9.80109 13 9.61732 12.9239C9.37229 12.8224 9.17761 12.6277 9.07612 12.3827C9 12.1989 9 11.9659 9 11.5L9 7.5C9 7.03406 9 6.80109 9.07612 6.61732C9.17761 6.37229 9.37229 6.17761 9.61732 6.07612C9.80109 6 10.0341 6 10.5 6C10.9659 6 11.1989 6 11.3827 6.07612C11.6277 6.17761 11.8224 6.37229 11.9239 6.61732C12 6.80109 12 7.03406 12 7.5L12 11.5C12 11.9659 12 12.1989 11.9239 12.3827C11.8224 12.6277 11.6277 12.8224 11.3827 12.9239C11.1989 13 10.9659 13 10.5 13Z"
                                        stroke="black" stroke-width="null" class="my-path"></path>
                                    <path
                                        d="M16.5 13C16.0341 13 15.8011 13 15.6173 12.9239C15.3723 12.8224 15.1776 12.6277 15.0761 12.3827C15 12.1989 15 11.9659 15 11.5L15 7.5C15 7.03406 15 6.80109 15.0761 6.61732C15.1776 6.37229 15.3723 6.17761 15.6173 6.07612C15.8011 6 16.0341 6 16.5 6C16.9659 6 17.1989 6 17.3827 6.07612C17.6277 6.17761 17.8224 6.37229 17.9239 6.61732C18 6.80109 18 7.03406 18 7.5L18 11.5C18 11.9659 18 12.1989 17.9239 12.3827C17.8224 12.6277 17.6277 12.8224 17.3827 12.9239C17.1989 13 16.9659 13 16.5 13Z"
                                        stroke="black" stroke-width="null" class="my-path"></path>
                                    <path d="M6.05 18L6 18" stroke="black" stroke-width="null" stroke-linecap="round"
                                        class="my-path"></path>
                                    <path d="M12.05 18L12 18" stroke="black" stroke-width="null"
                                        stroke-linecap="round" class="my-path"></path>
                                    <path d="M18.05 18L18 18" stroke="black" stroke-width="null"
                                        stroke-linecap="round" class="my-path"></path>
                                </svg>
                                Dashboard
                            </x-nav-link>
                        </li>

                        <li>
                            <x-nav-link href="{{ route('user.orders') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                                </svg>
                                Orders history
                            </x-nav-link>
                        </li>

                        <li>
                            <x-nav-link href="{{ route('user.transactions') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15 9.71429C15 8.76751 14.2325 8 13.2857 8H11C9.89543 8 9 8.89543 9 10C9 11.1046 9.89543 12 11 12H13C14.1046 12 15 12.8954 15 14C15 15.1046 14.1046 16 13 16H10.7143C9.76751 16 9 15.2325 9 14.2857M12 6.5V17.5M11 21H13C16.7712 21 18.6569 21 19.8284 19.8284C21 18.6569 21 16.7712 21 13V11C21 7.22876 21 5.34315 19.8284 4.17157C18.6569 3 16.7712 3 13 3H11C7.22876 3 5.34315 3 4.17157 4.17157C3 5.34315 3 7.22876 3 11V13C3 16.7712 3 18.6569 4.17157 19.8284C5.34315 21 7.22876 21 11 21Z"
                                        stroke="black" stroke-width="null" stroke-linecap="round" class="my-path">
                                    </path>
                                </svg>
                                Transactions
                            </x-nav-link>
                        </li>

                        <li>
                            <x-nav-link href="{{ route('user.chat') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.5 3H10.5C7.21252 3 5.56878 3 4.46243 3.90796C4.25989 4.07418 4.07418 4.25989 3.90796 4.46243C3 5.56878 3 7.21252 3 10.5V14.6667C3 16.5076 4.49238 18 6.33333 18H6.5C7.32843 18 8 18.6716 8 19.5C8 20.118 8.70557 20.4708 9.2 20.1L11 18.75C11.4623 18.4033 11.6934 18.23 11.9584 18.1296C12.0086 18.1106 12.0595 18.0936 12.111 18.0787C12.3833 18 12.6722 18 13.25 18H13.5C16.7875 18 18.4312 18 19.5376 17.092C19.7401 16.9258 19.9258 16.7401 20.092 16.5376C21 15.4312 21 13.7875 21 10.5C21 7.21252 21 5.56878 20.092 4.46243C19.9258 4.25989 19.7401 4.07418 19.5376 3.90796C18.4312 3 16.7875 3 13.5 3Z"
                                        stroke="black" stroke-width="null" class="my-path"></path>
                                    <path d="M7 8H17" stroke="black" stroke-width="null" stroke-linecap="round"
                                        class="my-path"></path>
                                    <path d="M7 12H12" stroke="black" stroke-width="null" stroke-linecap="round"
                                        class="my-path"></path>
                                </svg>
                                Chat
                            </x-nav-link>
                        </li>

                        <li>
                            <x-nav-link href="{{ route('user.posts') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 21H14C16.8284 21 18.2426 21 19.1213 20.1213C20 19.2426 20 17.8284 20 15V9.0208C20 8.26895 20 7.89303 19.8694 7.54964C19.7389 7.20625 19.4891 6.92528 18.9896 6.36334L17.1934 4.34254C16.6058 3.68154 16.312 3.35104 15.9212 3.17552C15.5303 3 15.0881 3 14.2037 3H10C7.17157 3 5.75736 3 4.87868 3.87868C4 4.75736 4 6.17157 4 9V15C4 17.8284 4 19.2426 4.87868 20.1213C5.75736 21 7.17157 21 10 21Z"
                                        stroke="black" stroke-width="null" class="my-path"></path>
                                    <path
                                        d="M14.5 3V6C14.5 6.46466 14.5 6.69698 14.5384 6.89018C14.6962 7.68356 15.3164 8.30376 16.1098 8.46157C16.303 8.5 16.5353 8.5 17 8.5H20"
                                        stroke="black" stroke-width="null" class="my-path"></path>
                                    <path d="M7 13H15" stroke="black" stroke-width="null" stroke-linecap="round"
                                        class="my-path"></path>
                                    <path d="M7 16H12" stroke="black" stroke-width="null" stroke-linecap="round"
                                        class="my-path"></path>
                                </svg>
                                Blog posts
                            </x-nav-link>
                        </li>

                        <li>
                            <x-nav-link href="{{ route('user.profile') }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 6H7C5.11438 6 4.17157 6 3.58579 6.58579C3 7.17157 3 8.11438 3 10V17C3 18.8856 3 19.8284 3.58579 20.4142C4.17157 21 5.11438 21 7 21H17C18.8856 21 19.8284 21 20.4142 20.4142C21 19.8284 21 18.8856 21 17V10C21 8.11438 21 7.17157 20.4142 6.58579C19.8284 6 18.8856 6 17 6H16"
                                        stroke="black" stroke-width="null" stroke-linecap="round" class="my-path">
                                    </path>
                                    <path
                                        d="M10.5 12.5C10.5 13.3284 9.82843 14 9 14C8.17157 14 7.5 13.3284 7.5 12.5C7.5 11.6716 8.17157 11 9 11C9.82843 11 10.5 11.6716 10.5 12.5Z"
                                        stroke="black" stroke-width="null" class="my-path"></path>
                                    <path
                                        d="M12 18V17.9286C12 17.5302 12 17.331 11.9624 17.1662C11.8342 16.6045 11.3955 16.1658 10.8338 16.0376C10.669 16 10.4698 16 10.0714 16H8C7.53501 16 7.30252 16 7.11177 16.0511C6.59413 16.1898 6.18981 16.5941 6.05111 17.1118C6 17.3025 6 17.535 6 18"
                                        stroke="black" stroke-width="null" stroke-linecap="round" class="my-path">
                                    </path>
                                    <path d="M15 13H18" stroke="black" stroke-width="null" stroke-linecap="round"
                                        class="my-path"></path>
                                    <path d="M15 16H18" stroke="black" stroke-width="null" stroke-linecap="round"
                                        class="my-path"></path>
                                    <path
                                        d="M10.25 6.24985L10.25 5.47472C10.25 5.16873 10.25 5.01573 10.2931 4.87378C10.3121 4.8111 10.3372 4.75043 10.3681 4.69267C10.438 4.56185 10.5462 4.45366 10.7626 4.23729C11.2591 3.74073 11.5074 3.49246 11.8049 3.43328C11.9337 3.40766 12.0663 3.40766 12.1951 3.43328C12.4926 3.49246 12.7409 3.74073 13.2374 4.23729C13.4538 4.45366 13.562 4.56185 13.6319 4.69267C13.6628 4.75043 13.6879 4.8111 13.7069 4.87378C13.75 5.01573 13.75 5.16873 13.75 5.47472V6.24985C13.75 6.95208 13.75 7.3032 13.5815 7.55542C13.5085 7.66461 13.4148 7.75836 13.3056 7.83132C13.0533 7.99985 12.7022 7.99985 12 7.99985C11.2978 7.99985 10.9467 7.99985 10.6944 7.83132C10.5852 7.75836 10.4915 7.66461 10.4185 7.55542C10.25 7.3032 10.25 6.95208 10.25 6.24985Z"
                                        stroke="black" stroke-width="null" stroke-linecap="round"
                                        stroke-linejoin="round" class="my-path"></path>
                                </svg>
                                User profile
                            </x-nav-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="w-full lg:ps-64">
        {{ $slot }}
    </div>

</body>

</html>
