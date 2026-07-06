<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Plant;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GardenPlot extends Model
{
    use HasFactory;
    protected $fillable = [
        'plot_location',
        'plot_garden',
    ];

    public function garden()
    {
        return $this->belongsTo(Garden::class, 'plot_garden');
    }

    public function plants()
    {
        return $this->hasMany(Plant::class, 'garden_location');
    }
}
