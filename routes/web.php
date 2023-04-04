<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// タスクの検索
Route::post('/tasks',[App\Http\Controllers\TaskController::class, 'search'])->name('tasks.search');

// タスクの CRUD
Route::get('/tasks',[App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create',[App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks',[App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}/edit',[App\Http\Controllers\TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}',[App\Http\Controllers\TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}',[App\Http\Controllers\TaskController::class, 'destroy'])->name('tasks.destroy');

//コメント機能
Route::get('/comments/create/{task_id}',[App\Http\Controllers\CommentController::class, 'create'])->name('comments.create');
Route::post('/comments/store',[App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{id}', [App\Http\Controllers\CommentController::class, 'index'])->name('comments.index');

// bookmark
Route::post('/bookmarks', [App\Http\Controllers\BookmarksController::class, 'store'])->name('bookmarks.store');

Route::delete('/bookmarks/{bookmark}', [App\Http\Controllers\BookmarksController::class, 'destroy'])->name('bookmarks.destroy');

// マイページ
Route::get('/mypage/{id}', [App\Http\Controllers\MypageController::class, 'show'])->name('mypage.show');



// Route::get('/tasks/create',[App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
// Route::post('/tasks',[App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
// Route::delete('/bookmarks/{bookmark}', [App\Http\Controllers\BookmarksController::class, 'destroy'])->name('bookmarks.destroy');
