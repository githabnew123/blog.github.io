<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
	public function index($value='')
    {
    	return view('index');
    }
    public function post($value='')
    {
    	return view('post');
    }
}
