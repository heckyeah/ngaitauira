<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
	public $table = 'events';
	public $timestamps = true;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['content','title','start_date','end_date','start_time','end_time'];

	public function images() {
		return $this->belongsToMany('App\Image', 'events_images');
	}

	public function locations() {
		return $this->hasOne('App\Location');
	}

	public function users() {
		return $this->belongsTo('App\User');
	}

	public function events() {
        return $this->hasMany('App\Event');
    }
}