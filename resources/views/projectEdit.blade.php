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
                                        <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" placeholder="Fecha Inicial" value="{{$project->fecha_ini}}" disabled>  {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fecha_fin">Fecha Fin<span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="Fecha Final" value="{{$project->fecha_fin }}" disabled>  {{-- //TODO deshabilitado si estado != 0 --}}
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
                <div class="card-body">
                    <form id="frmmateriales">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="pl-lg-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="descripcion">Codigo<span class="small text-danger">*</span></label>
                                        <select id="cod_material" class="form-control" name="cod_material" placeholder="Seleccione Material" >

                                        </select>
                                    </div>
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fecha_ini">Descripcion</label><span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" placeholder="Fecha Inicial" value="{{$project->fecha_ini}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="fecha_fin">Cantidad<span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="Fecha Final" value="{{$project->fecha_fin }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
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
                                        <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" placeholder="Fecha Inicial" value="{{$project->fecha_ini}}" disabled>  {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fecha_fin">Fecha Fin<span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="Fecha Final" value="{{$project->fecha_fin }}" disabled>  {{-- //TODO deshabilitado si estado != 0 --}}
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
                                        <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" placeholder="Fecha Inicial" value="{{$project->fecha_ini}}" disabled>  {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fecha_fin">Fecha Fin<span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="Fecha Final" value="{{$project->fecha_fin }}" disabled>  {{-- //TODO deshabilitado si estado != 0 --}}
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
                                        <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" placeholder="Fecha Inicial" value="{{$project->fecha_ini}}" disabled>  {{-- //TODO deshabilitado si estado != 0 --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fecha_fin">Fecha Fin<span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="Fecha Final" value="{{$project->fecha_fin }}" disabled>  {{-- //TODO deshabilitado si estado != 0 --}}
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
@endsection
