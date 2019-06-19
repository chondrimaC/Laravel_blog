<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function getIndex(){
        $posts = Post::paginate(2);
        return view('blog.index')->with('posts', $posts);
    }
    public function getSingle($slug){
        $post = Post::where('slug', '=', $slug)->firstOrFail();
        return view('blog.single')->with('post', $post);
    }
}
