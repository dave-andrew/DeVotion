<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DeVotion</title>
    @livewireStyles
</head>
<body>
    <div>
        <ul>
            <li>
                {{
                    Auth::check() ?
                    'Hello, '. Auth::user()->username :
                    '<a href="">Login</a>'
                }}
            </li>
            <li>
                {{
                    Auth::check() ?
                    '<a href="' . route('home') . '">Home</a>' :
                    ''
                }}
            </li>
        </ul>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    @yield('content')
    @livewireScripts
</body>
</html>
w
