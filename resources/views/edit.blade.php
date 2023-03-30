<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit</title>
</head>
<body>
    <div class="header-left">
        <img class="logo" src="./logo.png" alt="">
    </div>
    <div class="header-right">
        <ul class="nav">
            <li><a href="#">ユーザA</a></li>
        </ul>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>タイトル</label>
                    <input type="text" class="form-control" value="{{ $task->title }}" name="title">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <textarea class="form-control" rows="5" name="contents">{{ $task->contents }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label>画像ファイル</label>
                    <input type="file">
                </div>
                <button type="submit" class="btn btn-primary">編集</button>
            </form>
        </div>
    </div>
  </div>
</body>
</html>