@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="w-full max-w-sm  px-6 mx-0 my-auto flex flex-col ">
        <div class="max-w-[380px] w-full my-8 flex flex-col text-xl text-left font-medium justify-center items-center">
            <h1 class=">Start your journey with <b class="text-2xl">DeVotion</b></h1>
        </div>
        <form action="{{ route('register') }}" method="POST" class="w-full flex flex-col text-grey-500">
            @csrf
            <label class="text-sm mb-2" for="username">Username</label>
            <input class="auth-input" type="text" name="username" id="username" placeholder="Enter your username..." value="{{old('username')}}">
            <label class="text-sm mb-2" for="email">Email</label>
            <input class="auth-input" type="text" name="email" id="email"
                placeholder="Enter your email address..." value="{{old('email')}}">
            <label class="text-sm mb-2" for="password">Password</label>
            <input class="auth-input" type="password" name="password" id="password" placeholder="Enter your password..." value="{{old('password')}}">
            <label class="text-sm mb-2" for="password_confirmation">Confirm Password</label>
            <input class="auth-input" type="password" name="password_confirmation" id="password_confirmation"
                placeholder="Confirm Password" value="{{old('password_confirmation')}}">

            @if ($errors->any())
                <p class="error">
                    {{ $errors->first() }}
                </p>
            @endif
            <button class="auth-btn">Continue</button>
        </form>
        <div class="mt-4 text-gray-500 text-sm text-center font-medium">Already have an account? <a class="text-blue-500"
                href="/login">Login</a></div>
        <div class="w-full mt-16 text-gray-500 text-xs text-center text-balance">
            Your name and photo are displayed to users who invite you to a workspace using your email. By continuing, you
            acknowledge that you understand and agree to the Terms & Conditions and Privacy Policy
        </div>

    </div>
@endsection
