<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PostsController;
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

Route::resource('/posts', PostsController::class)
   ->middleware(['auth']);

Route::get('/', function () {
    return view('dashboard');
    })
    ->middleware(['auth'])->name('dashboard');

Route::post('/like/{post}',[LikesController::class,"store"])
            ->middleware(['auth'])->name('like.store');


require __DIR__.'/auth.php';

Route::get('/comments/{commentId}',[CommentsController::class,'index'])
    ->name('comments.index');
Route::delete('/comments/{commentId}',[CommentsController::class,'destroy'])
    ->name('comments.delete');
Route::post('/comments/{postId}',[CommentsController::class,'store'])
    ->name('comments.store');
Route::patch('/comments/{commentId}',[CommentsController::class,'update'])
    ->name('comments.update');
