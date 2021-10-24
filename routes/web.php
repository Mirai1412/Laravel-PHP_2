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

Route::resource('/comment/{id}', CommentsController::class)
   ->middleware(['auth']);
Route::get('/comments/{comment_id}',[CommentsController::class,'index'])->name('comments.index');
Route::delete('/comments/{comment_id}',[CommentsController::class,'destroy'])->name('comments.delete');
Route::post or put('/comments/{post_id}',[CommentsController::class,'store'])->name('comments.store');
