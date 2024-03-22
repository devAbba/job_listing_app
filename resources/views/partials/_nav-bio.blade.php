<div class="flex flex-col items-center mt-4 -mx-2">
    <img class="object-cover w-24 h-24 mx-2 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="avatar">
    <h4 class="mx-2 mt-2 font-medium text-gray-800 dark:text-gray-200">{{auth()->user()->name}}</h4>
    <p class="mx-2 mt-1 text-sm font-medium text-gray-600 dark:text-gray-400">{{auth()->user()->email}}</p>
</div>
