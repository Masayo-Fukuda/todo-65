<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bookmarks;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function show($id)
    {
        // $userId = Auth::user()->id;
        $tasks = Task::where('user_id', $id)->get();

        $bookmarks = Bookmarks::where('user_id', $id)->get();
        // dd($bookmarks);
        return view('mypage', compact('tasks', 'bookmarks'));

    }
}