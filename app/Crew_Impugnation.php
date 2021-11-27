<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew_Impugnation extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function crew(){
        return $this->belongsTo(Crew::class);
    }
}
