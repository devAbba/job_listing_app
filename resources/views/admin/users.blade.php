<x-layout>
    <x-topbar/>
    <div class="lg:flex bg-gray-100 min-h-screen overflow-y-auto">
        <x-sidemenu/>
        <div class="p-2 lg:p-6 mb-24 flex-1 h-[calc(100vh-6rem)] overflow-y-auto scrollbar-hidden">
            <main>
                <section class="max-w-7xl mx-auto py-4 px-5">
                    <div class="flex justify-between items-center border-b border-gray-300">
                        <h1 class="text-2xl font-semibold pt-2 pb-2">Manage Accounts</h1>
                    </div>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 py-6">
                        <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                            <div class="space-y-2">
                                <p class="text-xs text-gray-400 uppercase">Site Visits</p>
                                <div class="flex items-center space-x-2">
                                    <h1 class="text-xl font-semibold">121</h1>
                                    <p class="text-xs bg-red-50 text-red-500 px-1 rounded">-2.9</p>
                                </div>
                            </div>
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path></svg>
                        </div>

                        <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                            <div class="space-y-2">
                                <p class="text-xs text-gray-400 uppercase">Users</p>
                                <div class="flex items-center space-x-2">
                                    <h1 class="text-xl font-semibold">819</h1>
                                    <p class="text-xs bg-green-50 text-green-500 px-1 rounded">+7.4</p>
                                </div>
                            </div>
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>

                        <div class="bg-white shadow rounded-sm flex justify-between items-center py-3.5 px-3.5">
                            <div class="space-y-2">
                                <p class="text-xs text-gray-400 uppercase">Job Listings</p>
                                <div class="flex items-center space-x-2">
                                    <h1 class="text-xl font-semibold">243</h1>
                                    <p class="text-xs bg-green-50 text-green-500 px-1 rounded">+3.1</p>
                                </div>
                            </div>
                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
                        </div>
                    </div>

                    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Name</th>
                                    <th class="py-3 px-6 text-left">email</th>
                                    <th class="py-3 px-6 text-center">listings</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @unless($users->isEmpty())
                                @foreach($users as $user)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                            {{$user->name}}
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <div class="mr-2">
                                                <img class="w-6 h-6 rounded-full" src="https://randomuser.me/api/portraits/men/1.jpg"/>
                                            </div>
                                            <span>...</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        ...
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Active</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                                <a href=''><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg></a>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                            <form method="POST" action="/users/{{$user->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <div x-data="{ open: false }">
                                                    <button @click="open = ! open" type="button">
                                                        <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110 cursor-pointer cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </div>
                                                    </button>
                                                    <x-confirm heading="Delete User?" description="Are you sure you want to delete this user? This action cannot be undone."/>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="border-gray-300">
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <p class="text-center">No Users Found</p>
                                    </td>
                                </tr>
                                @endunless
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 py-4">{{}}</div>
                </section>
            </main>
        </div>
    </div>
</x-layout>

