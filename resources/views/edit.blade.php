<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
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
    
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>タイトル</label>
            <input type="text" class="form-control" value="{{ $task->title }}" name="title">
        </div>
        <div class="container">
            <label>内容</label>
            <br>
            <textarea class="form-control" rows="5" name="contents">{{ $task->contents }}</textarea>
        </div>
        <div class="container">
            <label>画像ファイル</label>
            <br>
            <input type="file" name="image_at">
        </div>
        <div class="container">
            <button type="submit">変更</button>
        </div>
    </form>
</body>
</html>