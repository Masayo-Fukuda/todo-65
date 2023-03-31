<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
    <link rel="stylesheet" href="{{ 'css/edit.css' }}">
</head>
<body>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')  
        <div>
            <label>タイトル</label>
            <input type="text" class="form-control" value="{{ $task->title }}" name="title">
        </div>
        <div>
            <label>内容</label>
            <textarea class="form-control" rows="5" name="contents">{{ $task->contents }}</textarea>
        </div>
        <div>
            <label>画像ファイル</label>
            <input type="file">
        </div>
        <button type="submit">編集</button>
    </form>
        
</body>
</html>