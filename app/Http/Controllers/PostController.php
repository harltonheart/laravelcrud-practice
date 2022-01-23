<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');

        $posts = Post::whereIn('user_id', $users)->latest()->get();

        return view('posts.index', [
            'posts' => $posts,
            
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => 'required',
            'message' => 'required'
        ]);

       
        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'message' => $data['message'],
         ]);

        return redirect('/profile/'. auth()->user()->id);

        // dd(request()->all());
    }

    public function show(Post $posts) //it means they get the full details of your post into database
    {
        return view('posts.show', [
            'posts' => $posts,  //this variable must same variable in parameter func
            
        ]);
    }

    public function edit(Post $posts)
    {
        $posts = Post::get();
        return view('posts.edit', compact('posts'));
    }

    public function update(Post $posts)
    {
        $posts->update(request()->all());


        return back();
    }
    public function destroy(Post $posts)
    {
        $posts->delete();

        return back();
    }

}
