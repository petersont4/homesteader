<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Egg extends Model
{
	protected $fillable = [
		'laid_by',
		'egg_color',
		'laid_date_time',
		'good_egg',
		'notes'
	];
	
	public function chicken()
	{
		return $this->belongsTo(Chicken::class, 'laid_by');
	}
}
