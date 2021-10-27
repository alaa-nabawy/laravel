let response
// Doctor Login
class Doctors{
	constructor() {
		this.id = 0
		this.name = ''
		this.en_name = ''
		this.mobile = ''
		this.email = ''
		this.governorate = 0
		this.area = 0
		this.address = ''
		this.en_address = ''
		this.gender = 0
		this.specialist = 0
		this.bio = ''
		this.en_bio = ''
		this.clinic = 0
		this.price = 0
		this.info = ''
		this.en_info = ''
		this.clinic_services = ''
		this.en_clinic_services = ''
		this.password = ''
		this.location = ''
		this.lat = ''
		this.long = ''
	}

	// First step in doctor registeration
	first_step(){
		if(this.name != '' && this.en_name != '' && this.mobile != '' && this.email != '' && this.governorate != '' && this.area != '' && this.address != '' && this.en_address != '' && this.gender != '' && this.specialist != '' && this.bio != '' && this.en_bio != '' && this.clinic != '' && this.price != '' && this.info != '' && this.en_info != '' && this.clinic_services != '' && this.location != '' && this.lat != '' && this.long != ''){
			return true
		}else{
			return false
		}
	}

	// Check email
	check_email() {

		// Data
		const DOCTOR_EMAIL = {
			email: this.email
		}

		// AJAX URL
		const AjaxUrl = `${REQUESTS_ROOT}/doctors/check_email.php`


		// AJAX CALL
		$.ajax({
			url: AjaxUrl,
			method: 'POST',
			data: DOCTOR_EMAIL,
			success: function(res){
				if(res == 'notexisted'){
					response = 'notexisted'
				}else{
					response = 'existed'
				}
			}
		})
		return response
	}
}