<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Workspace</title>
    @vite('resources/css/app.css')
</head>
<body class="dark:bg-primary">
<div class="w-full flex flex-col items-center pt-20">
    <h3 class="text-xl font-bold dark:text-white">How do you want to use DeVotion?</h3>
    <h2 class="text-2xl font-bold text-gray-500">This helps customize your experience</h2>
    <div class="">
{{--        TODO: belom kelar buat inputannya--}}
        <form action="{{ route('createWorkspace') }}" method="post" class="flex flex-col justify-center gap-16">
            @csrf
            <div class="flex justify-center gap-16 pt-10">
                <label class="flex flex-col justify-center items-center cursor-pointer">
                    <input type="radio" name="type" value="personal" class="visually-hidden">
                    <div class="flex flex-col justify-center items-center cursor-pointer p-4 rounded-xl border-2 border-gray-700">
                        <img src='{{asset('plan-type-for-work-darkmode.png')}}' alt="Personal Use" class="w-[200px] h-auto" />
                        <div class="font-medium text-lg dark:text-white pt-4">Personal</div>
                    </div>

                </label>

                <label class="flex flex-col justify-center items-center cursor-pointer">
                    <input type="radio" name="type" value="team" class="visually-hidden">
                    <div class="flex flex-col justify-center items-center cursor-pointer p-4 rounded-xl border-2 border-gray-700">
                        <img src='{{asset('plan-type-for-life-darkmode.png')}}' alt="Team Use" class="w-[200px] h-auto" />
                        <div class="font-medium text-lg dark:text-white pt-4">Team</div>
                    </div>
                </label>
            </div>

            <button class="bg-blue-500 rounded-lg text-white py-2 mx-[5rem]" type="submit">
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
</body>
</html>
