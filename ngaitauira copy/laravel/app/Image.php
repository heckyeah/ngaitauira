<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	public $table = 'images';

	public function events() {
		return $this->belongsToMany('App\Event', 'events_images');
	}
}