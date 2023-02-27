<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>My School | @yield('title')</title>
  <link rel="shortcut icon" href="{{asset('Web/favicon.png')}}" type="image/x-icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('Web/favicon.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        {{-- <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a> --}}
        {{-- <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div> --}}
      </li>
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"> 
          {{-- <div class="dropdown-divider"></div>   --}}
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="route('logout')" class="dropdown-item text-center" onclick="event.preventDefault();
                                this.closest('form').submit();">
                 <i class="fas fa-sign-out-alt"></i> LogOut 
          </a>
          </form>  
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">My School Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('Web/logo.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item">
            <a href="{{url('/dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/enquirylists')}}" class="nav-link">
              <i class="nav-icon fa fa-question-circle" aria-hidden="true"></i>
              <p>
                Enquries
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/facilities')}}" class="nav-link">
              <i class="nav-icon fa fa-window-restore" aria-hidden="true"></i>
              <p>
                Facilities
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/slider')}}" class="nav-link">
              <i class="nav-icon fa fa-sliders" aria-hidden="true"></i>
              <p>
                Slider
              </p>
            </a>
          </li>
        
          <li class="nav-item">
            <a href="{{url('admin/album')}}" class="nav-link">
              {{-- <i class="nav-icon fas fa-th"></i> --}}
              <i class="nav-icon fa fa-picture-o" aria-hidden="true"></i>
              <p>
               Image Gallery
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/video-gallerylist')}}" class="nav-link">
              <i class=" nav-icon fa fa-video-camera" aria-hidden="true"></i>
              <p>
                Video Gallery
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>


          <li class="nav-item">
            <a href="{{url('admin/student-results')}}" class="nav-link">
              <i class="nav-icon fa fa-graduation-cap" aria-hidden="true"></i>
              <p>
                Result
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/reviews-list')}}" class="nav-link">
              <i class="nav-icon fa fa-user" aria-hidden="true"></i>
              <p>
                Manage Reviews
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          
          <li class="nav-item">
            <a href="{{url('admin/notification-list')}}" class="nav-link">
              <i class="nav-icon fa fa-bell" aria-hidden="true"></i>
              <p>
                Manage Notifications
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{url('admin/teacherlist')}}" class="nav-link">
              <i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>
                Manage Teacher's
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="{{url('admin/linklists')}}" class="nav-link">
              <i class="nav-icon fa fa-external-link" aria-hidden="true"></i>
              <p>
                Manage Menubar
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
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
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Data come from render -->
        @yield('AdminContent')

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @php
  $year=date('Y');
  @endphp
  <footer class="main-footer">
    <strong>Copyright &copy; {{$year}} Suraj Kumar Mishra By Technofy India</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.O
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
  exampleInputFile.onchange = evt => {
  const [file] = exampleInputFile.files
  $("#previewImg").removeAttr("hidden");
  if (file) {
    previewImg.src=''
    previewImg.src = URL.createObjectURL(file)
  }
}
</script>

@stack('scripts')

</body>
</html>
