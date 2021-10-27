@extends('admin.dashboard', [
    'title' => _i('New Product')
])

@section('content')

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header bg-client-color1">
                  <h3 class="card-title float-right">{{_i('New Product')}}</h3>
                  <div class="card-tools float-left">
                    <button type="button" class="btn btn-tool bg-client-color1" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>

                <!-- Pages List Table -->
                <div class="card-body text-right">
                    <form class="form" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{_i('Title in English')}}</label>
                                    <input type="text" class="form-control" dir="ltr" name="title_en">
                                </div>

                                <div class="form-group">
                                    <label>{{_i('Description in English')}}</label>
                                    <textarea class="form-control" dir="ltr" name="description_en"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>{{_i('Price')}}</label>
                                    <input type="number" class="form-control" name="price">
                                </div>
                                <div class="form-group">
                                    <label>{{_i('Period in months')}}</label>
                                    <input type="number" class="form-control" name="period">
                                </div>
                                <div class="form-group">
                                    <label>{{_i('Properties in English')}}</label>
                                    <input type="text" class="form-control" dir="ltr" name="properties_en[]">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>{{_i('Title in Arabic')}}</label>
                                    <input type="text" class="form-control" dir="rtl" name="title_ar">
                                </div>
                                <div class="form-group">
                                    <label>{{_i('Description in Arabic')}}</label>
                                    <textarea class="form-control" dir="rtl" name="description_ar"></textarea>
                                </div>

                                <div class="form-group">
                                    <label>{{_i('Discount')}}</label>
                                    <input type="number" class="form-control" name="discount">
                                </div>

                                <div class="form-group">
                                    <label>{{_i('Image')}}</label>
                                    <input type="file" class="form-control" name="product_image"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>{{_i('Properties in Arabic')}}</label>
                                    <input type="text" class="form-control" dir="rtl" name="properties_ar[]">
                                </div>
                            </div>
                            <button class="btn btn-success form-control" type="submit">{{_i('Save')}}</button>
                        </div>

                    </form>
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        jQuery(document).ready(function($){
            $('form').submit(function(e){
                e.preventDefault()

                let form = $(this)

            })
        })
    </script>
@endpush
