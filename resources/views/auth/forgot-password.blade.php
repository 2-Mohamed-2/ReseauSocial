<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion |</title>
    <link rel="stylesheet" href="assets/css/main/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-7 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Réinitialisation du mot de passe </h1>
                    <p class="auth-subtitle mb-5">Veuillez renseigner le champs suivant.</p>

                    @if (session('status'))
                        <div class="alert alert-info">
                                <span role="alert">
                                    <strong>{{ session('status') }}</strong>
                                </span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" autocomplete="off" name="email" class="form-control form-control-xl"
                                    value="{{ old('email') }}" placeholder="Votre email ...">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        @foreach ($errors->get('email') as $message)
                                        <span role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @endforeach
                                    </div>
                                @endif

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Valider
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>






{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
