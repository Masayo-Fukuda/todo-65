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
        <div>マイページ</div>
        
        
        @foreach ($tasks as $task )
            {{-- @if (strpos($task->title, $keyword) !== false || strpos($task->contents, $keyword) !== false) --}}
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
                    
                    {{-- ブックマークの追加・削除ボタン --}}
                    @if ($task->bookmarkedBy(auth()->user()))
                    {{-- ブックマーク済みの場合 --}}
                    <form action="{{ route('bookmarks.destroy', $task->bookmarkByUser(auth()->user())) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">ブックマークから削除する</button>
                    </form>
                    @else
                    {{-- ブックマークされていない場合 --}}
                    <form action="{{ route('bookmarks.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                    <button type="submit">ブックマークする</button>
                    </form>
                    @endif
                </div>
            {{-- @endif --}}
        @endforeach

        <div>ブックマーク一覧</div>
        @foreach ($bookmarks as $bookmark)
        {{-- 投稿者、題名、内容、写真 --}}
                <div>
                    <p>投稿者名：{{ $bookmark->user->name }}</p>
                    <p>題名：{{ $bookmark->task->title }}</p>
                    <p>内容：{{ $bookmark->task->contents }}</p>
                    <img src="{{ asset('storage/image/'.$bookmark->task->image_at)}}" alt=""> 
                </div>

                
            
        @endforeach

    </body>
</html>
