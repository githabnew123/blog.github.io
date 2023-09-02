<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Comment as CommentResource;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validatation
        //upload if file exist
        //store data
        $comment = new Comment();
        $comment->body = request('body');
        $comment->post_id = request('pid');
        $comment->user_id = Auth::id();
        $comment->save();
        //redirect
        return 'Successfully Inserted';
        //return "hello";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getcomments(Request $request)
    {
        $pid = request('pid');
        $comments = Comment::where('post_id',$pid)->get();
        //$num = $comments[0][3]['user_id'];
        //$name = User::find($num);
        //$comments[1] = $name;
        return CommentResource::collection($comments);
    }
}
