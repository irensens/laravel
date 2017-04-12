<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Books;

class CookieServisProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
	
    public function boot()
    {
		View::composer(['home'],function($view){
		$str=$_COOKIE["basket"];
		$arr=explode(',',$str);
		$books=[];
		$couts=[];
		foreach ($arr as $key=>$value){
			if (isset($value)){
				$arr2=explode(':',$value);
				$id= (int)$arr2[0];
				if($id>0){
				$books[$id]=Books::find($id);
				$couts[$id] = $arr2[1];
				}
				
			}
		}
		$view->with('books',$books)->with('couts', $couts); 
		});
		
		
		
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
