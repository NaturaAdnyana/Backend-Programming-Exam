<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Backend Programming Exam') }}</title>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="{{ route('books') }}">Books</a></li>
                <li><a href="{{ route('authors') }}">Authors</a></li>
                <li><a href="{{ route('ratings.add') }}">Give Rates</a></li>
            </ul>
        </nav>
    </header>
    <main class="container">
        @yield('content')
    </main>
</body>
</html>