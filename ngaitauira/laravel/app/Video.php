<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $table = 'videos';
	public $timestamps = false;

	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['video', 'player', 'title', 'slug', 'description'];

	public function videos() {
		return $this->hasMany('App\Video', 'videos');
	}
}
