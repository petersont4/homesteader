<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Harvest extends Model
{
    protected $fillable = [
        'plant_id',
        'weight',
        'harvest_date',
    ];

    public function plants()
    {
        return $this->belongsTo(Plant::class);
    }
}
