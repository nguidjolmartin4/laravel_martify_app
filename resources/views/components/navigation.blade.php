<div class="bg-white" x-data="{ open: false }">
    <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true" x-show="open" @click.outside="open = false">

        <div class="fixed inset-0 z-40 flex">
            <div class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-white pb-12 shadow-xl">
                <div class="flex px-4 pb-2 pt-5">
                    <button type="button" @click="open = !open"
                        class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mt-2">
                    <div class="border-b border-gray-200">
                        <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
                            <button id="tabs-1-tab-1"
                                class="flex-1 whitespace-nowrap border-b-2 border-transparent px-1 py-4 text-base font-medium text-gray-900"
                                aria-controls="tabs-1-panel-1" role="tab" type="button">Women</button>
                        </div>
                    </div>

                    <div id="tabs-1-panel-1" class="space-y-10 px-4 pb-8 pt-10" aria-labelledby="tabs-1-tab-1"
                        role="tabpanel" tabindex="0">
                        <div class="grid grid-cols-2 gap-x-4">
                            <div class="group relative text-md">
                                <div
                                    class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg"
                                        alt="Models sitting back to back, wearing Basic Tee in black and bone."
                                        class="object-cover object-center">
                                </div>
                                <a href="#" class="mt-6 block font-medium text-gray-900">
                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                    New Arrivals
                                </a>
                                <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                            <div class="group relative text-md">
                                <div
                                    class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                    <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg"
                                        alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees."
                                        class="object-cover object-center">
                                </div>
                                <a href="#" class="mt-6 block font-medium text-gray-900">
                                    <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                                    Basic Tees
                                </a>
                                <p aria-hidden="true" class="mt-1">Shop now</p>
                            </div>
                        </div>
                        <div>
                            <p id="women-clothing-heading-mobile" class="font-medium text-gray-900">Clothing</p>
                            <ul role="list" aria-labelledby="women-clothing-heading-mobile"
                                class="mt-6 flex flex-col space-y-6">
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Tops</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Dresses</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Pants</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Denim</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Sweaters</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">T-Shirts</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Jackets</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Activewear</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Browse All</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <p id="women-accessories-heading-mobile" class="font-medium text-gray-900">Accessories</p>
                            <ul role="list" aria-labelledby="women-accessories-heading-mobile"
                                class="mt-6 flex flex-col space-y-6">
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Watches</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Wallets</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Bags</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Sunglasses</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Hats</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Belts</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <p id="women-brands-heading-mobile" class="font-medium text-gray-900">Brands</p>
                            <ul role="list" aria-labelledby="women-brands-heading-mobile"
                                class="mt-6 flex flex-col space-y-6">
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Full Nelson</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">My Way</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Re-Arranged</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Counterfeit</a>
                                </li>
                                <li class="flow-root">
                                    <a href="#" class="-m-2 block p-2 text-gray-500">Significant Other</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
                    </div>
                    <div class="flow-root">
                        <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
                    </div>
                </div>

                @guest
                    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                        <div class="flow-root">
                            <a href="{{ route('login') }}" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
                        </div>
                        <div class="flow-root">
                            <a href="{{ route('register') }}" class="-m-2 block p-2 font-medium text-gray-900">Create
                                account</a>
                        </div>
                    </div>
                @endguest

                @auth
                    <div class="space-y-6 border-t border-gray-200 px-4 py-6">
                        <div class="flex items-center px-5">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="" />
                            </div>
                            <div class="ml-3 space-y-2">
                                <div class="text-base font-medium leading-none text-gray-900">
                                    Tom Cook
                                </div>
                                <div class="text-md font-medium leading-none text-gray-400">
                                    tom@example.com
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 space-y-1 px-2">
                            <a href="#"
                                class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-200 hover:text-white">Your
                                Dashboard</a>
                            <a href="#"
                                class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-200 hover:text-white">Your
                                Profile</a>
                            <form action="{{ route('logout') }}" method="post" class="block">
                                <button type="submit"
                                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-red-200 hover:text-red-800">Sign
                                    out &rarr;</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <header class="relative bg-white">
        <p
            class="flex h-10 items-center justify-center bg-blue-600 px-4 text-md font-medium text-white sm:px-6 lg:px-8">
            Get free delivery on orders over 100,000 F CFA</p>

        <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="border-b border-gray-200">
                <div class="flex h-16 items-center">
                    <button type="button" class="relative rounded-md bg-white p-2 text-gray-400 lg:hidden"
                        @click="open = !open">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>

                    <div class="ml-4 flex lg:ml-0">
                        <a href="#">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto" src="{{ asset('logo.svg') }}" alt="">
                        </a>
                    </div>

                    <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                        <div class="flex h-full space-x-8">
                            <a href="{{ route('home') }}"
                                class="flex items-center text-md font-medium text-gray-700 hover:text-gray-800">Home</a>
                            <a href="{{ route('about') }}"
                                class="flex items-center text-md font-medium text-gray-700 hover:text-gray-800">About</a>

                            <div class="flex" x-data="{ open: false }">
                                <div class="relative flex">
                                    <button type="button" @click="open = !open"
                                        class="relative z-10 -mb-px flex items-center border-b-2 border-transparent pt-px text-md font-medium text-gray-700 transition-colors duration-200 ease-out hover:text-gray-800"
                                        aria-expanded="false">Categories</button>
                                </div>

                                <div class="absolute inset-x-0 top-full text-md text-gray-500" x-show="open"
                                    @click.outside="open = false">
                                    <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

                                    <div class="relative bg-white">
                                        <div class="mx-auto max-w-7xl px-8">
                                            <div class="grid grid-cols-2 gap-x-8 gap-y-10 py-16">
                                                <div class="col-start-2 grid grid-cols-2 gap-x-8">
                                                    <div class="group relative text-base sm:text-md">
                                                        <div
                                                            class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-01.jpg"
                                                                alt="Models sitting back to back, wearing Basic Tee in black and bone."
                                                                class="object-cover object-center">
                                                        </div>
                                                        <a href="#"
                                                            class="mt-6 block font-medium text-gray-900">
                                                            <span class="absolute inset-0 z-10"
                                                                aria-hidden="true"></span>
                                                            New Arrivals
                                                        </a>
                                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                                    </div>
                                                    <div class="group relative text-base sm:text-md">
                                                        <div
                                                            class="aspect-h-1 aspect-w-1 overflow-hidden rounded-lg bg-gray-100 group-hover:opacity-75">
                                                            <img src="https://tailwindui.com/img/ecommerce-images/mega-menu-category-02.jpg"
                                                                alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees."
                                                                class="object-cover object-center">
                                                        </div>
                                                        <a href="#"
                                                            class="mt-6 block font-medium text-gray-900">
                                                            <span class="absolute inset-0 z-10"
                                                                aria-hidden="true"></span>
                                                            Basic Tees
                                                        </a>
                                                        <p aria-hidden="true" class="mt-1">Shop now</p>
                                                    </div>
                                                </div>
                                                <div class="row-start-1 grid grid-cols-3 gap-x-8 gap-y-10 text-md">
                                                    <div>
                                                        <p id="Clothing-heading" class="font-medium text-gray-900">
                                                            Clothing</p>
                                                        <ul role="list" aria-labelledby="Clothing-heading"
                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">Tops</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Dresses</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Pants</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Denim</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Sweaters</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">T-Shirts</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Jackets</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Activewear</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">Browse
                                                                    All</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <p id="Accessories-heading" class="font-medium text-gray-900">
                                                            Accessories</p>
                                                        <ul role="list" aria-labelledby="Accessories-heading"
                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Watches</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Wallets</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">Bags</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Sunglasses</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">Hats</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Belts</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div>
                                                        <p id="Brands-heading" class="font-medium text-gray-900">
                                                            Brands</p>
                                                        <ul role="list" aria-labelledby="Brands-heading"
                                                            class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">Full
                                                                    Nelson</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#" class="hover:text-gray-800">My
                                                                    Way</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Re-Arranged</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Counterfeit</a>
                                                            </li>
                                                            <li class="flex">
                                                                <a href="#"
                                                                    class="hover:text-gray-800">Significant Other</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('privacy') }}"
                                class="flex items-center text-md font-medium text-gray-700 hover:text-gray-800">Privacy</a>
                            <a href="{{ route('sell') }}"
                                class="flex items-center text-md font-medium text-gray-700 hover:text-gray-800">Sell</a>
                        </div>
                    </div>

                    <div class="ml-auto flex items-center">
                        @guest
                            {{-- Auth CTA --}}
                            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                                <a href="{{ route('login') }}"
                                    class="text-md font-medium text-gray-700 hover:text-gray-800">Sign
                                    in</a>
                                <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                                <a href="{{ route('register') }}"
                                    class="text-md font-medium text-gray-700 hover:text-gray-800">Create
                                    account</a>
                            </div>
                        @endguest

                        {{-- Search Icon --}}
                        <div class="flex lg:ml-6">
                            <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
                                <span class="sr-only">Search</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>
                            </a>
                        </div>

                        {{-- Shopping Cart --}}
                        <div class="ml-4 flow-root lg:ml-6">
                            <a href="#" class="group -m-2 flex items-center p-2">
                                <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                <span class="ml-2 text-md font-medium text-gray-700 group-hover:text-gray-800">0</span>
                                <span class="sr-only">items in cart, view bag</span>
                            </a>
                        </div>

                        @auth
                            <!-- Profile -->
                            <div class="relative ml-5" x-data="{ open: false }">
                                <div>
                                    <button type="button" @click="open = !open"
                                        class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-md focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-white"
                                        id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                        <span class="absolute -inset-1.5"></span>
                                        <span class="sr-only">Open user menu</span>
                                        <img class="h-8 w-8 rounded-full"
                                            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                            alt="" />
                                    </button>
                                </div>

                                <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    x-show="open" @click.outside="open = false" role="menu"
                                    aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <a href="{{ route('user.dashboard') }}"
                                        class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-400 hover:text-white"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
                                    <a href="{{ route('user.profile') }}"
                                        class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-400 hover:text-white"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                    <a href="{{ route('user.orders') }}"
                                        class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-400 hover:text-white"
                                        role="menuitem" tabindex="-1" id="user-menu-item-0">Order History</a>
                                    <form class="block" action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit"
                                            class="block w-full px-4 py-2 text-md bg-white text-red-700 hover:bg-red-400 hover:text-white">Sign
                                            out</button>
                                    </form>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>
</div>
