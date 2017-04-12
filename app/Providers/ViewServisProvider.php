<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

class ViewServisProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layouts.app','App\Providers\ViewComposers\LeftmenuComposer');
    /**
     * Register the application services.
     *
     * @return void
     */
	}
    public function register()
    {
        //
    }

}
