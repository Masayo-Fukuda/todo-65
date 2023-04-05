<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;



class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::latest()->simplepaginate(5);
        $keyword = $request->input('keyword');
    
        if (!empty($keyword)) {
            $tasks = Task::where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('contents', 'LIKE', "%{$keyword}%")
                ->latest()
                ->simplepaginate(5);
        }
    
        return view('index', compact('tasks', 'keyword'));

       
    }
    
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => ['required', 'max:30'],
            'contents' => ['required', 'max:140'],
            'image_at' => ['required', 'max:8192'],
        ]);

        $task = new Task;
        $task -> title = $request ->title;
        $task -> contents = $request -> contents;
        $task -> user_id = Auth::id();
        $image_path = $request->file('image_at')->store('public/image/');
        $task->image_at = basename($image_path);

        $task -> save();

        return redirect()->route('tasks.index');
    }

    public function edit($id)
{
    $task = Task::findOrFail($id);

    if ($task->user_id !== Auth::id()) {
        abort(403); // アクセス拒否
    }

    return view('edit', compact('task'));
}

    function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title' => ['required', 'max:30'],
            'contents' => ['required', 'max:140'],
            'image_at' => ['nullable', 'max:8192'],
        ]);

        $task = Task::find($id);
        $task -> title = $request -> title;
        $task -> contents = $request -> contents;
        // $image_path = $request->file('image_at')->store('public/image/');
        // $task->image_at = basename($image_path);
        // 画像ファイルが選択されている場合のみ、新しい画像ファイルを保存する
        if ($request->hasFile('image_at')) {
            $image_path = $request->file('image_at')->store('public/image/');
        $task->image_at = basename($image_path);
        }

        $task -> save();

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
    
        if ($task->user_id !== Auth::id()) {
            abort(403); // アクセス拒否
        }
    
        $task->delete();
    
        return redirect()->route('tasks.index');
    }

    function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $tasks = Task::where('title', 'LIKE', "%{$keyword}%")->get();
    return view('index', ['tasks'=>$tasks]);
    }
}
