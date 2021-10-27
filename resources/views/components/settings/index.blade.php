@extends('dashboard', [
    'title' => 'Settings',
    'menu_tab'	=> 'settings'
])

@section('content')

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
	        <div class="row">
	            <div class="col-md-4">
	            	<div class="card">
						<div class="card-header">
							<h5 class="text-center">Icon</h5>
						</div>
						<div class="card-block">
							<div class="text-center">
								<label for="icon_image">
									<img  class="default_images" src="{{config('constants.API_URL')}}settings/img/icon?width=100&height=100" style="cursor: pointer;">
								</label>
							</div>
						</div>
						<form action="" enctype="multipart/form-data" method="post">
							@csrf
							<input class="default_images_input" id="icon_image" hidden="" type="file" name="image">
						</form>
					</div>
	            </div>

	            <div class="col-md-4">
	            	<div class="card">
						<div class="card-header">
							<h5 class="text-center">Header logo</h5>
						</div>
						<div class="card-block">
							<div class="text-center">
								<label for="header_image">
									<img  class="default_images" src="{{config('constants.API_URL')}}settings/img/header?width=100&height=100" style="cursor: pointer;">
								</label>
							</div>
						</div>
						<form action="" enctype="multipart/form-data" method="post">
							@csrf
							<input class="default_images_input" id="header_image" hidden="" type="file" name="image">
						</form>
					</div>
	            </div>

	            <div class="col-md-4">
	            	<div class="card">
						<div class="card-header">
							<h5 class="text-center">Footer Logo</h5>
						</div>
						<div class="card-block">
							<div class="text-center">
								<label for="footer_image">
									<img  class="default_images" src="{{config('constants.API_URL')}}settings/img/footer?width=100&height=100" style="cursor: pointer;">
								</label>
							</div>
						</div>
						<form action="" enctype="multipart/form-data" method="post">
							@csrf
							<input class="default_images_input" id="footer_image" hidden="" type="file" name="image">
						</form>
					</div>
	            </div>
	        </div>

	        <div class="row mt-4">
	        	<div class="card w-100">
	                <div class="card-header bg-client-color3">
	                  <h3 class="card-title">Main settings</h3>
	                  <div class="card-tools float-right">
	                    <ul class="nav nav-pills bg-client-color3" id="form-tabs">
	                    	@foreach($languages->lang_data as $key => $lang)
	                    		<li class="nav-item">
			                        <a class="nav-link {{$key==0 ? 'active' : ''}}" href="#settings-{{$languages->languages[$key]->code}}" data-toggle="tab">{{$lang->title}}</a>
			                      </li>
	                    	@endforeach
	                    </ul>
	                  </div>
	                </div>

	                  <div class="card-body">
	                    <div class="tab-content p-0">
	                    	@foreach($languages->lang_data as $key => $lang)
	                    		<div class="tab-pane {{$key==0 ? 'active' : ''}}" id="settings-{{$languages->languages[$key]->code}}">
			                      <form role="form">
			                      	@csrf
			                      	<input type="hidden" name="lang" value="{{$lang->language_id}}">
			                        <div class="row">
			                        	<div class="col-12">
			                        		<div class="form-group">
				                              <label class="w-100">Site title in {{$lang->title}}</label>
				                              <input type="text" name="title" class="form-control title" placeholder="Enter Site Title">
				                            </div>
			                        	</div>

			                        	<div class="col-12">
			                        		<div class="form-group">
				                              <label class="w-100">Site Description in {{$lang->title}}</label>
				                              <input type="text" name="description" class="form-control description" placeholder="Enter Site Description">
				                            </div>
			                        	</div>

			                        	<div class="col-12">
			                        		<div class="form-group">
				                              <label class="w-100">Site Meta Description in {{$lang->title}}</label>
				                              <input type="text" name="meta_description" class="form-control meta-description" placeholder="Enter Site Meta Description">
				                            </div>
			                        	</div>
			                        </div>
			                        <div class="form-footer">
			                          <button type="submit" class="btn btn-warning px-5">Save</button>
			                          <a href="./UsersList.php" class="btn btn-danger px-5 float-left">إلغاء</a>
			                        </div>
			                      </form>
			                    </div>
	                    	@endforeach

		                  </div>

	                </form>
              </div>
	        </div>
        </div>
    </div>
@endsection

@push('js')
	<script type="text/javascript">
		$(document).ready(async function(){
			var url = '{{route("settings.ajax", $languages->lang_data[0]->language_id)}}'
			var data = {}
			var custom = new Custom()
			var res = await custom.plain_ajax(url, 'GET', data)
			$('.tab-pane.active .title').val(res.title)
			$('.tab-pane.active .description').val(res.description)
			$('.tab-pane.active .meta-description').val(res.meta_description)


			$('#form-tabs a').click(async function(){
				var item = $(this),
					pane_id = item.attr('href'),
					pane = $(pane_id),
					lang = pane.find('input[name=lang]').val()

				var url = '{{route("settings.ajax", "lang_id")}}'
				url = url.replace('lang_id', lang)

				var data = {},
					custom = new Custom(),
					res = await custom.plain_ajax(url, 'GET', data)

				if(!res.title) return

				pane.find('.title').val(res.title)
				pane.find('.description').val(res.description)
				pane.find('.meta-description').val(res.meta_description)
			})


			$('.tab-pane form').on('submit', async function(e){
				e.preventDefault()

				var form = $(this),
					url = '{{route("settings.store")}}'

				form.find('button[type=submit]').attr('disabled', 'disabled')

				var custom = new Custom(),
					res = await custom.plain_ajax(url, 'POST', form.serialize())

				form.find('button[type=submit]').removeAttr('disabled', 'disabled')
			})

		})
	</script>
@endpush