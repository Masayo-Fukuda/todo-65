<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <title>ToDo</title>
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>
    
<body>
    <header id="header">
        <div class="container">
            <h3 class="site-title">
                <a href="./">ToDo</a>
            </h3>
            <div>
                <ul class="nav">
                @if (Route::has('login'))          
                        @auth
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                        @else
                            <li class="nav-item">    
                                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>
                            </li>
                        @if (Route::has('register'))
                            <li class="nav-item">    
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                        @endauth    
                @endif
                </ul>
            </div>
        </div>
    </header>
    <main>
        <section class="top">
            <div class="img">
                <img src="https://cdn.pixabay.com/photo/2017/05/15/23/48/survey-2316468__480.png" alt="">
            </div>
            <div>
                <a class="button" href="{{ route('register') }}">
                <span>Create New Acount</span>
                </a>
            </div>
            <div class="log-in">
                <a href="{{ route('login') }}">Do you already have an account? login</a>
            </div>

        </section>
    </main>
    
</body>
</html>
