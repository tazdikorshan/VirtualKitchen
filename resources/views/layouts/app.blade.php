<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Kitchen - Home</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <link rel="icon" href="{{ asset('images/favicon.ico')}}" type="image/x-icon" />
</head>

<body>
    <header id="main-header">
        <h1 class="title">Orshan's Virtual Kitchen</h1>
        <nav>
            <ul>
                <a href="{{ route('home')}}">Home</a>
                <a href="{{ route('recipes.index')}}">Recipes</a>
                <a href="{{ route('contact')}}">Contact</a>
                <a href="{{ route('register') }}">Register</a>
                @auth

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>

                @else
                <a href="{{ route('login') }}">Login</a>
                @endauth
                @auth
                <a href="{{ route('recipes.create') }}">Add Recipe</a>
                @endauth

            </ul>
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2025 Virtual Kitchen. All rights reserved.</p>
    </footer>
</body>

</html>