<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\BookmarksController;
use App\Http\Controllers\MypageController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');


// タスクの検索
Route::post('/tasks',[TaskController::class, 'search'])->name('tasks.search');

// タスクの CRUD
Route::get('/tasks',[TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create',[TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks',[TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}/edit',[TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{id}',[TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}',[TaskController::class, 'destroy'])->name('tasks.destroy');

//コメント機能
Route::get('/comments/create/{task_id}',[CommentController::class, 'create'])->name('comments.create');
Route::post('/comments/store',[CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{id}', [CommentController::class, 'index'])->name('comments.index');

// bookmark
Route::post('/bookmarks', [BookmarksController::class, 'store'])->name('bookmarks.store');

Route::delete('/bookmarks/{bookmark}', [BookmarksController::class, 'destroy'])->name('bookmarks.destroy');

// マイページ
Route::get('/mypage/{id}', [MypageController::class, 'show'])->name('mypage.show');



// Route::get('/tasks/create',[App\Http\Controllers\TaskController::class, 'create'])->name('tasks.create');
// Route::post('/tasks',[App\Http\Controllers\TaskController::class, 'store'])->name('tasks.store');
// Route::delete('/bookmarks/{bookmark}', [App\Http\Controllers\BookmarksController::class, 'destroy'])->name('bookmarks.destroy');
