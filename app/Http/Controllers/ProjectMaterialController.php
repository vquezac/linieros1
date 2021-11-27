<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectMaterial;
use App\Material;

use Yajra\DataTables\DataTables;

class ProjectMaterialController extends Controller
{
    public function getProjectMaterials(Request $request)
    {

        if ($request->ajax()) {
            $data = ProjectMaterial::all()->where('project_id','equals',$request->project_id);


            return DataTables::of($data)
                ->addColumn(
                    'codigo',
                    function($row) {
                        return Material::find($row->material_id)->codigo;
                    }
                )
                ->addColumn(
                    'descripcion',
                    function($row) {
                        return Material::find($row->material_id)->descripcion;
                    }
                )
                ->addColumn('Accion', function($row){
                    $actionBtn = ' <a href="'.route('project.edit',[$row->id]).'" class="edit btn btn-success btn-sm">Editar</a> ';
                    return $actionBtn;})
                ->rawColumns(['Accion'])
                ->make(true);
        }
    }

}
