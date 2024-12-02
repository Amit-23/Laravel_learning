@extends('profile.profilelayouts.new-layout')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9fafb;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
    }

    .header {
        margin-bottom: 15px;
    }

    .header h2 {
        font-size: 1.5rem;
        color: #333;
    }

    .header p {
        color: #666;
        font-size: 0.9rem;
    }

    label {
        display: block;
        font-weight: 600;
        margin-bottom: 5px;
        color: #333;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 8px 12px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        box-sizing: border-box;
    }

    input:focus {
        border-color: #6366f1;
        outline: none;
        box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.3);
    }

    .btn {
        background-color: #6366f1;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
    }

    .btn:hover {
        background-color: #4f46e5;
    }

    .error {
        color: #e3342f;
        font-size: 0.875rem;
    }

    .success {
        color: #38a169;
        font-size: 0.875rem;
    }

    .flex {
        display: flex;
        align-items: center;
        gap: 10px;
    }
</style>

<div class="container">
    <!-- Profile Information Section -->
    <div class="section">
        <div class="header">
            <h2>{{ __('Profile Information') }}</h2>
            <p>{{ __("Update your account's profile information and email address.") }}</p>
        </div>

        <!-- Update Profile Form -->
        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('patch')

            <!-- Name Input -->
            <div>
                <label for="name">{{ __('Name') }}</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                @error('name')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Input -->
            <div>
                <label for="email">{{ __('Email') }}</label>
                <input type="email" id="email" name="email" disabled value="{{ old('email', $user->email) }}" required>
                @error('email')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Save Button -->
            <div class="flex">
                <button type="submit" class="btn">{{ __('Save') }}</button>
                @if (session('status') === 'profile-updated')
                <p class="success">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>

    <hr style="margin: 20px 0;">

    <!-- Update Password Section -->
    <div class="section">
        <div class="header">
            <h2>{{ __('Update Password') }}</h2>
            <p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
        </div>

        <!-- Password Update Form -->
        <form method="post" action="{{ route('password.update') }}">
            @csrf
            @method('put')

            <!-- Current Password -->
            <div>
                <label for="current_password">{{ __('Current Password') }}</label>
                <input type="password" id="current_password" name="current_password">
                @error('current_password', 'updatePassword')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- New Password -->
            <div>
                <label for="password">{{ __('New Password') }}</label>
                <input type="password" id="password" name="password">
                @error('password', 'updatePassword')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
                @error('password_confirmation', 'updatePassword')
                <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <!-- Save Button -->
            <div class="flex">
                <button type="submit" class="btn">{{ __('Save') }}</button>
                @if (session('status') === 'password-updated')
                <p class="success">{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
