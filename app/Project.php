<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public $timestamps = false;

    // MODEL RELATIONS

    public function project_material(){
        return $this->hasMany(Project_Material::class);
    }

    public function section(){
        return $this->hasMany(Section::class);
    }

    public function user(){
        return $this->belongsTo(User::class);

    }

}
