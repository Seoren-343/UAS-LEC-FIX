<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusImage extends Model
{
    use HasFactory;
    protected $fillable = ['bus_id', 'image_path'];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
