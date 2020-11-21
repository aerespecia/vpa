<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'unit',
        'name',
    ];

    public function property() {
        return $this->hasMany('App\Models\Property\Property');
    }
}
