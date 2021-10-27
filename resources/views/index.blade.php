<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token()}}">
  <title>Admin Panel</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- AdminLTE Theme Style -->
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/plugins/adminlte/css/adminlte.rtl.css">
  <!-- Custom Dashboard CSS styling -->
  <link rel="stylesheet" href="{{asset('resources/admin_dashboard')}}/dist/css/dashboard.css">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="{{url('/')}}" class="brand-link" dir="rtl">
        <img src="{{config('constants.API_URL')}}settings/img/header?width=100&height=100" alt="AdminLTE Logo" style="opacity: .8; max-height: 60px; margin-top: -70px;">
      </a>
    </div>
    <!-- /.login-logo -->
    <div class="card" style="margin-top: -30px;">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Login to access Admin Panel.</p>

        <form role="form" method="post" action="{{ route('do.login') }}">
            @csrf
          <div class="input-group mb-3">
            <input type="phone_number" class="form-control" name="phone_number" autocomplete="off" placeholder="Phone Number">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-6">
              <button type="submit" class="btn btn-client-color3 btn-block">Login</button>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <div class="icheck-primary text-right">
                <label for="remember">
                  Remember Me
                </label>
                <input type="checkbox" name="remember_me">
              </div>
            </div>
            <!-- /.col -->

          </div>
        </form>
      </div>
      <!-- /.login-card-body -->

    </div>
  </div>
  <!-- /.login-box -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{asset('resources/admin_dashboard')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('resources/admin_dashboard')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('resources/admin_dashboard')}}/plugins/adminlte/js/adminlte.min.js"></script>
  <!-- Main JS FILE -->
  <script src="{{asset('resources/admin_dashboard')}}/dist/js/main.js?d=<?php echo time();?>"></script>

  {{-- Login With ajax --}}
  <script>
      jQuery(document).ready(function($){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  </script>

</body>
</html>
