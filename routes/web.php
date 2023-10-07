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
    $posts = Post::paginate(10);
    return view('welcome', compact('posts'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('posts', function (Request $request){
    $search = $request->search;

    // simple query search
    $posts = Post::where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('body', 'LIKE', '%'.$search.'%')
            ->paginate(10);

    // scout database ,meilisearch and typesense
    //$posts = Post::search($search)->paginate(10);

    return view('partials.posts',  compact('posts'))->render();
});
