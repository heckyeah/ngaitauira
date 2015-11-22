<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{

	public $table = 'events_images';
	public $timestamps = false;

    public function images() {
        return $this->hasOne('App\Image', 'id', 'image_id');
    }

    public function events() {
        return $this->belongsTo('App\Event');
    }


}
