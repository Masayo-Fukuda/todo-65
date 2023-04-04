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
        $tasks = Task::where('user_id', $id)->get();

        $bookmarks = Bookmarks::where('user_id', $id)->get();

        return view('mypage', compact('tasks', 'bookmarks'));

    }
}