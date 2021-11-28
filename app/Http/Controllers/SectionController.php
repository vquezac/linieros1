<?php

namespace App\Http\Controllers;

use App\Project;
use App\Section;
use Illuminate\Http\Request;
use App\Supervisor;
use Yajra\DataTables\DataTables;

class SectionController extends Controller
{
    public function index(Request $request)
    {
        //
    }


    public function getSections(Request $request, $id)
    {
        if ($request->ajax()) {
            $prj = Project::find($id);
            $data = $prj->section()->get();
            $table = DataTables::of($data)
                ->addColumn(
                    'supervisor',
                    function($row) {
                        $sup = Supervisor::find($row->supervisor_id)->user()->get();
                        $sn = $sup[0];
                        return $sn->name.' '.$sn->last_name;
                    }
                )
                ->addColumn('action', function($row){
                    $actionBtn = ' <a href="'.route('section.edit',[$row->id]).'" class="edit btn btn-success btn-sm">Editar</a> ';
                    return $actionBtn;})
                ->rawColumns(['action'])
                ->make(true);
            return $table;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('sectiontNew');
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

        $sct = new Section();
        $sct->descripcion = $request->descripcion;
        $sct->fecha_inicio = $request->fecha_ini;
        $sct->fecha_fin = $request->fecha_fin;
        $sct->save();

        return redirect()->route('Section.edit')
            ->with('success','Tramo  '.$sct->descripcion.' creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $sections
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show(Section $sections)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $sections
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(int $sections)
    {
        $section= Section::all()->find($sections);
        $project = $section->project();
        $supervisors = Supervisor::all();
        return view('sectionEdit',compact('project', 'sections', 'supervisors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $sections
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function update(Request $request, Section $sections)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $sections
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function destroy(Section $sections)
    {
        //
    }
}
