<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2 en Español">
    <meta name="author" content="MarcosKlender">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">


    <!-- Scripts -->
    {{--<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>--}}


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Proyectos de Tendido<sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Nav::isRoute('home') }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Escritorio') }}</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            {{ __('Ajustes') }}
        </div>


        <div>

        </div>
        <li class="nav-item {{ Nav::isRoute('project.index') }}">
            <a class="nav-link" href="{{route('project.index')}}">
                <i class="fas fa-fw fa-bell"></i>
                <span>{{ __('Proyecto') }}</span>
            </a>
        </li>


        <!-- Nav Item - Profile -->
        <li class="nav-item {{ Nav::isRoute('profile') }}">
            <a class="nav-link" href="{{ route('profile') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>{{ __('Perfil') }}</span>
            </a>
        </li>

        <!-- Nav Item - About -->
        <li class="nav-item {{ Nav::isRoute('about') }}">
            <a class="nav-link" href="{{ route('about') }}">
                <i class="fas fa-fw fa-hands-helping"></i>
                <span>{{ __('Créditos') }}</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
{{--                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Búsqueda" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>--}}

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

{{--                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->--}}
{{--                    <li class="nav-item dropdown no-arrow d-sm-none">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-search fa-fw"></i>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Messages -->--}}
{{--                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">--}}
{{--                            <form class="form-inline mr-auto w-100 navbar-search">--}}
{{--                                <div class="input-group">--}}
{{--                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Búsqueda" aria-label="Search" aria-describedby="basic-addon2">--}}
{{--                                    <div class="input-group-append">--}}
{{--                                        <button class="btn btn-primary" type="button">--}}
{{--                                            <i class="fas fa-search fa-sm"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                    <!-- Nav Item - Alerts -->--}}
{{--                    <li class="nav-item dropdown no-arrow mx-1">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-bell fa-fw"></i>--}}
{{--                            <!-- Counter - Alerts -->--}}
{{--                            <span class="badge badge-danger badge-counter">3+</span>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Alerts -->--}}
{{--                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">--}}
{{--                            <h6 class="dropdown-header">--}}
{{--                                Notificaciones--}}
{{--                            </h6>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="mr-3">--}}
{{--                                    <div class="icon-circle bg-primary">--}}
{{--                                        <i class="fas fa-file-alt text-white"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="small text-gray-500">12 de diciembre de 2019</div>--}}
{{--                                    <span class="font-weight-bold">¡Nuevo reporte mensual listo para descargar!</span>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="mr-3">--}}
{{--                                    <div class="icon-circle bg-success">--}}
{{--                                        <i class="fas fa-donate text-white"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="small text-gray-500">07 de diciembre de 2019</div>--}}
{{--                                    ¡Recibió un depósito de $290.29 en su cuenta!--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="mr-3">--}}
{{--                                    <div class="icon-circle bg-warning">--}}
{{--                                        <i class="fas fa-exclamation-triangle text-white"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="small text-gray-500">02 de diciembre de 2019</div>--}}
{{--                                    Alerta: Hemos notado movimientos inusuales en su cuenta.--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item text-center small text-gray-500" href="#">Ver todas las notificaciones</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}

{{--                    <!-- Nav Item - Messages -->--}}
{{--                    <li class="nav-item dropdown no-arrow mx-1">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                            <i class="fas fa-envelope fa-fw"></i>--}}
{{--                            <!-- Counter - Messages -->--}}
{{--                            <span class="badge badge-danger badge-counter">7</span>--}}
{{--                        </a>--}}
{{--                        <!-- Dropdown - Messages -->--}}
{{--                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">--}}
{{--                            <h6 class="dropdown-header">--}}
{{--                                Mensajes--}}
{{--                            </h6>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">--}}
{{--                                    <div class="status-indicator bg-success"></div>--}}
{{--                                </div>--}}
{{--                                <div class="font-weight-bold">--}}
{{--                                    <div class="text-truncate">Hola. Me preguntaba si podrías ayudarme con un problema que se me acaba de presentar.</div>--}}
{{--                                    <div class="small text-gray-500">Emily Fowler · 58m</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">--}}
{{--                                    <div class="status-indicator bg-warning"></div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="text-truncate">El reporte del último mes luce prometedor, estoy muy contento con tu trabajo. ¡Sigue así!</div>--}}
{{--                                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
{{--                                <div class="dropdown-list-image mr-3">--}}
{{--                                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">--}}
{{--                                    <div class="status-indicator bg-success"></div>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="text-truncate">Humano, ¿me traerás comida de verdad o pura croqueta otra vez? :(</div>--}}
{{--                                    <div class="small text-gray-500">Chicken the Dog · 2w</div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item text-center small text-gray-500" href="#">Ver todos los mensajes</a>--}}
{{--                        </div>--}}
{{--                    </li>--}}

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small mr-4">{{ Auth::user()->fullName }} ({{Auth::user()->profile->descripcion}})</span>
                            <figure class="img-profile rounded-circle avatar font-weight-bold" data-initial="{{ Auth::user()->name[0] }}"></figure>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('profile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Perfil') }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Ajustes') }}
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Registro de Actividades') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Cerrar Sesión') }}
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('main-content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy;  2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('¿Está seguro?') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Por favor, confirme si está listo para cerrar sesión.</div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancelar') }}</button>
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Cerrar Sesión') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
