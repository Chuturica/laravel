<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

// Route::get('/', function () {
//     return view('test');
// });

Route::get('/', function () {
    return view('posts',[
        'posts' => Post::latest()->get(),
        'categories' => Category::all()
    ]);
})->name('home');

Route::get('/posts/{post:slug}', function (Post $post) {
    // find a post by it slug and pass it to view called "post"
    //$post =  Post::find($slug);
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function(Category $category){
    return view('posts',[
        'posts' => $category->posts,
        'currentCategory'=> $category,
        'categories' => Category::all()
    ]);
}
)->name('category');

Route::get('authors/{author:username}', function(User $author){
    return view('posts',[
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
}
);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login',[SessionsController::class, 'create'])->middleware('guest');
Route::post('login',[SessionsController::class, 'store'])->middleware('guest');

Route::post('logout',[SessionsController::class, 'destroy'])->middleware('auth');

// Admin Section
Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});
