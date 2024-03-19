<x-layout>
    <header>
        <div class="flex items-center justify-between mx-auto p-4 w-full p-6 shadow dark:border md:mt-0 dark:bg-gray-800 dark:border-gray-700">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-xl md:text-2xl font-semibold whitespace-nowrap dark:text-white">TechGigs</span>
            </a>
            <form action="/">
                <div class="relative hidden md:block w-80">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" name="search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Tech Gigs">
                </div>
            </form>
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
            <ul class="flex space-x-6 ml-auto">
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
    @if (!Auth::check())
        @include('partials._hero')
    @endif

    <form action="/">
        <div class="md:hidden relative border-2 border-gray-100 m-4 rounded-lg">
          <div class="absolute top-4 left-3">
            <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
          </div>
          <input type="text" name="search" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
            placeholder="Search Tech Gigs..." />
          <div class="absolute top-2 right-2">
            <button type="submit" class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600">
              Search
            </button>
          </div>
        </div>
    </form>

    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 m-4">

        @unless(count($listings) == 0)

        @foreach($listings as $listing)
        <x-listing-card :listing="$listing" />
        @endforeach

        @else
        <p>No listing found</p>

        @endunless

    </div>
    <div class="mt-6 mb-24 p-4">
        {{$listings}}
    </div>
</x-layout>
