<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status',
        'inventory_type',
        'date',
    ];

    public function property() {
        return $this->belongsTo('App\Models\Property\Property');
    }
}
