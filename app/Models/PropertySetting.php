<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_commission',
        'selling_concession',
        'closing_fees',
        'taxes',
        'construction_light',
        'construction_medium',
        'construction_heavy',
        'construction_groundup',
        'chosen_construction_cost'
    ];
}
