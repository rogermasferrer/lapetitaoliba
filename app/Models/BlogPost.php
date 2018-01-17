<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
	public function images() {
		return $this->belongsToMany('App\Models\Image');
	}
}
