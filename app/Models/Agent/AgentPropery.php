<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentPropery extends Model
{
    use HasFactory;

    public function agent() {
        return $this->belongsToMany('Agent');
    }

    public function property() {
        return $this->belongsToMany('Property');
    }
}
