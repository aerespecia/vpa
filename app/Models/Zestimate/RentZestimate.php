<?php

namespace App\Models\Zestimate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentZestimate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'rent_zestimate'
    ];

    public function property() {
        return $this->belongsTo('App\Models\Property\Property');
    }
}
