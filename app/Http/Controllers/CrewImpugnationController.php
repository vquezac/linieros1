<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CrewImpugnationController extends Controller
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
     * @param  \App\Crew_Impugnation  $crewimpugnation
     * @return \Illuminate\Http\Response
     */
    public function show(Crew_Impugnation $crewimpugnation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crew_Impugnation  $crewimpugnation
     * @return \Illuminate\Http\Response
     */
    public function edit(Crew_Impugnation $crewimpugnation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crew_Impugnation  $crewimpugnation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crew_Impugnation $crewimpugnation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crew_Impugnation  $crewimpugnation
     * @return \Illuminate\Http\Response
     */
    public function destroy(CrewImpugnation $crewimpugnation)
    {
        //
    }

    public function getCrewImpugnations(Request $request, $id)
    {
        if ($request->ajax()) {
            $prj = Project::find($id);
            $data = $prj->section()->crew_sections()->crew()->crew_impugnation()->get();

            dd($data,DataTables::of($data)->make(true));
            //$data = ProjectMaterial::all()->where('project_id','=',$id);
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
