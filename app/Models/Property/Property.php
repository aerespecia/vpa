<?php

namespace App\Models\Property;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    //protected $table = 'properties';

    protected $fillable = [
        'id',
        'address',
        'ml_number',
        'city',
        'zip_code',
        'year_built',
        'street_number',
        'street_name',
        'street_suffix',
        'state',
        'area',
        'district',
        'apn',
        'longitude',
        'listing_date',
        'latitude',
        'property_type_id',
        'zestimate_id',
        'corelogic_id'
    ];

    public function zestimates() {
        return $this->hasMany('App\Models\Zestimate\Zestimate');
    }

    public function rentZestimates() {
        return $this->hasMany('App\Models\Zestimate\RentZestimate');
    }

    public function propertySummary() {
        return $this->hasMany('App\Models\Property\PropertySummary');
    }

    public function propertyDetails() {
        return $this->hasMany('App\Models\Property\PropertyDetail');
    }

    public function propertyStatus() {
        return $this->hasMany('App\Models\Property\PropertyStatus');
    }

    public function sellerProperty() {
        return $this->hasMany('App\Models\Seller\SellerProperty');
    }

    public function agentProperty() {
        return $this->hasMany('App\Models\Agent\AgentProperty');
    }

    public function propertyType() {
        return $this->belongsTo('App\Models\Property\PropertyType');
    }

    public function calculation() {
        return $this->hasOne('App\Models\Calculation');
    }

    public function propertySetting() {
        return $this->hasOne('App\Models\PropertySetting');
    }

    public function setting() {
        return $this->hasOne('App\Models\Setting');
    }

}
