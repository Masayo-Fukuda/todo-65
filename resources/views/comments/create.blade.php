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
        <a href="{{ route('tasks.index') }}">Tasks List</a>
        @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        @else
            <a id="navbarDropdown"  href="{{ route('mypage.show', Auth::user()->id ) }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}'s Page
            </a>
        @endguest
    </div>
</header>


<main class=main>
  <div >
    <p class=flex id=black>Add a Comment</p>
    <div class=flex>
      <h1>Title: {{ $tasks->title }}</h1>
      <p>User:{{ $tasks->user->name }}</p>
      <p>Content:{{ $tasks->contents }}</p>
      <img src="{{ asset('storage/image/'.$tasks->image_at) }}" width="200">
      <form action="{{ route('comments.store') }}"  method="post">
        @csrf
        <input type="hidden" name="task_id" value="{{ $tasks->id }}">
        <textarea name="body" cols="50" rows="3" placeholder="Content"></textarea>
        @if ($errors->has('body'))
              <p id="error">ERROR!{{$errors->first('body')}}</p>
            @endif
        <br>
        <button type="submit">Add a Comment</button>
      </form>
    </div>
  </div>
</main>
  
</body>
</html>