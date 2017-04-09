<?php

namespace App\Providers\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Catalogs;

class LeftmenuComposer
{
	public function compose(View $view){
	$cats = Catalogs::where('parent_id',0)->where('showhide','show')->get();
	$view->with('cats', $cats);
	}
}
