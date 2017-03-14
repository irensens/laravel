<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Books extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'books';
    
    protected $fillable = [
          'name',
          'author',
          'year',
          'publisher',
          'catalogs_id',
          'user_id',
          'body',
          'price',
          'picture',
          'showhide',
          'url'
    ];
    
    public static $showhide = ["show" => "show", "hide" => "hide", ];


    public static function boot()
    {
        parent::boot();

        Books::observe(new UserActionsObserver);
    }
    
    public function catalogs()
    {
        return $this->hasOne('App\Catalogs', 'id', 'catalogs_id');
    }


    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    
    
    
}