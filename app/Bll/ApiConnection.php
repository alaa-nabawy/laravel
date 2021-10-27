<?php

namespace App\Bll;

class ApiConnection{

	protected $url;

	public function __construct() {
		$this->url = config('constants.API_URL');
	}

	public function connect($model, $action, $method, $data=[], $auth=false, $formData=false, $localize=false){
				
		$payload = $data;
		if(!$formData) $payload = json_encode($data);

		$localize_param = '';
		if($localize) $localize_param = "?lang={$localize}";

		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => $this->url.$model.'/'.$action.$localize_param,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => '',
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 0,
		  CURLOPT_FOLLOWLOCATION => true,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => $method,
		  CURLOPT_POSTFIELDS =>$payload,
		  CURLOPT_HTTPHEADER => $auth == true ? array(
		    'Authorization: Bearer '.session('token'),
		    'Content-Type: application/json'
		  ) : array('Content-Type: application/json'),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		if($response !== false) return json_decode($response);
	}
}