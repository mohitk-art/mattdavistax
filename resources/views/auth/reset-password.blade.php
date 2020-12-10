@extends('fornt_layouts.app')

@section('content')

<section class="top-section">
    <div class="container">
        <h1>Reset Password</h1>
        <!-- <p>We offer options to fit your busy schedule!</p> -->
    </div>
</section>



<div class="container py-4 register_container">
<div class="p-3 shadow col-md-5 mx-auto border rounded bg-white">

        @if (session('status'))
            <div class="mb-3 alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label class="mb-2" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label class="mb-2" for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label class="mb-2" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="text-right mt-4">
                <x-jet-button class="btn btn-primary">
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>


    </div>
    </div>
 
        @endsection