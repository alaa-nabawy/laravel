@extends('dashboard', [
    'title' => 'Home',
    'menu_tab'  => 'home'
])

@section('content')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <!-- Dashboard Counters -->
        <div class="row">
            <div class="col-lg-3">
            <div class="info-box bg-client-color1">
                <span class="info-box-icon"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Users</span>

                <span class="info-box-number"></span>
                </div>
            </div>
            </div>
            <div class="col-lg-3">
            <div class="info-box bg-client-color2">
                <span class="info-box-icon"><i class="fas fa-ad"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Ads</span>

                <span class="info-box-number"></span>
                </div>
            </div>
            </div>
            <div class="col-lg-3">
            <div class="info-box bg-client-color3">
                <span class="info-box-icon"><i class="fas fa-signal"></i></span>
                <div class="info-box-content">
                <span class="info-box-text">Online Users</span>

                <span class="info-box-number"></span>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
@endsection
