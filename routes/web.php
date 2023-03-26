<?php

use App\Http\Controllers\CommentController;
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


    //* remove old posts by queue jobs
    Route::get("/posts/removeOld",[PostController::class,"removePosts"]);


//* (name('posts.index')) ==> is alias name for route && we use it in front-end as {{route('posts.index')}}
//* ->middleware(['auth']) and make anyone who isn’t authenticated to redirect back to login page
//Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware(['auth']);


//* to make group of routes to apply the same middlewares on it
Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::get("/posts/{post}/edit", [PostController::class, 'edit'])->name(('posts.edit'));

    Route::put("/posts/{post}", [PostController::class, 'update'])->name('posts.update');

    Route::delete("/posts/{post}", [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/comments', [CommentController::class, "store"])->name("comments.store");




});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
