<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>DeVotion | @yield('title')</title>
    @livewireStyles
</head>

<body>
    <div class="relative min-h-screen w-full flex justify-center items-center bg-neutral-200">
        @yield('content')
    </div>
    @livewireScripts
</body>

</html>