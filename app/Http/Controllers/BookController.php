<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
class BookController extends Controller
{
    public function getOne($id=0){
		$book=Books::find($id);
		return view('book')->with('book',$book);
	}
}
