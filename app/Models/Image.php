<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	public function blogPosts() {
		return $this->belongsToMany('App\Models\BlogPost');
	}
}
