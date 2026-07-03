<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Garden extends Model
{
    protected $fillable = [
        'garden_name',
    ];

    public function gardenPlots()
    {
        return $this->hasMany(GardenPlot::class, 'plot_garden');
    }
}
