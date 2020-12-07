@extends('fornt_layouts.app')

@section('content')

<section class="top-section">
    <div class="container">
        <h1>Forgot Password</h1>
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

        <div class="mb-3">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <form method="POST" class="form-row" action="{{ route('password.email') }}">
            @csrf

            <div class="col-md-12 mb-3">
                <x-jet-label class="mb-2" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="col-md-12 text-right">
                <x-jet-button class="btn btn-primary">
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>

</div>
</div>
@endsection