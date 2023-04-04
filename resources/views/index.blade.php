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

    <main>
        <a href="{{ route('tasks.index') }}" class="main" id="title">Tasks List</a>

        <form action="{{ route('tasks.index') }}" method="get">
            <input type="text" name="keyword" value="{{ $keyword }}">
            <input type="submit" value="Serch">
        </form>

        @foreach ($tasks as $task )
                <div class="main">
                    <h1>Title: {{ $task->title }}</h1>
                    <p>Content:{{ $task->contents }}</p>
                    <p>User:{{ $task->user->name }}</p>
                    {{-- 画像 --}}
                    <img src="{{ asset('storage/image/'.$task->image_at) }}" alt="{{ $task->title }}" width="200">
                    <hr>
                    {{-- 編集 --}}
                    @if (Auth::check() && $task->user_id === Auth::id() )
                    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value='Delete' onclick="return confirm('Do you really want to delete this?');">
                    </form>
                @endif
                <br>
                    {{-- </form> --}}
                    {{-- コメント系 --}}
                    <button type="button" onclick="location.href='{{ route('comments.create', $task->id) }}'">Comment</button>
                    <a href="{{ route('comments.index', $task->id) }}">See Comments</a>
                    {{-- ブックマークの追加・削除ボタン --}}
                    @if ($task->bookmarkedBy(auth()->user()))
                    {{-- ブックマーク済みの場合 --}}
                    <form action="{{ route('bookmarks.destroy', $task->bookmarkByUser(auth()->user())) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete from Bookmarks</button>
                    </form>
                    @else
                    {{-- ブックマークされていない場合 --}}
                    <form action="{{ route('bookmarks.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                    <button type="submit">Add to Bookmarks</button>
                    </form>
                    @endif
                </div>
            {{-- @endif --}}
        @endforeach

        {{ $tasks->links() }}

            <div class=main>
                <a href="{{ route('tasks.create') }}" >Creat New Task</a>    
            </div>
    </main>
    </body>
</html>