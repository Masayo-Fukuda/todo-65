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
        <a href="{{ route('tasks.index') }}">投稿一覧へ</a>
        @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif
            @if (Route::has('register'))
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <a id="navbarDropdown"  href="{{ route('mypage.show', Auth::user()->id ) }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}さんのマイページ</a>
        @endguest
    </div>
</header>

<main>
  <div class=main>
    <p class=title>コメント一覧</p>
</div>
  {{-- <h1>タスクの題名: {{ $task->title }}</h1>
  <p>タスクの説明文:{{ $task->contents }}</p> --}}
  <div class="main">
    @foreach($comments as $comment)
      <div>
        <p>投稿者:{{ $comment->user->name }}</p>
        <br>
        <p>コメント内容<br>{{ $comment->body }}</p>
      </div>
    @endforeach
</div>
  <a href="{{ route('tasks.index') }}">投稿一覧へ戻る</a>
</main>
</body>
</html>