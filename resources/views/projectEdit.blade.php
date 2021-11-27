
@extends('layouts.admin')

@section('main-content')

    @if ($errors->any())
        <div class="alert alert-danger border-left-danger" role="alert">
            <ul class="pl-4 my-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8 mb-4">
            {{--PROYECTO--}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Datos del Proyecto</h4>
                </div>
                <div class="card-body">
                    <form id="frmproyecto">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="pl-lg-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="descripcion">Nombre Proyecto<span class="small text-danger">*</span></label>
                                        <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Nombre" value="{{$project->descripcion}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fecha_ini">Fecha Inicio</label><span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" placeholder="Fecha Inicial" value="{{$project->fecha_ini}}" disabled> {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fecha_fin">Fecha Fin<span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="Fecha Final" value="{{$project->fecha_fin }}" disabled> {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--MATERIALES--}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Materiales (Estimados)</h6>
                </div>
                <div class="mt-1 ml-1 mr-1">
                    <table class="table table-bordered table-striped table-hover yajra-datatable" id="tblmateriales">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                @if(auth()->user()->profile_id>=4)
                    <div class="card-body">
                        <form id="frmmateriales">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="pl-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group focused">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 mb-1">
                                                    <label class="form-control-label" for="id_material">Codigo<span class="small text-danger">*</span></label>
                                                    <select id="id_material" class="form-control" name="id_material" placeholder="Seleccione Material" onChange="actualizaCamposMatProj()">
                                                        @foreach($materials as $mat)
                                                            <option value="{{$mat->id}}">{{$mat->codigo}} ({{substr($mat->descripcion, 0, 40)}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-3 col-md-3 mb-1">
                                                    <label class="form-control-label" for="matprojcant">Cantidad<span class="small text-danger">*</span></label>
                                                    <input type="text" id="matprojcant" class="form-control" name="matprojcant" placeholder="" value="">
                                                </div>
                                                <input type="hidden" id="idprojmatproj" name="idprojmatproj" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-lg-12 col-md-12 mb-1">
                                            <input type="submit" value="Agregar Material">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
            {{--SECCIONES--}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tramos</h6>
                </div>
                <div class="card-body">
                    <form id="frmsecciones">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="pl-lg-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="descripcion">Nombre Proyecto<span class="small text-danger">*</span></label>
                                        <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Nombre" value="{{$project->descripcion}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fecha_ini">Fecha Inicio</label><span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" placeholder="Fecha Inicial" value="{{$project->fecha_ini}}" disabled> {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fecha_fin">Fecha Fin<span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="Fecha Final" value="{{$project->fecha_fin }}" disabled> {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--IMPUTACIONES--}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Imputaciones</h6>
                </div>
                <div class="card-body">
                    <form method="frmcuadrillaimput" action="{{ route('project.store') }}" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="pl-lg-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="descripcion">Nombre Proyecto<span class="small text-danger">*</span></label>
                                        <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Nombre" value="{{$project->descripcion}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fecha_ini">Fecha Inicio</label><span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" placeholder="Fecha Inicial" value="{{$project->fecha_ini}}" disabled> {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fecha_fin">Fecha Fin<span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="Fecha Final" value="{{$project->fecha_fin }}" disabled> {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--FUSIONES--}}
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Certificaciones</h6>
                </div>
                <div class="card-body">
                    <form id="frmfuserimput">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="pl-lg-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="descripcion">Nombre Proyecto<span class="small text-danger">*</span></label>
                                        <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Nombre" value="{{$project->descripcion}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pl-lg-8">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fecha_ini">Fecha Inicio</label><span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" placeholder="Fecha Inicial" value="{{$project->fecha_ini}}" disabled> {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fecha_fin">Fecha Fin<span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="Fecha Final" value="{{$project->fecha_fin }}" disabled> {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>

        </div>
    </div>

    {{--MATERIALES--}}
    <script>
        $(function () {

            var table = $('#tblmateriales').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                        url: "{{route('projectmaterial.list')}}",
                        data: {
                            project_id: {{$project->id}},
                        },
                    },
                    rowReorder: {
                        selector: 'td:nth-child(2)'
                    },
                    columns: [
                        {data: 'codigo', name: 'codigo', },
                        {data: 'descripcion', name: 'descripcion'},
                        {data: 'cantidad', name: 'cantidad'},
                        {
                            data: 'Accion', name: 'Editar',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es-cl.json'
                    },
                    dom: 'Bfrtip',
                    buttons: {
                        buttons: ['csv', 'excel', 'pdf', 'print', 'reset', 'reload']
                    },
                });
        })
            ;
    </script>

@endsection
