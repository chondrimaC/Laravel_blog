<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        return view('pages.welcome')->with('posts', $posts);
    }

    public function getAbout(){
        $first = "Chondrima";
        $last = "Chowdhury";
        $full = $first . " " . $last;
        $email = "chondrima.chowdhury@gmail.com";
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $full;

        // return view('pages/about')->with('fullname', $full);
        // return view('pages/about')->withFullname($full)->withEmail($email);
        // return view('pages/about')->withData($data);
        // return view('pages/about', compact('full', 'email'));
        return view('pages/about', ['fullname' => $full, 'email' => $email]);

    }

    public function getContact(){
        return view('pages/contact');
    }
}
