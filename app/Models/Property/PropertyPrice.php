<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'price_per_square_foot',
        'listing_price',
        'original_listing_price',
        'purchase_price'
    ];

    public function propertySummary() {
        return $this->hasMany('App\Models\Property\PropertySummary');
    }
}
