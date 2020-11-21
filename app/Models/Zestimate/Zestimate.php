<?php

namespace App\Models\Zestimate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zestimate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'zestimate'
    ];

    public function property() {
        return $this->belongsTo('App\Models\Property\Property');
    }
}
