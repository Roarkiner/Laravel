<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    @yield('css')
    @yield('script')
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <nav>
            <ul id="nav-list">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/book">Book</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer><p>Lénaïc Dujour tous droits reservés (lol)</p></footer>
</body>
</html>
