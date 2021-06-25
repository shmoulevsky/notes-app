<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
   <!-- IonIcons -->
  <link rel="stylesheet" href="/css/fontawesome.all.min.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>


</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="d-sm-inline-block">
        <a class="nav-link" href="/"  >Главная</a>
      </li>
      <li class="d-sm-inline-block">
        <a class="nav-link" href="/notes">Все записи</a>
      </li>
      <li class="d-sm-inline-block">
        <a class="nav-link" href="/notes/favor">Избранное</a>
      </li>
      <li class="d-sm-inline-block">
        <a class="nav-link" href="/notes/latest">Последние 10</a>
      </li>
      <li class="d-sm-inline-block">
        <a class="nav-link" href="/notes/top">Топ 10</a>
      </li>
      <li class="d-sm-inline-block">
        <a class="nav-link" href="/themes">Темы</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form method="get" action="/notes" class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" name="q" type="search" placeholder="Поиск" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
      <img src="/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Записи</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Привет, {{auth()->user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search2">
          <input class="form-control search-note-input form-control-sidebar" type="search" placeholder="Поиск" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar search-note-btn">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      @include('layouts.sidebar.menu')
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 contenteditable="true" class="m-0 main-title note-title">@yield('title')</h1>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row main-content">
          @yield('content')
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 Евгений Шмулевский</strong>
    All rights reserved.
  </footer>
</div>
@include('modals.add-note')
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->



</body>
</html>
