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
  <div>コメント一覧</div>
  @foreach($comments as $comment)
    <p>投稿者:{{ $comment->user->name }}</p>
    <p>内容：{{ $comment->body }}</p>
  @endforeach
  <a href="{{ route('tasks.index') }}">投稿一覧へ</a>
</body>
</html>