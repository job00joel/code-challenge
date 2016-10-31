<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;


class Url extends Model
{
	protected $table = 'urls';

	protected $fillable = [ 'url', 'code', 'creation_ip' ];


	public function views()
	{
		return $this->hasMany( 'App\View' );
	}

	public function getGeneratedUrlAttribute()
	{
		return \URL::to('/') . '/' . $this->code;
	}

	public function getInfoUrlAttribute()
	{
		return \URL::to('/') . '/info/' . $this->code;
	}
}
