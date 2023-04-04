<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
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
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <a href="{{ route('tasks.index') }}">投稿一覧</a>
                <a id="navbarDropdown"  href="{{ route('mypage.show', Auth::user()->id ) }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}さんのマイページ
                </a>
            @endguest
        </div>
    </header>

    <div class="main">新規投稿</div>
    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    <div class="parent"></div>
        <div class="container">
            <label class="aiueo">タイトル（30文字以内）</label>
            <input type="text" class="" placeholder="タイトルを入力して下さい" name="title">
            @if ($errors->has('title'))
              <p id="error">ERROR!{{$errors->first('title')}}</p>
            @endif
        </div>
        <div class="container">
            <label>内容（140文字以内）</label>
            <br>
            <textarea class="" placeholder="内容" rows="5" name="contents"></textarea>
            @if ($errors->has('contents'))
              <p id="error">ERROR!{{$errors->first('contents')}}</p>
            @endif
        </div>
        <div class="container">
            <label>画像ファイル（2MB以内）</label>
            <br>
            <input type="file" name="image_at">
            @if ($errors->has('image_at'))
              <p id="error">ERROR!{{$errors->first('image_at')}}</p>
            @endif
        </div>
        <div class="container">
            <button type="submit" class="">作成</button>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">
            <div class="back">戻る</div>
        </a>
    </div>
    </form>
</body>

</html>
