<x-form>
    <div class="max-w-[50rem] flex flex-col mx-auto size-full">
        <!-- ========== HEADER ========== -->
        <header class="mb-auto flex justify-center z-50 w-full py-4">
            <nav class="px-4 sm:px-6 lg:px-8">
                <a class="flex-none text-xl font-semibold sm:text-3xl" href="#" aria-label="Brand">Martify Online
                    Shopping</a>
            </nav>
        </header>
        <!-- ========== END HEADER ========== -->

        <!-- ========== MAIN CONTENT ========== -->
        <main id="content">
            <div class="text-center py-10 px-4 sm:px-6 lg:px-8">
                <h1 class="block mb-10 text-5xl font-bold text-gray-800 sm:text-7xl">Email verification</h1>
                <p class="mt-3 text-gray-600">To access the rest of the website you actually need to get your email
                    verified</p>
                <p class="text-gray-600">We have therefore send a link to your email address. go and click on that links
                    please</p>
                <div class="mt-5 flex flex-col justify-center items-center gap-2 sm:flex-row sm:gap-3">
                    <form action="{{ route('verification.send') }}" method="post">
                        @csrf

                        <button type="submit"
                            class="w-full sm:w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-md font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Send the verfication link again &rarr;
                        </button>
                    </form>
                </div>
            </div>
        </main>
        <!-- ========== END MAIN CONTENT ========== -->

        <!-- ========== FOOTER ========== -->
        <footer class="mt-auto text-center py-5">
            <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8">
                <p class="text-md text-gray-500">Copyright© Martify Online shopping - All Rights Reserved. 2024.</p>
            </div>
        </footer>
        <!-- ========== END FOOTER ========== -->
    </div>
</x-form>
