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
            <input class="w-full p-2 mb-2 rounded-md ring-1 ring-gray-300 focus:ring-blue-500 focus:outline-none" type="text" name="email" id="email" placeholder="Enter your email address...">
            <label class="text-sm mb-2" for="email">Password</label>
            <input class="w-full p-2 mb-6 rounded-md ring-1 ring-gray-300 focus:ring-blue-500 focus:outline-none" type="text" name="password" id="password" placeholder="Enter your password...">
            <button class="bg-blue-500  w-full p-2 rounded-md text-white text-sm font-medium">Continue</button>
        </form>
        <div class="w-full mt-16 text-gray-500 text-xs text-center text-balance">
            Your name and photo are displayed to users who invite you to a workspace using your email. By continuing, you acknowledge that you understand and agree to the Terms & Conditions and Privacy Policy
        </div>

    </div>
@endsection
