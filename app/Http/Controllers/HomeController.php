<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
	 public function postIndex()
    {
		$str = '';
		foreach($_POST as $key=>$value){
			$id = (int) $key;
			if($id>0){
				$str .= $key.',';
			}
			
			
		} 
		$obj = new Order;
		$obj->body = $str;
		$obj->name = $_POST['name'];
		$obj->phone = $_POST['phone'];
		$obj->adress = $_POST['address'];
		$obj->status = 'new';
		$obj->save();
		setcookie('basket','');
		return redirect('/thankyoupage');
       //dd($_POST);
    }
}
