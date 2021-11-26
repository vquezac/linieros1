<?php

namespace App\Http\Controllers;

use App\Material;
use App\Project;
use App\Section;
use App\Supervisor;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::all();
        $user= User::find(auth()->user()->id);
        $materials = Material::all();
        $supervisores = Supervisor::all();

        return view('project', compact('projects','user', 'materials', 'supervisores'));
    }

    public function getProjects(Request $request)
    {
        if ($request->ajax()) {
            $data = Project::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('estado', function($row){
                    switch($row->estado){
                        case 0:
                            return "Creado";
                        case 1:
                            return "En proceso";
                        case 2:
                            return "Terminado";
                    }
                })
                ->addColumn('Accion', function($row){
                    $actionBtn = ' <a href="'.route('project.edit',[$row->id]).'" class="edit btn btn-success btn-sm">Editar</a> ';
                    return $actionBtn;})
                ->rawColumns(['Accion'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('projectNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required|max:250',
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_ini'
        ]);

        $prj = new Project();
        $prj->descripcion = $request->descripcion;
        $prj->fecha_inicio = $request->fecha_ini;
        $prj->fecha_fin = $request->fecha_fin;
        $prj->save();

        return redirect()->route('project.create')
            ->with('success','Proyecto '.$prj->descripcion.' creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Project $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $projects
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(int $projects)
    {
        $project= Project::all()->find($projects);
        $materials = Material::all();
        $sections = Section::all();
        return view('projectEdit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function update(Request $request, Project $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $projects
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function destroy(Project $projects)
    {
        //
    }
}
