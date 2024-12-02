<x-guest-layout>
    <style>
        input[type="email"] {
            background-color: white; /* White background for the input box */
            color: black; /* Black text inside the input box */
            border: 1px solid #d1d5db; /* Light gray border */
            border-radius: 5px; /* Slightly rounded corners */
            padding: 10px; /* Padding inside the input box */
            width: 100%; /* Full-width input */
            font-size: 1rem; /* Standard font size */
            box-sizing: border-box; /* Ensures padding doesn’t affect width */
        }

        input[type="email"]:focus {
            border-color: #6366f1; /* Indigo border on focus */
            outline: none; /* Removes default focus outline */
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.3); /* Focus ring effect */
        }
    </style>

    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
           <label for="email">Email</label>
            <input 
                id="email" 
                type="email" 
                name="email" 
                value="{{ old('email') }}" 
                required 
                autofocus 
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
