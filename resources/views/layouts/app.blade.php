<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="icon" href="/Notion_app_logo_D.png" type="image/png">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>DeVotion | @yield('title')</title>
</head>
<style>
    [x-cloak] {
        display: none
    }
</style>

<body>
    <div class="relative min-h-screen w-full flex justify-center items- dark:bg-primary">
        @auth
            @include('components.sidebar.sidebar')
        @endauth
        @yield('content')
    </div>
    @livewireScripts
</body>

</html>
