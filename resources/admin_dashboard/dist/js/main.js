// Main JS file
const REQUESTS_ROOT = '/lottery/admin/includes/requests/'

jQuery(document).ready(function($){

	// Login
	$(document).on('click', '#adminLogin', function(e){
		e.preventDefault()

		$('.alert').addClass('d-none')
		$('.overlay').removeClass('d-none')

		const DATA = {
			email: $('#Username').val(),
			password: $('#UserPassword').val()
		}

		for(let key in DATA){
			let value = DATA[key]

			if(value.length == 0){
				$('.alert.alert-warning').removeClass('d-none')
				$('.overlay').addClass('d-none')
				return
			}
		}

	 	const AjaxUrl = REQUESTS_ROOT+'users/login.php'

	 	$.ajax({
	 		url: AjaxUrl,
	 		method: 'POST',
	 		data: DATA,
	 		success: function(res){
	 			console.log(res)
	 			
	 			let response = JSON.parse(res)

	 			if(response.error){
	 				$('.alert.alert-warning').removeClass('d-none')
					$('.overlay').addClass('d-none')
	 			}else{
	 				$('.alert.alert-success').removeClass('d-none')
	 				$('.overlay').addClass('d-none')
	 				window.location = "Homepage.php"
	 			}
	 		}
	 	})

	})

	// UPDATE
	$(document).on('click', '#editAdmin', function(e){
		e.preventDefault()

		$('.alert').addClass('d-none')
		$('.overlay').removeClass('d-none')

		const DATA = {
			firstname: $('#firstName').val(),
			thirdname: $('#thirdName').val(),
			secondname: $('#secondName').val(),
			fourthname: $('#fourthName').val(),
			email: $('#UserEmail').val(),
			userRole: $('#userRole').val(),
			id: $('#adminId').val()
		}

		for(let key in DATA){
			let value = DATA[key]

			if(value.length == 0){
				$('.alert.alert-warning').removeClass('d-none')
				$('.overlay').addClass('d-none')
				return
			}
		}

	 	const AjaxUrl = REQUESTS_ROOT+'users/update.php'

	 	$.ajax({
	 		url: AjaxUrl,
	 		method: 'POST',
	 		data: DATA,
	 		success: function(res){
	 			let response = JSON.parse(res)

	 			if(response.error){
	 				$('.alert.alert-warning').removeClass('d-none')
					$('.overlay').addClass('d-none')
	 			}else{
	 				$('.alert.alert-success').removeClass('d-none')
	 				$('.overlay').addClass('d-none')
	 			}
	 		}
	 	})

	})

	// UPDATE
	$(document).on('click', '.rmvBtn', function(e){
		e.preventDefault()

		$('.alert').addClass('d-none')

		let element = $(this)

		const DATA = {
			id: element.data('id'),
			table: element.data('tbl')
		}

		for(let key in DATA){
			let value = DATA[key]

			if(value.length == 0){
				$('.alert.alert-warning').removeClass('d-none')
				$('.overlay').addClass('d-none')
				return
			}
		}

		if(confirm('Are you sure you want to delete this item?')){
			$('.overlay').removeClass('d-none')
		 	const AjaxUrl = REQUESTS_ROOT+'generals/delete.php'

		 	$.ajax({
		 		url: AjaxUrl,
		 		method: 'POST',
		 		data: DATA,
		 		success: function(res){
		 			
		 			let response = JSON.parse(res)

		 			if(response.error){
		 				$('.alert.alert-warning').removeClass('d-none')
						$('.overlay').addClass('d-none')
		 			}else{
		 				$()
		 				$('.alert.alert-success').removeClass('d-none')
		 				$('.overlay').addClass('d-none')
		 				element.parents('tr').remove()
		 			}
		 		}
		 	})
		}


	})

	$(document).on('click', '#addAdmin', function(e){
		e.preventDefault()

		$('.alert').addClass('d-none')
		$('.overlay').removeClass('d-none')

		var element = $(this)
	
		const DATA = {
			firstname: $('#firstName').val(),
			thirdname: $('#thirdName').val(),
			secondname: $('#secondName').val(),
			fourthname: $('#fourthName').val(),
			email: $('#UserEmail').val(),
			userRole: $('#userRole').val(),
			profile_picture: $('#UserAvatar').val() ? $('#UserAvatar').prop('files')[0] : '',
			UserPassword: $('#UserPassword').val(),
			UserPhone: $('#UserPhone').val()
		}		

		for(let key in DATA){
			let value = DATA[key]

			if(value.length == 0){
				$('.alert.alert-warning').removeClass('d-none')
				$('.overlay').addClass('d-none')
				return
			}
		}

		let formdata = new FormData()

		formdata.append('firstname', DATA.firstname)
		formdata.append('thirdname', DATA.thirdname)
		formdata.append('secondname', DATA.secondname)
		formdata.append('fourthname', DATA.fourthname)
		formdata.append('email', DATA.email)
		formdata.append('userRole', DATA.userRole)
		formdata.append('profile_picture', DATA.profile_picture)
		formdata.append('password', DATA.UserPassword)
		formdata.append('phone_number', DATA.UserPhone)



	 	const AjaxUrl = REQUESTS_ROOT+'users/create.php'

	 	$.ajax({
	 		url: AjaxUrl,
	 		method: 'POST',
	 		data: formdata,
			processData: false,
	  		contentType: false,
	 		success: function(res){
	 			let response = JSON.parse(res)

	 			if(response.error){
	 				$('.alert.alert-warning').removeClass('d-none')
					$('.overlay').addClass('d-none')
	 			}else{
	 				$('.alert.alert-success').removeClass('d-none')
	 				$('.overlay').addClass('d-none')

	 				$('#firstName').val('')
					$('#thirdName').val('')
					$('#secondName').val('')
					$('#fourthName').val('')
					$('#UserEmail').val('')
					$('#userRole').val('')
					$('#UserPassword').val('')
					$('#UserPhone').val('')
	 			}
	 		}
	 	})
	})


	// Competitions
	$(document).on('click',  '#addComp', function(e){
		e.preventDefault()

		$('.alert').addClass('d-none')
		$('.overlay').removeClass('d-none')

		var element = $(this)
	
		const DATA = {
			comp_title: $('#comp_title').val(),
			comp_date: $('#comp_date').val() + ' ' + $('#comp_time').val()+':00',
			code_price: $('#code_price').val(),
			comp_image: $('#comp_image').val() ? $('#comp_image').prop('files')[0] : ''
		}		

		for(let key in DATA){
			let value = DATA[key]

			if(value.length == 0){
				$('.alert.alert-warning').removeClass('d-none')
				$('.overlay').addClass('d-none')
				return
			}
		}


		let formdata = new FormData()

		formdata.append('comp_title', DATA.comp_title)
		formdata.append('comp_date', DATA.comp_date)
		formdata.append('code_price', DATA.code_price)
		formdata.append('comp_image', DATA.comp_image)

	 	const AjaxUrl = REQUESTS_ROOT+'competitions/create.php'

	 	$.ajax({
	 		url: AjaxUrl,
	 		method: 'POST',
	 		data: formdata,
			processData: false,
	  		contentType: false,
	 		success: function(res){

	 			let response = JSON.parse(res)

	 			if(response.error){
	 				$('.alert.alert-warning').removeClass('d-none')
					$('.overlay').addClass('d-none')
	 			}else{
	 				$('.alert.alert-success').removeClass('d-none')
	 				$('.overlay').addClass('d-none')

	 				$('#comp_title').val('')
					$('#comp_date').val('')
					$('#code_price').val('')
					$('#comp_image').val('')
	 			}
	 		}
	 	})
	})

	$(document).on('click',  '#editCompetition', function(e){
		e.preventDefault()

		$('.alert').addClass('d-none')
		$('.overlay').removeClass('d-none')

		var element = $(this)
	
		const DATA = {
			comp_title: $('#comp_title').val(),
			comp_date: $('#comp_date').val() + ' ' + $('#comp_time').val()+':00',
			code_price: $('#code_price').val(),
		}		

		for(let key in DATA){
			let value = DATA[key]

			if(value.length == 0){
				$('.alert.alert-warning').removeClass('d-none')
				$('.overlay').addClass('d-none')
				return
			}
		}

	 	const AjaxUrl = REQUESTS_ROOT+'competitions/update.php'

	 	$.ajax({
	 		url: AjaxUrl,
	 		method: 'POST',
	 		data: DATA,
	 		success: function(res){
	 			let response = JSON.parse(res)

	 			if(response.error){
	 				$('.alert.alert-warning').removeClass('d-none')
					$('.overlay').addClass('d-none')
	 			}else{
	 				$('.alert.alert-success').removeClass('d-none')
	 				$('.overlay').addClass('d-none')
	 			}
	 		}
	 	})
	})


	$(document).on('click', '#winnerCode', function(e){
		e.preventDefault()

		$('.alert').addClass('d-none')
		$('.overlay').removeClass('d-none')

		var element = $(this)
	
		const DATA = {
			code: $('#winner_code').val(),
			comp_id: element.data('id')
		}		

		for(let key in DATA){
			let value = DATA[key]

			if(value.length == 0){
				$('.alert.alert-warning').removeClass('d-none')
				$('.overlay').addClass('d-none')
				return
			}
		}

	 	const AjaxUrl = REQUESTS_ROOT+'competitions/close.php'

	 	$.ajax({
	 		url: AjaxUrl,
	 		method: 'POST',
	 		data: DATA,
	 		success: function(res){
	 			let response = JSON.parse(res)

	 			if(response.error){
	 				$('.alert.alert-warning').removeClass('d-none')
					$('.overlay').addClass('d-none')
	 			}else{
	 				$('.alert.alert-success').removeClass('d-none')
	 				$('.overlay').addClass('d-none')
	 				location.reload()
	 			}
	 		}
	 	})
	})

	$(document).on('click', '.compStatChange', function(e){
		e.preventDefault()

		$('.alert').addClass('d-none')
		$('.overlay').removeClass('d-none')

		var element = $(this)

		element.parent('label').addClass('labelactive')
	
		const DATA = {
			id: element.data('id')
		}

		for(let key in DATA){
			let value = DATA[key]

			if(value.length == 0){
				$('.alert.alert-warning').removeClass('d-none')
				$('.overlay').addClass('d-none')
				return
			}
		}

	 	const AjaxUrl = REQUESTS_ROOT+'competitions/open.php'

	 	$.ajax({
	 		url: AjaxUrl,
	 		method: 'POST',
	 		data: DATA,
	 		success: function(res){
	 			let response = JSON.parse(res)

	 			if(response.error){
	 				$('.alert.alert-warning').removeClass('d-none')
					$('.overlay').addClass('d-none')
	 			}else{
	 				$('.alert.alert-success').removeClass('d-none')
	 				$('.overlay').addClass('d-none')
	 				location.reload()
	 			}
	 		}
	 	})
	})

	// Add winner
	$(document).on('click', '#addWinner', function(e){
		e.preventDefault()

		$('.alert').addClass('d-none')
		$('.overlay').removeClass('d-none')

		var element = $(this)
	
		const DATA = {
			compUser: $('#compUser').val(),
			compCompetition: $('#compCompetition').val(),
			win_pic: $('#win_pic').val() ? $('#win_pic').prop('files')[0] : ''
		}		

		for(let key in DATA){
			let value = DATA[key]

			if(value.length == 0){
				$('.alert.alert-warning').removeClass('d-none')
				$('.overlay').addClass('d-none')
				return
			}
		}

		let formdata = new FormData()

		formdata.append('compUser', DATA.compUser)
		formdata.append('compCompetition', DATA.compCompetition)
		formdata.append('win_pic', DATA.win_pic)

	 	const AjaxUrl = REQUESTS_ROOT+'winners/create.php'

	 	$.ajax({
	 		url: AjaxUrl,
	 		method: 'POST',
	 		data: formdata,
			processData: false,
	  		contentType: false,
	 		success: function(res){
	 			let response = JSON.parse(res)

	 			if(response.error){
	 				$('.alert.alert-warning').removeClass('d-none')
					$('.overlay').addClass('d-none')
	 			}else{
	 				$('.alert.alert-success').removeClass('d-none')
	 				$('.overlay').addClass('d-none')
	 			}
	 		}
	 	})
	})


	$(document).on('click', '#addQuestion', function(e){
		e.preventDefault()

		$('.alert').addClass('d-none')
		$('.overlay').removeClass('d-none')

		var element = $(this)
	
		const DATA = {
			question: $('#question').val(),
			choices:  $('input[name=answer\\[\\]]').map(function(){return $(this).val()}).get(),
			answer: $('input[name=rightanswer]:checked').parent('div').next('div').find('input').val()
		}

		for(let key in DATA){
			let value = DATA[key]

			if(value.length == 0){
				$('.alert.alert-warning').removeClass('d-none')
				$('.overlay').addClass('d-none')
				return
			}
		}

		const AjaxUrl = REQUESTS_ROOT+'questions/create.php'

	 	$.ajax({
	 		url: AjaxUrl,
	 		method: 'POST',
	 		data: DATA,
	 		success: function(res){
	 			let response = JSON.parse(res)

	 			if(response.error){
	 				$('.alert.alert-warning').removeClass('d-none')
					$('.overlay').addClass('d-none')
	 			}else{
	 				$('.alert.alert-success').removeClass('d-none')
	 				$('.overlay').addClass('d-none')
	 			}
	 		}
	 	})

	})

})