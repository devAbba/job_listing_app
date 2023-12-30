@if(session()->has('success'))
<div class="fixed top-5 right-5 w-64" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="flex items-center p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-900" role="alert">
        <div>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="green" class="h-6 w-6">
            <path fillRule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clipRule="evenodd"/>
        </svg>
        </div>
        <div class="ml-3">
        <p class="text-sm">{{session('success')}}</p>
        <button x-on:click="show = false" class="!absolute top-2 right-2 h-6 max-h-[24px] w-6 max-w-[24px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-grey transition-all hover:bg-black/10 active:bg-black/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
            <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </span>
        </button>
      </div>
    </div>
  </div>
@endif

