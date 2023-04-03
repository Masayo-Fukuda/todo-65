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
  <h1>以下のタスクにコメントを追加</h1>
  <h1>タスクの題名: {{ $tasks->title }}</h1>
  <p>タスクの説明文:{{ $tasks->contents }}</p>
  <img src="{{ asset('storage/image/'.$tasks->image_at) }}" width="200">
  <hr>

  <form action="{{ route('comments.store') }}"  method="post">
    @csrf
    <input type="hidden" name="task_id" value="{{ $tasks->id }}">
    <label>コメント</label>
    <textarea name="body" cols="30" rows="10" placeholder="内容"></textarea>
    <button type="submit">コメントする</button>
  </form>
</body>
</html>