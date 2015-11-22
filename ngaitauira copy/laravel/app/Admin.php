<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
	public $table = 'events';

	public function images() {
		return $this->belongsToMany('App\Image', 'events_images');
	}
	public function users() {
		return $this->belongsTo('App\User');
	}
	public function events() {
        return $this->hasMany('App\Event');
    }
}