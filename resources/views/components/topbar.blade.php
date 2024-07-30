<div x-data="{isOpen: false}" class="fixed top-0 w-full flex bg-white border-gray-200 dark:bg-gray-900 justify-between mx-auto p-4 z-30">

    <a href="/" class="items-center space-x-3 rtl:space-x-reverse">
        <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">TechGigs</span>
    </a>
    <div class="flex md:hidden">
        <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
            <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16"/>
            </svg>

            <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Side Nav-->
    <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 z-20 w-64 h-screen my-10 px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-gray-800">
        @include('partials._nav-bio')

        <div class="flex flex-col justify-between mt-6">
            @include('partials._nav-links')
        </div>
    </div>
</div>





