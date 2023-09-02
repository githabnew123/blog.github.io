<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /*public function __construct(){
        $this->middleware('role:admin');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        //dd($posts);
        return view('category.index',compact('categories'));//pass datas into view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            "c_name" => 'required',
        ]);
        //dd($request);
        //File Upload if file exist
        //dd($photo);
        //Store Data
        $category = new Category;
        $category->name = request('c_name');
        $category->created_at = NOW();
        $category->updated_at = NOW();
        $category->save();
        //Redirect
        return redirect()->route('category.index')->with('status','Successfully Inserted');
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
        $category = Category::find($id);
        return view('category.edit',compact('category'));
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
            "c_name" => 'required',
        ]);
        //file upload
        //update data
        $category = Category::find($id);
        $category->name = request('c_name');
        $category->updated_at = NOW();
        $category->save();
        //redirect
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
