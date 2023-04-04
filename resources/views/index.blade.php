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
        <header>
            <div class="left">
                <a href="{{ url('/') }}">
                    ToDo
                </a>
            </div>
            <div class="right">
                <a href="{{ route('tasks.index') }}">投稿一覧へ</a>
                @guest
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">{{ __('Register') }}</a>
                    @endif
                @else
                    <a id="navbarDropdown"  href="{{ route('mypage.show', Auth::user()->id ) }}" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}さんのマイページ
                    </a>
                @endguest
            </div>
        </header>

    <main>
        <a href="{{ route('tasks.index') }}" class="main" id="title">投稿一覧</a>

        <form action="{{ route('tasks.index') }}" method="get">
            <input type="text" name="keyword" value="{{ $keyword }}">
            <input type="submit" value="検索">
        </form>

        @foreach ($tasks as $task )
                <div class="main">
                    <h1>タスクの題名: {{ $task->title }}</h1>
                    <p>タスクの説明文:{{ $task->contents }}</p>
                    <p>タスク製作者:{{ $task->user->name }}</p>
                    {{-- 画像 --}}
                    <img src="{{ asset('storage/image/'.$task->image_at) }}" alt="{{ $task->title }}" width="200">
                    <hr>
                    {{-- 編集 --}}
                    @if (Auth::check() && $task->user_id === Auth::id() )
                    <a href="{{ route('tasks.edit', $task) }}">編集</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value='削除' onclick="return confirm('本当に削除しますか？');">
                    </form>
                @endif
                <br>
                    {{-- </form> --}}
                    {{-- コメント系 --}}
                    <button type="button" onclick="location.href='{{ route('comments.create', $task->id) }}'">コメントする</button>
                    <a href="{{ route('comments.index', $task->id) }}">コメントを見る</a>
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

            <div class=main>
                <a href="{{ route('tasks.create') }}" >新規投稿</a>    
            </div>
            
            {{ $tasks->links() }}
    </main>
    </body>
</html>