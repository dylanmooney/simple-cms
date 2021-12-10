<?php

use App\Http\Controllers\AdminControllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\Post;
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
    return view('welcome', [
        'posts' => Post::latest()->take(3)->where('visible', 1)->get()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('posts.detail', [
        'post' => $post
    ]);
})->name("posts");;

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'can:admin']], function () {
    Route::resource('posts', PostController::class);
});

Route::post('/posts/{post}/comments/', [CommentController::class, 'store'])
    ->middleware(['auth'])
    ->name('comments.store');





require __DIR__ . '/auth.php';
