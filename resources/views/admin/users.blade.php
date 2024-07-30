<style>
    /* CHECKBOX TOGGLE SWITCH */
    /* @apply rules for documentation, these do not work as inline style */
    .toggle-checkbox:checked {
      @apply: border-green-400;
      border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label {
      @apply: bg-green-400;
      background-color: #68D391;
    }
</style>

<x-layout>
    <x-topbar/>
    <div class="md:flex h-full md:h-[calc(100vh-3rem)] bg-gray-100 mt-12">
        <x-sidemenu/>
        <div class="flex-1 overflow-y-auto h-full md:h-[calc(100vh-3rem)]">
            <main class="p-2 lg:p-6 min-h-[calc(100vh-8rem)]">
                <section class="max-w-7xl mx-auto py-4 px-5">
                    <div class="flex justify-between items-center border-b border-gray-300">
                        <h1 class="text-2xl font-semibold pt-2 pb-2">Manage Accounts</h1>
                    </div>

                    <!-- Users table -->
                    <x-search action="/admin/users" class="w-80 mt-8"/>
                    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Account Name</th>
                                    <th class="py-3 px-6 text-left">Email</th>
                                    <th class="py-3 px-6 text-center">Joined</th>
                                    <th class="py-3 px-6 text-center">Toggle Role</th>
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
                                        {{$user->email}}
                                    </td>
                                    <td class="py-3 px-6 text-center date-time">

                                    </td>
                                    <td class="py-3 px-6 text-center capitalize">
                                        <div class="relative inline-block w-10 mr-2 align-middle select-none">
                                            <input type="checkbox" name="toggle" id="toggle-{{$user->id}}" onchange="toggleAdmin()" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer checked:right-0" {{$user->role == 'admin' ? 'checked' : ''}}/>
                                            <label for="toggle-{{$user->id}}" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                                        </div>
                                        <span class="text-xs text-gray-700">Admin</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                                <a href='/listings/{{$user->id}}'><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg></a>
                                            </div>

                                            <form method="POST" action="/account/{{$user->id}}">
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
                                                    <x-confirm-modal heading="Delete user account?" description="Are you sure you want to delete this user? This action cannot be undone."/>
                                                </div>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="border-gray-300">
                                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                    <p class="text-center">No user Found</p>
                                    </td>
                                </tr>
                                @endunless
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4 py-4">{{$users->links()}}</div>
                </section>
            </main>
            <hr/>
            <x-footer/>
        </div>
    </div>
</x-layout>

<script>

    const dt = luxon.DateTime;

    const dateDivs = document.querySelectorAll('.date-time');

    dateDivs.forEach((dateDiv, index) => {
        const dateTime ="{{$user->created_at}}";

        //properly format before parsing with luxon
        const formattedDateTime = dt.fromFormat(dateTime, 'yyyy-MM-dd HH:mm:ss').toISO();

        // parse dateTime with luxon
        const parsedDateTime = dt.fromISO(formattedDateTime);

        //format dateTime to desired string
        const formattedStr = parsedDateTime.toLocaleString(dt.DATETIME_MED);

        dateDiv.innerText = formattedStr;
    });

    /*
    * CSRF
    */
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    /*
    * Toggle button ajax script
    */
    const toggleAdmin = async () => {

        const user_id = event.target.id.split('-')[1];
        const checkbox = document.getElementById(event.target.id);

        try {
            const response = await fetch(`/role/toggle/${user_id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },

            });

            const data = await response.json();

        } catch (error) {
            //toggle state of checkbox if operation fails
            setTimeout(() => {
                checkbox.checked = !checkbox.checked;
            }, 500);
        }
    }

</script>

