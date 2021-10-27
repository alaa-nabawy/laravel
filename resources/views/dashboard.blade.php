<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token()}}">
  <title>Admin Panel</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Select2 Field Style -->
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Summer note -->
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/plugins/tagify/tagify.rtl.css">

  <!-- AdminLTE Theme Style -->
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/plugins/adminlte/css/adminlte.css">
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard/plugins/datatables.net/jquery.dataTables.min.css')}}">
  <!-- Custom Dashboard CSS styling -->
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/dist/css/dashboard.css?d=<?php echo time() ?>">
  <!-- Website Favicon -->
  <link rel="icon" type="image/png" href="{{config('constants.API_URL')}}settings/img/icon?width=30&height=30">

  @stack('css')
</head>
<body class="hold-transition sidebar-mini">

  <div class="wrapper">


    @include('fixed.sidebar')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark text-right">{{isset($title) ? $title : 'Admin Panel'}}</h1>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </div>

    @include('fixed.footer')
  </div>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{asset('resources/js')}}/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('resources/admin_dashboard')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('resources/admin_dashboard')}}/plugins/adminlte/js/adminlte.min.js"></script>

  <script src="{{asset('resources/admin_dashboard/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>

  <script src="{{asset('resources/js/custom.js')}}?q=<?= time() ?>"></script>
  @stack('js')

</body>

</html>
