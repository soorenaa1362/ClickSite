<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        return view('post.index');
    }


    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
               
        $post = new Post();
        $post->user_id = $user_id;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();
        return redirect()->route('post.list');
    }



    public function list()
    {
        return view('post.list');
    }



}
