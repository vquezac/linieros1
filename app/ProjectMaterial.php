<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMaterial extends Model
{
    use HasFactory;

    public $timestamps = false;

    // MODEL RELATIONS

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function material(){
        return $this->belongsTo(Material::class);
    }
}
