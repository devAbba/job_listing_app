<x-layout>
    <x-card class="p-10">
      <header>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
          Manage Gigs
        </h1>
      </header>

      <table class="w-full table-auto rounded-sm">
        <tbody>
          @unless($listings->isEmpty())
          @foreach($listings as $listing)
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/listings/{{$listing->id}}"> {{$listing->title}} </a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <a href="/listings/edit/{{$listing->id}}" class="text-blue-400 px-6 py-2 rounded-xl"><i
                  class="fa-solid fa-pen-to-square"></i>
                Edit</a>
            </td>
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <form method="POST" action="/listings/{{$listing->id}}">
                @csrf
                @method('DELETE')
                <div x-data="{ open: false }">
                    <button @click="open = ! open" type="button" class="text-red-500">
                        <i class="fa-solid fa-trash"></i> Delete</button>
                    <x-confirm heading="Delete listing?" description="Are you sure you want to delete this listing? This action cannot be undone."/>
                </div>
              </form>
            </td>
          </tr>
          @endforeach
          @else
          <tr class="border-gray-300">
            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
              <p class="text-center">No Listings Found</p>
            </td>
          </tr>
          @endunless

        </tbody>
      </table>
    </x-card>
</x-layout>
