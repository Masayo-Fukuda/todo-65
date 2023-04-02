<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <div>投稿一覧</div>
    <form action="{{ route('tasks.index') }}" method="get">
        <input type="text" name="keyword">
        <input type="submit" value="検索">
    </form>

    @foreach ($tasks as $task )
    <div>
        <h1>タスクの題名: {{ $task->title }}</h1>
        <p>タスクの説明文:{{ $task->contents }}</p>
        {{-- 画像 --}}
        <img src="{{ asset('storage/image/'.$task->image_at) }}" alt="{{ $task->title }}" width="200">
        {{-- <img src="{{ route('task->img_at') }}" alt="画像の説明"> --}}
        {{-- <img src="{{ asset('images/' . $task->image) }}" alt="{{ $task->title }}" width="200px"> --}}
        {{-- 編集 --}}
        <a href="{{ route('tasks.edit',$task->id) }}" >編集する</a>
        {{-- 削除 --}}
        <form action='{{ route('tasks.destroy',$task->id) }}' method='post'>
            @csrf
            @method('delete')
            <input type='submit' value='削除'  onclick='return confirm("本当に削除しますか？");'>
        </form>
    </div>
    @endforeach



    <div>
        <a href="{{ route('tasks.create') }}" >
        新規投稿
        </a>    
    </div>
</body>

</html>