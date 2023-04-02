<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmarks;

class BookmarksController extends Controller
{
    public function store(Request $request)
    {
        $bookmark = new Bookmarks;
        $bookmark->task_id = $request->task_id;
        $bookmark->user_id = $request->user()->id;
        $bookmark->save();
        return back();
    }

    public function destroy(Bookmarks $bookmark)
    {
        $bookmark->delete();
        return back();
    }
}