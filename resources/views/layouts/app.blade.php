<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>DeVotion | @yield('title')</title>
</head>
<body>
    <div class="relative min-h-screen w-full flex flex-col justify-center items-center">
        @yield('content')
    </div>
</body>
</html>