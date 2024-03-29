<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    //
    public function index(){
      $posts = Post::latest()->get();
      // $posts = [];
      // dd($posts->toArray());
      return view('posts.index')->with('posts' , $posts);
    }


    public function show(Post $post){
      // $post = Post::findOrFail($id);
      return view('posts.show')->with('post' , $post);
  }
  public function create(Post $post){
      return view('posts.create');
  }
  public function store(Request $request){
      $post = new Post();
      $post->title = $request->title;
      $post->body = $request->body;
      $post->save();
      return redirect('/');
  }
}
