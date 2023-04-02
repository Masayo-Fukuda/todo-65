<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create($task_id)
    {
        $tasks = Task::find($task_id);
        return view('comments.create', ['tasks'=>$tasks]);
    }

    public function store(Request $request)
    {
        $comments = new Comment;
        $comments -> body = $request ->body;
        $comments -> user_id = Auth::id();
        $comments -> task_id = $request -> task_id;
        $comments -> save();
        return redirect()->route('tasks.index');
    }

    public function index($id)
    {
        $comments = Comment::where('task_id', $id)->get();
        return view('comments.index', ['comments'=>$comments]);
    }
}
