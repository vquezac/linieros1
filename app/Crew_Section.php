<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew_Section extends Model
{
    use HasFactory;

    public function section(){
        return $this->belongsTo(Section::class);
    }

    public function crew(){
        return $this->belongsTo(Crewn::class);
    }
}
