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
            @guest
                @if (Route::has('login'))
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            @else
                <a href="{{ route('tasks.index') }}">Tasks List</a>
                <a id="navbarDropdown"  href="{{ route('mypage.show', Auth::user()->id ) }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}'s Page
                </a>
            @endguest
        </div>
    </header>
    
    <div class="main">Edit</div>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Title （less than 30 characters）</label>
            <input type="text" class="form-control" value="{{ $task->title }}" name="title">
            @if ($errors->has('title'))
              <p id="error">ERROR!{{$errors->first('title')}}</p>
            @endif
        </div><br>
        <div class="container">
            <label>Content（less than 140 characters）</label>
            <br>
            <textarea class="form-control" rows="5" name="contents">{{ $task->contents }}</textarea>
            @if ($errors->has('contents'))
              <p id="error">ERROR!{{$errors->first('contents')}}</p>
            @endif
        </div>
        <div class="container">
            <label>Image file（Maximum 2MB）</label>
            <br>
            <img src="{{ asset('storage/image/'.$task->image_at) }}" width="200">
            <br>
            <input type="file" name="image_at" value="{{ $task->image_at }}">
            @if ($errors->has('image_at'))
              <p id="error">ERROR!{{$errors->first('image_at')}}</p>
            @endif
        </div>
        <div class="container">
            <button type="submit">Edit</button>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">
            <div class="back">Back</div>
        </a>
    </form>
</body>
</html>