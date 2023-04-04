<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/comment.index.css') }}">
</head>
<body>
  <header>
    <div class="left">
        <a href="{{ url('/') }}">ToDo</a>
    </div>
    <div class="right">
        <a href="{{ route('tasks.index') }}">Tasks List</a>
        @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <a id="navbarDropdown"  href="{{ route('mypage.show', Auth::user()->id ) }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}'s Page</a>
        @endguest
    </div>
</header>

<main>
  <div class=main>
    <p class=title>Comments List</p>
</div>
  <div class="main">
    @foreach($comments as $comment)
      <div>
        <p>User:{{ $comment->user->name }}</p>
        <br>
        <p>Comment<br>{{ $comment->body }}</p>
      </div>
    @endforeach
</div>
  <a href="{{ route('tasks.index') }}">Back to Tasks List</a>
</main>
</body>
</html>