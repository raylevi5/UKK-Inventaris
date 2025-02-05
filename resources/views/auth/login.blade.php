<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #fff;
    }

    .login-container {
        background: #ffffff;
        color: #333;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 400px;
    }

    .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        color: #6a11cb;
    }

    .login-container form {
        display: flex;
        flex-direction: column;
    }

    .login-container label {
        font-size: 14px;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .login-container input[type="email"],
    .login-container input[type="password"] {
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
        box-sizing: border-box;
    }

    .login-container input:focus {
        border-color: #6a11cb;
        outline: none;
        box-shadow: 0 0 5px rgba(106, 17, 203, 0.5);
    }

    .login-container button {
        padding: 12px;
        background: #6a11cb;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
    }

    .login-container button:hover {
        background: #2575fc;
        transform: scale(1.02);
    }

    .login-container .footer {
        text-align: center;
        margin-top: 20px;
    }

    .login-container .footer a {
        color: #6a11cb;
        text-decoration: none;
        font-weight: bold;
    }

    .login-container .footer a:hover {
        text-decoration: underline;
    }

    /* Additional styling for consistent layout */
    .login-container .block {
        width: 100%;
    }

    .login-container .flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

    </head>
    <body>
        <div class="login-container">
            <h2>{{ __('Login') }}</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="footer">
                    <p>Don't have an account? <a href="{{ route('register') }}">{{ __('Register here') }}</a></p>
                </div>

                    <x-primary-button class="ml-3">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </body>
</html>
