@extends('admin.dashboard', [
    'title' => _i('Products')
])

@section('content')

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-client-color1">
                  <h3 class="card-title float-right">{{_i('Products')}}</h3>
                  <div class="card-tools float-left">
                    <button type="button" class="btn btn-tool bg-client-color1" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>

                <!-- Pages List Table -->
                <div class="card-body text-right">
                    <div class="float-left mt-4">
                        <a href="{{route('admin.products.create')}}" class="btn btn-tool btn-client-color3 px-3">
                            <i class="fas fa-plus"></i>
                            <strong>{{_i('Add Product')}}</strong>
                        </a>
                    </div>
                    <table id="Products_table" class="table table-striped- table-bordered text-center">
                        <thead>
                            <td>{{_i('ID')}}</td>
                            <td>{{_i('Title')}}</td>
                            <td>{{_i('Image')}}</td>
                            <td>{{_i('Period')}}</td>
                            <td>{{_i('Action')}}</td>
                        </thead>
                    </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>


      </div>
@endsection

@push('js')
    <script>
        $('#Products_table').DataTable({
            ajax: {
                url: "{{route('admin.products')}}"
            },
            processing: true,
            serverSide: true,
            columns: [
                {data: "id"},
                {data: "title"},
                {data: "image"},
                {data: "period"},
                {data: 'action'}
            ],
        })
    </script>
@endpush
