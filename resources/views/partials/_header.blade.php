<header>
    <div class="flex items-center justify-between mx-auto p-4 w-full p-6 shadow dark:border md:mt-0 dark:bg-gray-800 dark:border-gray-700">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <span class="self-center text-xl md:text-2xl font-semibold whitespace-nowrap dark:text-white">TechGigs</span>
        </a>
        <x-search action="/" class="hidden md:block w-80" />

        @auth
        <ul class="flex space-x-4">
            <li>
                <a href="/{{auth()->user()->role}}/dashboard" class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-5 w-5">
                        <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 000 1.5H3v10.5a3 3 0 003 3h1.21l-1.172 3.513a.75.75 0 001.424.474l.329-.987h8.418l.33.987a.75.75 0 001.422-.474l-1.17-3.513H18a3 3 0 003-3V3.75h.75a.75.75 0 000-1.5H2.25zm6.04 16.5l.5-1.5h6.42l.5 1.5H8.29zm7.46-12a.75.75 0 00-1.5 0v6a.75.75 0 001.5 0v-6zm-3 2.25a.75.75 0 00-1.5 0v3.75a.75.75 0 001.5 0V9zm-3 2.25a.75.75 0 00-1.5 0v1.5a.75.75 0 001.5 0v-1.5z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="mx-1 md:mx-2">Dashboard</span>
                </a>
            </li>
            <li>
                <div class="flex items-center mx-1 md:mx-2">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit"><i class="fas fa-sign-out"></i> <span class="hidden md:inline-block">Logout</span></button>
                    </form>
                </div>
            </li>
        </ul>
        @else
        <ul class="flex space-x-6">
            <li>
                <a href="/signup" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> <span class="hidden md:inline-block">Register</span></a>
              </li>
              <li>
                <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i> <span class="hidden md:inline-block">Login</span></a>
              </li>
        </ul>
        @endauth
    </div>
</header>
