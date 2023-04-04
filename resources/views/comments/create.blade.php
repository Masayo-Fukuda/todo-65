<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('css/comment.create.css') }}">
</head>
<body>
  <header>
    <div class="left">
        <a href="{{ url('/') }}">
            ToDo
        </a>
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
            <a id="navbarDropdown"  href="{{ route('mypage.show', Auth::user()->id ) }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}さんのマイページ
            </a>
        @endguest
    </div>
</header>


<main class=main>
  <div >
    <p class=flex id=black>以下のタスクにコメントを追加</p>
    <div class=flex>
      <h1>タスクの題名: {{ $tasks->title }}</h1>
      <p>投稿者:{{ $tasks->user->name }}</p>
      <p>タスクの説明文:{{ $tasks->contents }}</p>
      <img src="{{ asset('storage/image/'.$tasks->image_at) }}" width="200">
      <form action="{{ route('comments.store') }}"  method="post">
        @csrf
        <input type="hidden" name="task_id" value="{{ $tasks->id }}">
        <textarea name="body" cols="50" rows="3" placeholder="内容"></textarea>
        <br>
        <button type="submit">コメントする</button>
      </form>
    </div>
  </div>
</main>
  
</body>
</html>