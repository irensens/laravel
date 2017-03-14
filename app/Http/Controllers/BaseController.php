<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
class BaseController extends Controller
{
    public function getIndex(){
		$books = Books::where('showhide','show')->orderBy('id','DESC')->limit(8)->get();
		return view('index')->with('books',$books);
	}
	//
}

