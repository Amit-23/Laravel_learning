<x-guest-layout>
    <style>
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        input:focus {
            border-color: #6366f1;
            outline: none;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.3);
        }
        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .checkbox-group input {
            margin-right: 8px;
        }
        .checkbox-group label {
            margin: 0;
            font-size: 0.9rem;
            color: #555;
        }
        .btn {
            background-color: #6366f1;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            width: 100%;
        }
        .btn:hover {
            background-color: #4f46e5;
        }
        .link {
            display: block;
            text-align: center;
            margin-top: 10px;
            font-size: 0.9rem;
            color: #6366f1;
            text-decoration: underline;
        }
        .link:hover {
            color: #4f46e5;
        }
        .error {
            color: #e3342f;
            font-size: 0.875rem;
        }
    </style>

    <!-- Session Status -->
    @if (session('status'))
        <p class="error">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @if ($errors->has('email'))
                <p class="error">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @if ($errors->has('password'))
                <p class="error">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <!-- Remember Me -->
        <div class="checkbox-group">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">{{ __('Remember me') }}</label>
        </div>

        <!-- Login Button -->
        <button type="submit" class="btn">{{ __('Log in') }}</button>

        <!-- Forgot Password -->
        @if (Route::has('password.request'))
            <a class="link" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
        @endif
    </form>
</x-guest-layout>
