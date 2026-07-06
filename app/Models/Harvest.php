<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Harvest extends Model
{
    use HasFactory;
    protected $fillable = [
        'plant_id',
        'weight',
        'harvest_date',
    ];

    public function plants()
    {
        return $this->belongsTo(Plant::class, 'plant_id');
    }
}
