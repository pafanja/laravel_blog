<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class MainController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('site.index',compact('posts'));
    }
    public function show($id)
    {
        $comments=Post::find($id)->comments()->get();
        $post=Post::find($id); //показываем статью если она опубликована
        return view('site.show',compact('post','comments'));
    }
}
