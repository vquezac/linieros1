<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function fusion_splicer_inpugnation(){
        return $this->hasMany(Fusion_Splicer_Impugnation::class);
    }

    public function crew_impugnation(){
        return $this->hasMany(Crew_Impugnation::class);
    }

    public function project_material(){
        return $this->hasMany(Project_Material::class);
    }
}
