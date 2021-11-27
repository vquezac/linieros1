<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function crew_section(){
        return $this->hasMany(Crew_Section::class);
    }

    public function crew_impugnations(){
        return $this->hasMany(Crew_Impugnation::class);
    }
}
