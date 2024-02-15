<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
          <h2 class="text-2xl font-bold uppercase mb-1">Register</h2>
          <p class="mb-4">Create an account to post gigs</p>
        </header>

        <form method="POST" action="/signup">
          @csrf
          <div class="mb-6">
            <label for="name" class="block mb-2 font-medium text-gray-700 dark:text-white"> Name </label>
            <input type="text" class="border border-gray-200 rounded-lg p-2 w-full" name="name" value="{{old('name')}}" />

            @error('name')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="email" class="block mb-2 font-medium text-gray-700 dark:text-white">Email</label>
            <input type="email" class="border border-gray-200 rounded-lg p-2 w-full" name="email" value="{{old('email')}}" />

            @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="password" class="block mb-2 font-medium text-gray-700 dark:text-white">
              Password
            </label>
            <input type="password" class="border border-gray-200 rounded-lg p-2 w-full" name="password"
              value="{{old('password')}}" placeholder="minimum of 8 characters"/>

            @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-6">
            <label for="password2" class="block mb-2 font-medium text-gray-700 dark:text-white">
              Confirm Password
            </label>
            <input type="password" class="border border-gray-200 rounded-lg p-2 w-full" name="password_confirmation"
              value="{{old('password_confirmation')}}"/>

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
          </div>

          <div class="mb-6">
            <button type="submit" class="bg-primary-500 text-white rounded-lg py-2 px-4 hover:bg-primary-600">
              Sign Up
            </button>
          </div>

          <div class="mt-8">
            <p>
              Already have an account?
              <a href="/login" class="text-blue-600">Login</a>
            </p>
          </div>
        </form>
      </x-card>
</x-layout>
