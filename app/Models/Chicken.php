<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chicken extends Model
{
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
