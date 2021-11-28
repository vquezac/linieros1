<?php

namespace App\Http\Controllers;

use App\Material;
use App\ProjectMaterial;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProjectMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectMaterial  $projectMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectMaterial $projectMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectMaterial  $projectMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectMaterial $projectMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectMaterial  $projectMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectMaterial $projectMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectMaterial  $projectMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectMaterial $projectMaterial)
    {
        //
    }

    /**
     * @throws \Exception
     */
    public function getProjectMaterials(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = ProjectMaterial::all()->where('project_id','=',$id);
            //$data = ProjectMaterial::all();
            //dd( DataTables::of($data)
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
