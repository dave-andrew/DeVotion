@extends('layouts.workspace')

@section('title', 'Create Workspace')

@section('content')
    <div class="w-full flex flex-col items-center justify-center pt-20">
        <h3 class="text-xl font-bold">How do you want to use DeVotion?</h3>
        <h2 class="text-2xl font-bold text-gray-500">This helps customize your experience</h2>
        <div>
            <form action="{{ route('viewCreateWorkspace.detail') }}" method="get" class="flex flex-col justify-center gap-16">
                @csrf
                <div class="flex justify-center gap-16 pt-10">
                    <label class="flex flex-col justify-center items-center cursor-pointer transition-transform duration-300 hover:-translate-y-2">
                        <input type="radio" name="type" value="personal" class="visually-hidden">
                        <div class="flex flex-col justify-center items-center cursor-pointer p-4 rounded-xl border-2 border-gray-700 hover:shadow-lg">
                            <img src='{{asset('plan-type-for-work-lightmode.png')}}' alt="Personal Use" class="w-[200px] h-auto" />
                            <div class="font-medium text-lg pt-4">Personal</div>
                        </div>

                    </label>

                    <label class="flex flex-col justify-center items-center cursor-pointer transition-transform duration-300 hover:-translate-y-2">
                        <input type="radio" name="type" value="team" class="visually-hidden">
                        <div class="flex flex-col justify-center items-center cursor-pointer p-4 rounded-xl border-2 border-gray-700 hover:shadow-lg">
                            <img src='{{asset('plan-type-for-life-lightmode.png')}}' alt="Team Use" class="w-[200px] h-auto" />
                            <div class="font-medium text-lg pt-4">Team</div>
                        </div>
                    </label>
                </div>

                <button id="continueButton" class="bg-blue-500 rounded-lg text-white py-2 mx-[5rem] transition-all duration-700" type="submit" disabled>
                    Continue
                </button>

            </form>

            @if($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const radioButtons = document.querySelectorAll('input[type="radio"]');
            const continueButton = document.getElementById('continueButton');

            radioButtons.forEach(function(radioButton) {
                radioButton.addEventListener('change', function() {
                    continueButton.disabled = false;
                });
            });
        });
    </script>

    <style>
        #continueButton:disabled {
            background-color: #7299b7;
        }
    </style>

@endsection
