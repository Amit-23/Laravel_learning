<x-guest-layout>
    <style>
        input {
            background-color: white; /* White background for input fields */
            color: black; /* Black text inside input fields */
            border: 1px solid #d1d5db; /* Light gray border */
            border-radius: 5px; /* Rounded corners */
            padding: 10px; /* Padding inside the input box */
            width: 100%; /* Full width */
            font-size: 1rem; /* Standard font size */
            box-sizing: border-box; /* Ensure padding doesn't affect width */
        }

        input:focus {
            border-color: #6366f1; /* Indigo border on focus */
            outline: none; /* Remove default outline */
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.3); /* Subtle focus ring */
        }
    </style>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
          <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
           <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
           <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
          <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
