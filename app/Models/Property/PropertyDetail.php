<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'bed_room',
        'bath_room',
        'lot_size',
        'sq_ft'
    ];


    public function property() {
        return $this->belongsTo('App\Models\Property\Property');
    }
}
