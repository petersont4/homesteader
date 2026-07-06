<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Garden extends Model
{
    use HasFactory;
    protected $fillable = [
        'garden_name',
    ];

    public function gardenPlots()
    {
        return $this->hasMany(GardenPlot::class, 'plot_garden');
    }
}
