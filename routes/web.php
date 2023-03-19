<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    //* view() is global helper method
    return view('welcome');
});

//* (name('posts.index')) ==> is alias name for route && we use it in front-end as {{route('posts.index')}}

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::post('/posts',[PostController::class,'store'])->name('posts.store');

Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');



Route::get("/posts/{post}/edit",[PostController::class,'edit'])->name(('posts.edit'));

Route::put("/posts/{post}",[PostController::class,'update'])->name('posts.update');

Route::delete("/posts/{post}",[PostController::class,'destroy'])->name('posts.destroy');
