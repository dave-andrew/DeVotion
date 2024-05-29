@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="w-full max-w-sm  px-6 mx-0 my-auto flex flex-col ">
        <div class="max-w-[380px] w-full my-8 flex flex-col text-2xl text-left font-semibold">
            <h1>Think it. Make it.</h1>
            <h1 class="text-gray-500 text-xl">Log in to your DeVotion account</h1>
        </div>
        <form action="{{route('login')}}" method="POST" class="w-full flex flex-col text-grey-500">
            @csrf
            <label class="text-sm mb-2" for="email">Email</label>
            <input class="auth-input" type="text" name="email" id="email" placeholder="Enter your email address..." value="{{old('email')}}">
            <label class="text-sm mb-2" for="password">Password</label>
            <input class="auth-input" type="password" name="password" id="password" placeholder="Enter your password..." value="{{old('password')}}">
            <label class="flex items-center mb-2">
                <input class="w-4 h-4" type="checkbox" name="remember"> <span class="ml-2">Remember me</span>
            </label>
            @if ($errors->any())
                <p class="error">
                    {{ $errors->first() }}
                </p>
            @endif
            <button class="auth-btn" type="submit">Continue</button>
        </form>
        <div class="mt-4 text-gray-500 text-sm text-center font-medium">Don't have an account? <a class="text-blue-500" href="/register">Register</a></div>
        <div class="w-full mt-16 text-gray-500 text-xs text-center text-balance">
            Your name and photo are displayed to users who invite you to a workspace using your email. By continuing, you acknowledge that you understand and agree to the Terms & Conditions and Privacy Policy
        </div>

    </div>
@endsection
