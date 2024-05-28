<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'busfleet';
    protected $fillable = [
        'bus_picture',
        'bus_type',
        'specs',
    ];

    public function additionalImages()
    {
        return $this->hasMany(BusImage::class);
    }
}



