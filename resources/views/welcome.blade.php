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
    <header>
        <div class="left">
            <a href="{{ url('/') }}">
                ToDo
            </a>
        </div>
        <div class="right">
            @guest
                @if (Route::has('login'))
                <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <a href="{{ route('tasks.index') }}">投稿一覧</a>
                <a id="navbarDropdown"  href="{{ route('mypage.show', Auth::user()->id ) }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}さんのマイページ
                </a>
            @endguest
        </div>
    </header>
    <main>
        <section class="top">
            <div class="logo">
                <img src="https://cdn.pixabay.com/photo/2017/05/15/23/48/survey-2316468__480.png" alt="">
            </div>

            @if (Route::has('login'))
            <div>
                @auth
                    <div>
                        <a class="button" href="{{ url('/tasks') }}">
                            <span>投稿一覧へ</span>
                        </a>
                    </div>
                    <div class="log-out">
                        <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    </div>
                @else
                    <div>
                        <a class="button" href="{{ route('register') }}">
                        <span>Create New Acount</span>
                        </a>
                    </div>
                        @if (Route::has('login'))
                            <div class="log-in">
                                <a href="{{ route('login') }}">Do you already have an account? login</a>
                            </div>
                        @endif
                @endauth
            @endif
        </section>
    </main>
    
</body>
</html>
