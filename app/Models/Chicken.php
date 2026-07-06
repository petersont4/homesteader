<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chicken extends Model
{
	use HasFactory;
	
	protected $fillable = [
		'chicken_identifier',
		'egg_color',
		'breed',
		'hatch_date',
	];

	public function eggs()
	{
		return $this->hasMany(Egg::class, 'laid_by');
	}
}
