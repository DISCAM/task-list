<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Taks list </title>
    @yield('styles')
</head>
<body>
<h1>Menu</h1>
<h1>
    @yield('title')
</h1>

<div>
    @if (session()->has('success'))
        <div style="
        max-width: 200px;
        color:green;
        font-weight: bold;
        font-size: 1.2rem;
        background-color: yellow">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>
