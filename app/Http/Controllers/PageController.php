<?php

namespace App\Http\Controllers;
use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex($id=null){
		$static=Page::where('url',$id)->first();
		return view('page')->with('static',$static);
		
	}
}
