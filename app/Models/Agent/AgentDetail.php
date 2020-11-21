<?php

namespace App\Models\Agent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentDetail extends Model
{
    use HasFactory;

    public function agent() {
        return $this->belongsTo('Agent');
    }
}
