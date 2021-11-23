<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public function project(){
        return $this->hasOne(Project::class);
    }

    public function supervisor(){
        return $this->hasOne(Supervisor::class);
    }

    public function crew_sections(){
        return $this->belongsTo(Crew_Section::class);
    }




}
