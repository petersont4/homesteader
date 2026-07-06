<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Egg extends Model
{
	use HasFactory;

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
