@extends('fornt_layouts.app')

@section('content')

<section class="top-section">
    <div class="container">
        <h1>Register</h1>
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

        <x-jet-validation-errors class="mb-3 alert alert-danger" />

        <form method="POST" class="form-row" action="{{ route('register') }}">
            @csrf

            <div class="col-md-12 mb-3">
                <x-jet-label class="mb-2" for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="col-md-12 mb-3">
                <x-jet-label class="mb-2" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="col-md-12 mb-3">
                <x-jet-label class="mb-2" for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="col-md-12 mb-3">
                <x-jet-label class="mb-2" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            {{-- <div class="col-md-12 mb-2">
                <x-jet-label class="mb-2" for="password" value="{{ __('Select Role') }}" />
                <select name="role" required class="form-control">
                    <option value="user" >User</option>
                    <option value="accountant">Accountant</option>
                    <option value="staff">Staff</option>
                </select>
            </div> --}}

            <div class="col-md-12 mb-3">
                <x-jet-label class="mb-3" for="password_confirmation" value="{{ __('Phone') }}" />
                <x-jet-input id="phone" class="form-control" type="number" name="phone" />
            </div>


            <div class="d-flex col-md-12 align-items-center justify-content-between">
                <a class="" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="btn btn-primary ml-2">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>

</div>
</div>

@endsection
