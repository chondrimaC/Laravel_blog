<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Session;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->simplePaginate(3);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'body' => 'required'
        ]);

        $posts = new Post;
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->body = $request->body;
        $posts->save();

        Session::flash('success', 'The Blog Post is succesfully created! ');

        return redirect()->route('posts.show', $posts->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // /************ This is best *********************/
        // $this->validate($request, [
        //     'title' => 'required|max:255',
        //     'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug,'. $id,
        //     'body' => 'required'
        // ]);
        // /*********************************/

        $posts = Post::find($id);

        if ($request->input('slug') == $posts->slug) {
            $this->validate($request, [
                'title' => 'required|max:255',
                'body' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'title' => 'required|max:255',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ]);
        }
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->slug = $request->input('slug');
        $posts->save();

        Session::flash('success', 'The Blog Post is succesfully saved! ');

        return redirect()->route('posts.show', $posts->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'The Blog Post is succesfully deleted! ');

        return redirect()->route('posts.index');
    }
}
