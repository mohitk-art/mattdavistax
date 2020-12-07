@extends('fornt_layouts.app')

@section('content')

<section class="top-section">
    <div class="container">
        <h1>Login</h1>
        <!-- <p>We offer options to fit your busy schedule!</p> -->
    </div>
</section>



<div class="container py-4 login_container">
<div class="p-3 shadow col-md-5 mx-auto border rounded bg-white">


        @if (session('status'))
        <div class="mb-3 alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-3 alert alert-danger" />

        <form method="POST" action="{{ route('login') }}" class="form-row">
            @csrf

            <div class="col-md-12 mb-3">
                <x-jet-label for="email" class="mb-2" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="col-md-12 mb-3">
                <x-jet-label class="mb-2" for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="col-md-12 mb-3">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="d-flex align-items-center justify-content-between col-md-12">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="btn btn-primary">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
            
        </form>

        
</div>
</div>
@endsection
