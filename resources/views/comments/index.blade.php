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
  <h1>コメント一覧</h1>
  <a href="{{ route('tasks.index') }}">投稿一覧へ戻る</a>
  
  @foreach($comments as $comment)
    <div>
      <p>投稿者:{{ $comment->user->name }}</p>
      <p>内容：{{ $comment->body }}</p>
    </div>
  @endforeach
</body>
</html>