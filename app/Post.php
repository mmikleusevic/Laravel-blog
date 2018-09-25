<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
	
	public function comments()
	{

		return $this->hasMany(Comment::class);

	}

	public function user()
    {

    	return $this->belongsTo(User::class);

    }

	public function addComment($body)
	{
		$user_id = $this->user_id;
		$this->comments()->create(compact('user_id', 'body'));
	}
	public function scopeFilter($query, $filters)
	{

		if($month = $filters['month']) {
			$query->whereMonth('created_at', Carbon::parse($month)->month);
		}

		if($year = $filters['year']) {
			$query->whereYear('created_at', $year);
		}
	}

	public static function archives()
	{
		return static::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
		->groupBy('year','month')
		->orderbyRaw('min(created_at) desc')
		->get()
		->toArray();
	}

	public function tags()
	{
		//	n: n

		return $this->belongsToMany(Tag::class);
	}
}