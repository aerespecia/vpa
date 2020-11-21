<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    public function agentProperty() {
        return $this->hasMany('AgentProperty');
    }

    public function agentDetail() {
        return $this->hasMany('AgentDetail');
    }
}
