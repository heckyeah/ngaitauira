<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

	public $table = 'locations';
	public $timestamps = false;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['number','street','suburb','area','country'];

	public function images() {
		return $this->belongsToMany('App\Image', 'events_images');
	}

	public function locations() {
		return $this->belongsTo('App\Location', 'locations');
	}

	public function users() {
		return $this->belongsTo('App\User');
	}

	public function events() {
        return $this->hasMany('App\Event');
    }

}