<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Harvest;

class Plant extends Model
{
    protected $fillable = [
        'type',
        'garden_location',
        'price',
        'purchase_date',
        'ground_date',
        'purchase_location',
        'purchased_type',
        'harvest_unit',
    ];

    public function garden()
    {
        return $this->belongsTo(GardenPlot::class, 'garden_location');
    }

    public function harvests()
    {
        return $this->hasMany(Harvest::class, 'plant_id');
    }
}
