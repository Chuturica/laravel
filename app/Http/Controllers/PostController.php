<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        // return view('posts.index', [
        //     'posts' => Post::latest()->filter(
        //                 request(['search', 'category', 'author'])
        //             )->paginate(18)->withQueryString()
        // ]);

        return view('posts.index', [
            'posts' => Post::latest()->filter(
                        request(['search', 'category']))->get()
        ]);

        // $posts = Post::latest();

        // if (request('search')){
        //     $posts->where('title', 'like', '%' . request('search') . '%')
        //     ->orWhere('body', 'like', '%' . request('search') . '%');
        // }

        // return view('posts',[
        //     'posts' => $posts->get(),
        //     'categories' => Category::all()
        // ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
}
