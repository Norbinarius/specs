<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
    </head>
    <body>
        <h1>@yield('title')</h1>
        @yield('main')

        @if (count($errors))
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif

    </body>
</html>
