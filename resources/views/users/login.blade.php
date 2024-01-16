<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Login</h2>
        <p class="mb-4">Log into your account to post gigs</p>
      </header>

      <form method="POST" action="/login">
        @csrf

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
            value="{{old('password')}}" />

          @error('password')
          <p class="text-red-500 text-xs mt-1">{{$message}}</p>
          @enderror
        </div>

        <div class="mb-4 flex">
          <button type="submit" class="mr-auto bg-primary-500 text-white rounded-lg py-2 px-4 hover:bg-primary-700">
            Sign In
          </button>
          <a href="/forgot-password" class="text-primary-500 hover:text-primary-700">Forgot password?</a>
        </div>

        <div class="mt-8">
        <a href="/forgot-password" class="text-blue-500 hover:text-blue-700">Forgot password?</a>
        <div class="mt-6">
          <p>
            Don't have an account?
            <a href="/signup" class="text-primary-500 hover:text-primary-700">Register</a>
          </p>
        </div>
      </form>
    </x-card>
</x-layout>
