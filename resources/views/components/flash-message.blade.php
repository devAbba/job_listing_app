@if(session()->has('success'))
<div class="fixed top-5 right-5 w-64" x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <div class="flex items-center p-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-900" role="alert">
      <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
      <div>
        <p class="font-bold">Success!</p>
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

@if(session()->has('warning'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert" x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
    <p class="font-bold">Warning!</p>
    <p class="text-sm">{{session('warning')}}</p>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
        <svg @click="show = false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
</div>
@endif

