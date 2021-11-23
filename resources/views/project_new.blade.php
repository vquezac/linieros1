{{dd($projects)}}
@extends('layouts.admin')

@section('main-content')

    <!-- Page Heading -->
    @if (session('success'))
    <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">

        <div class="col-xl-12 col-md-6 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">

                    <form method="POST" action="{{ route('project.create') }}" autocomplete="off">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <h6 class="heading-small text-muted mb-4">Inngreso de Nuevo Proyecto</h6>

                        <div class="pl-lg-8">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="descripcion">Nombre Proyecto<span class="small text-danger">*</span></label>
                                        <input type="text" id="descripcion" class="form-control" name="descripcion" placeholder="Nombre" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="fecha_fin">Fecha Fin<span class="small text-danger">*</span></label>
                                        <input type="email" id="fecha_fin" class="form-control" name="fecha_fin" placeholder="Fecha Final" value="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label" for="fecha_ini">Fecha Inicio</label><span class="small text-danger">*</span></label>
                                        <input type="date" id="fecha_ini" class="form-control" name="fecha_ini" placeholder="Fecha Inicial" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col text-center">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
