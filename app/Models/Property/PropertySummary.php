<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertySummary extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_price_id'
    ];

    public function property() {
        return $this->belongsTo('App\Models\Property\Property');
    }

    public function propertyPrice() {
        return $this->belongsTo('App\Models\Property\PropertyPrice');
    }
}
