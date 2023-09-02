<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        //dd($posts);
        return view('post.index',compact('posts'));//pass datas into view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        //validation
        $request -> validate([
            "title" => 'required|min:5',
            "body" => 'required|min:10',
            "image" => 'required|mimes:jpeg,bmp,png,jpg',
            "category" => 'required'
        ]);
        //dd($request);
        //File Upload if file exist
        if($request->hasfile('image')){
            $photo = $request -> file('image');
            $name = time().'.'.$photo ->getClientOriginalExtension();
            $photo -> move(public_path().'/storage/image/',$name);
            $photo = '/storage/image/'.$name;
        }else{
            $photo = '';
        }
        //dd($photo);
        //Store Data
        $post = new Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->image = $photo;
        $post->category_id = request('category');
        $post->user_id = Auth::id();
        $post->save();
        //Redirect
        return redirect()->route('my_post.index');
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
        //$user = User::find($id);
        //dd($post);
        return view('post.detail',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::find($id);
        return view('post.edit',compact('post','categories'));
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
        //dd($request);
        //validation
        $request -> validate([
            "title" => 'required|min:5',
            "body" => 'required|min:10',
            "image" => 'sometimes|mimes:jpeg,bmp,png,jpg',
            "category" => 'required'
        ]);
        //file upload
        if($request->hasfile('image')){
            $photo = $request -> file('image');
            $name = time().'.'.$photo ->getClientOriginalExtension();
            $photo -> move(public_path().'/storage/image/',$name);
            $photo = '/storage/image/'.$name;
        }else{
            $photo = request('oldimg');
        }
        //update data
        $post = Post::find($id);
        $post->title = request('title');
        $post->body = request('body');
        $post->image = $photo;
        $post->category_id = request('category');
        $post->user_id = Auth::id();
        $post->save();
        //redirect
        return redirect()->route('my_post.show',$id);
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
        return redirect()->route('my_post.index');
    }
}
