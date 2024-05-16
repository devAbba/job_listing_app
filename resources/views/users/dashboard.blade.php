<x-layout>
    <x-topbar/>
    <div class="md:flex h-full md:h-[calc(100vh-3rem)] bg-gray-100 mt-12">
        <x-sidemenu/>
        <div class="flex-1 overflow-y-auto h-full md:h-[calc(100vh-3rem)]">
            <main class="p-2 lg:p-6 min-h-[calc(100vh-8rem)]">
                <section class="max-w-7xl mx-auto py-4 px-5">
                    <div class="flex justify-between items-center border-b border-gray-300">
                        <h1 class="text-2xl font-semibold pt-2 pb-2">Dashboard</h1>
                    </div>

                    @if($listings->isEmpty())
                    <div class="mt-4 flex flex-col">
                        <p class="text-center mb-4">No Recent Job Listing</p>
                        <button class="mx-auto bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">New Listing</button>
                    </div>

                    @else
                    <!-- Table -->
                    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">listing</th>
                                    <th class="py-3 px-6 text-center">Views</th>
                                    <th class="py-3 px-6 text-center">Status</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @unless($listings->isEmpty())
                                @foreach($listings as $listing)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                            {{$listing->title}}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        {{$listing->views}}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Active</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                                <a href='/listings/{{$listing->id}}'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg></a>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                </svg>
                                            </div>
                                            <form method="POST" action="/listings/{{$listing->id}}">
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
                                                    <x-confirm-modal heading="Delete listing?" description="Are you sure you want to delete this listing? This action cannot be undone."/>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                @endunless
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 py-4"></div>

                    @endif
                </section>
            </main>
            <hr/>
            <x-footer/>
        </div>
    </div>
</x-layout>

