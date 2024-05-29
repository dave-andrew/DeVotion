<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DeVotion</title>
</head>
<body>
    <div>
        <ul>
            <li>
                {{
                    Auth::check() ?
                    'Hello, ' . Auth::user()->name . ' | <a href="' . route('logout') . '">Logout</a>' :
                    '<a href="">Register</a>'
                }}
            </li>
            <li>
                {{
                    Auth::check() ?
                    '<a href="' . route('home') . '">Home</a>' :
                    '<a href="">Login</a>'
                }}
            </li>
        </ul>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
    @yield('content')
</body>
</html>
w