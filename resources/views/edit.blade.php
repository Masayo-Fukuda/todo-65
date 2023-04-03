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
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>タイトル（30文字以内）</label>
            <input type="text" class="form-control" value="{{ $task->title }}" name="title">
            @if ($errors->has('title'))
              <p id="error">ERROR!{{$errors->first('title')}}</p>
            @endif
        </div>
        <div class="container">
            <label>内容（140文字以内）</label>
            <br>
            <textarea class="form-control" rows="5" name="contents">{{ $task->contents }}</textarea>
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
            <button type="submit">変更</button>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">
            <div class="back">戻る</div>
        </a>
    </form>
</body>
</html>