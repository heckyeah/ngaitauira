<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{


	public $table = 'pages';
	public $timestamps = false;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content','title'];

	public function images() {
		return $this->belongsToMany('App\Image', 'pages_images');
	}

	public function users() {
		return $this->belongsTo('App\User');
	}

	public function pages() {
        return $this->hasMany('App\Page');
    }

}