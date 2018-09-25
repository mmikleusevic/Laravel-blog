<?php

namespace App;

class Tag extends Model
{
    public function posts()
	{
		//	n: n

		return $this->belongsToMany(Post::class);
	}

	public function getRouteKeyName()
	{
		return 'name';
	}
}
