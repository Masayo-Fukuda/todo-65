<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use Illuminate\Support\Facades\Auth;



class TaskController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks ]);
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
        $task = Task::find($id);
        return view('edit', ['task' => $task]);
    }

    function update(Request $request, $id)
    {
        $validator = $request->validate([
            'title' => ['required', 'max:30'],
            'contents' => ['required', 'max:140'],
        ]);

        $task = Task::find($id);
        $task -> title = $request -> title;
        $task -> contents = $request -> contents;
        $task -> save();

        return redirect()->route('tasks.index');
    }

    function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }

   


    function orderby()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();

        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    function search(Request $request)
    {
    $keyword = $request->input('keyword');
    $tasks = Task::where('title', 'LIKE', "%{$keyword}%")->get();
    return view('tasks.index', compact('tasks'));
    }


}
