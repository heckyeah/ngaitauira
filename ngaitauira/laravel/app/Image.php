<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	public $table = 'images';
	public $timestamps = false;

    protected $fillable = ['image'];

	public function events() {
		return $this->hasMany('App\Event', 'events_images');
	}

	public function images() {
        return $this->hasMany('App\Image', 'images');
    }

}