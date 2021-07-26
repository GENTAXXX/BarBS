<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="{{ asset('assets/img/sim-vertical-white.png') }}" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        </ul>
    </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="dashboard-mahasiswa.html" class="">
                <img src="{{ asset('assets/img/sim-white.png') }}" alt="" class="m-4" style="height: 75px;">      
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                    <img src="{{ asset('assets/img/sim-green-hat.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                    <a href="{{ route('profile.index') }}" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>
            <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('mitra.home') }}" class="nav-link @if(Route::is('mitra.home')) {{ 'active' }} @endif">
                            <i class="fa fa-home nav-icon"></i>
                            <p>Beranda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('lowongan.index') }}" class="nav-link @if(Route::is('lowongan.index')) {{ 'active' }} @endif">
                                <i class="far fa-copy nav-icon"></i>
                                <p>Lowongan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('pendaftar.index') }}" class="nav-link @if(Route::is('pendaftar.index')) {{ 'active' }} @endif">
                                <i class="far fa-copy nav-icon"></i>
                                <p>Pendaftar <span class="badge">{{ $count }}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('magang.index') }}" class="nav-link @if(Route::is('magang.index')) {{ 'active' }} @endif">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Mahasiswa Magang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" class="nav-link">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
            <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        @yield('konteng')
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 0.1
            </div>
            <strong>Copyright &copy; 2020 <a href="">SIMagang</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
