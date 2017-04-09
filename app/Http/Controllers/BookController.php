<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books;
use App\Catalogs;
class BookController extends Controller
{
    public function getOne($id=0){
		$book=Books::find($id);
		return view('book')->with('book',$book);
	}
	public function getCat($id=0){
		$books=Books::where('catalogs_id', $id)->get();
		$cat=Catalogs::find($id);
		return view('books')->with('books',$books)->with('cat', $cat);
	}
}
