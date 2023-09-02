<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
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
        //
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
        return view('user.edit');
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
        //validation
        $request->validate([
            'profile' => 'sometimes|mimes:jpg,jpeg,png',
            'name' => 'required|min:5',
            'email' => 'required|email'
        ]);
        //if exit file, upload
        if ($request->hasfile('profile')) { 
            $photo = $request->file('profile');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path(),$name);
            $profile = $name;
        }else{
            $profile = request('oldprofile');
        }
        //Update Data
        $user = User::find($id);
        $user->name = request('name');
        $user->email = request('email');
        $user->avatar = $profile;
        $user->save();
        //redirect
        return redirect()->route('my_post.index');
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
}
