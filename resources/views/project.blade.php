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
        <div class="col-lg-6 mb-4">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h4 class=" float-left m-0 font-weight-bold text-primary">Proyectos</h4>
                    <div class="float-right mr-5"><a href="{{route('project.create')}}"><i class="fas fa-fb fa-plus"></i><span>Agregar</span></a></div>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped table-hover " id="tblproject">
                        <thead>
                        <tr>
                            <th>Nº</th>
                            <th>Proyecto</th>
                            <th>Fecha Inicial</th>
                            <th>Fecha Final</th>
                            <th>Estado</th>
                            <th>Editar</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            var table = $('#tblproject').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('project.list') }}",
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'descripcion', name: 'descripcion'},
                    {data: 'fecha_inicio', name: 'fecha_inicio'},
                    {data: 'fecha_fin', name: 'fecha_fin'},
                    {data: 'estado', name: 'estado'},
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

            /*table.on('xhr', function (e, settings, json) {
                console.log('Ajax event occurred. Returned e: ', e);
                console.log('Ajax event occurred. Returned settings: ', settings);
                console.log('Ajax event occurred. Returned data: ', json);

            });*/
        });
    </script>

@endsection
