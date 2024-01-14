<?php

use App\Models\Post;
use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::get('/create/post', function(Request $request) {
    $post = new Post();
    $post->title = 'my first post';
    $post->slug = 'my-first-post';
    $post->online = 1;
    $post->content = 'my content post';
    $post->save();
});


Route::get('/posts/list', function (Request $request) {
    return Post::all();
});

Route::get('/posts/{id}', function (Request $request, int $id) {
    return Post::find($id);
});

Route::get('/posts', function(Request $request) {
    return Post::where('created_at', '<', now())->orderBy('created_at', 'desc')->get();
});