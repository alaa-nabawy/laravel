@extends('dashboard', [
    'title' => 'Users',
    'menu_tab'	=> 'users'
])

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- Card Header & Minimize Button -->
                <div class="card-header bg-client-color1">
                  <h3 class="card-title float-right">Users</h3>
                  <div class="card-tools float-left">
                    <button type="button" class="btn btn-tool bg-client-color1" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>

                <!-- Add User Button -->
                <div class="card-body">
                  <div class="float-left mt-4">
                    <a href="./AddUser.php" class="btn btn-tool btn-client-color3 px-3">
                      <i class="fas fa-user-tag"></i>
                      <strong>Add User</strong>
                    </a>
                  </div>

                  <!-- Users List Table -->
                  <table id="Userslist" class="table table-bordered table-striped w-100">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="dont-export-col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    	@foreach($users as $key => $user)
                    		 <tr>
			                    <td>{{ $user->name }}</td>
			                    <td>{{ $user->phone_number }}</td>
			                    <td>{{ $user->email }}</td>
			                    <td>
			                    	<input type="checkbox" data-id="{{$user->_id}}" name="user-status" {{ $user->active ? 'checked' : '' }}>
			                    </td>
			                    <td class="py-2">
			                      <button data-id="{{$user->_id}}" class="btn btn-warning"><i class="fas fa-cog"></i></button>
			                      <button data-id="{{$user->_id}}" class="btn btn-danger"><i class="fas fa-trash"></i></button>
			                    </td>
			                  </tr>
                    	@endforeach
	                   
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th class="dont-export-col">Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->

                <!-- Loading Bar Overlay (Remove d-none to make it appear) -->
                <div class="overlay d-none">
                  <i class="fas fa-3x fa-sync-alt fa-spin widget-overlay"></i>
                  <h3 class="mr-3 widget-overlay"><strong>جاري التحميل</strong></h3>
                </div>

                <!-- Different Alerts (Remove d-none to make them appear)-->
                <div class="footer-alerts">
                  <div class="alert alert-danger d-none">
                    <h5><i class="icon fas fa-ban"></i> خطأ!</h5>
                    <p>عذرا ، حدث خطأ غير متوقع.</p>
                  </div>
                  <div class="alert alert-warning d-none">
                    <h5><i class="icon fas fa-exclamation-triangle"></i> تحذير!</h5>
                    <p>يرجى التحقق من مدخلات النموذج.</p>
                  </div>
                  <div class="alert alert-success d-none">
                    <h5><i class="icon fas fa-check"></i> نجاح!</h5>
                    <p>تمت العملية بنجاح.</p>
                  </div>
                </div>

              </div>
              <!-- /.card -->
            </div>
          </div>


        </div>
    </div>
@endsection

@push('js')
	<script type="text/javascript">
		$(document).ready(async function(){

			$.ajaxSetup({
	            headers: {
	                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	            }
	        });

			$('input[name=lang-status]').change(async function(){
				var element = $(this),
					data = {item_id:element.data('id'), status: element.is(':checked')},
					url = '{{route("languages.status")}}',
					custom = new Custom(),
					res = await custom.plain_ajax(url, 'POST', data)
				

				console.log(res)
			})

		})
	</script>
@endpush