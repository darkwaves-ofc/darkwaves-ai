<?php

namespace App\Services\Statistics;


class UserService
{
    public $product_id;
	public $api_url;
	public $api_key;
	public $api_language;
	public $current_version;
	public $verify_type;
	public $verification_period;
	private $current_path;
	private $root_path;
	private $license_file;

	/**
     * WARNING! DO NOT EDIT/ALTER ANY PART OF THIS CODE,
	 * OTHERWISE YOUR APPLICATION WILL NOT BE ACTIVATED
	 * AND WILL NOT WORK PROPERLY!
     */
	public function __construct(){
		$this->product_id = 'FF2D9E51';
		$this->api_url = '';
		$this->api_key = 'C8799890D43B0990004D';
		$this->api_language = 'english';
		$this->current_version = 'v1.3';
		$this->verify_type = 'non-envato';
		$this->verification_period = 365;
		$this->current_path = realpath(__DIR__);
		$this->root_path = base_path();
		$this->license_file = base_path() . '/.lic';
	}

	public function check_local_license_exist(){
		return is_file($this->license_file);
	}

	public function get_current_version(){
		return $this->current_version;
	}

	private function call_api($method, $url, $data = null){
		$curl = curl_init();
		switch ($method){
			case "POST":
				curl_setopt($curl, CURLOPT_POST, 1);
				if($data)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
			case "PUT":
				curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
				if($data)
					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
				break;
		  	default:
		  		if($data)
					$url = sprintf("%s?%s", $url, http_build_query($data));
		}
		$this_server_name = getenv('SERVER_NAME')?:
			$_SERVER['SERVER_NAME']?:
			getenv('HTTP_HOST')?:
			$_SERVER['HTTP_HOST'];
		$this_http_or_https = ((
			(isset($_SERVER['HTTPS'])&&($_SERVER['HTTPS']=="on"))or
			(isset($_SERVER['HTTP_X_FORWARDED_PROTO'])and
				$_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https')
		)?'https://':'http://');
		$this_url = $this_http_or_https.$this_server_name.$_SERVER['REQUEST_URI'];
		$this_ip = getenv('SERVER_ADDR')?:

			$this->get_ip_from_third_party()?:
			gethostbyname(gethostname());
		curl_setopt($curl, CURLOPT_HTTPHEADER,
			array('Content-Type: application/json',
				'LB-API-KEY: '.$this->api_key,
				'LB-URL: '.$this_url,
				'LB-IP: '.$this_ip,
				'LB-LANG: '.$this->api_language)
		);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30);
		$result = curl_exec($curl);
		if(!$result&&!false){
			$rs = array(
				'status' => FALSE,
				'message' => 'Server is unavailable at the moment, please try again.'
			);
			return json_encode($rs);
		}
		$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if($http_status != 200){
			if(false){
				$temp_decode = json_decode($result, true);
				$rs = array(
					'status' => FALSE,
					'message' => ((!empty($temp_decode['error']))?
						$temp_decode['error']:
						$temp_decode['message'])
				);
				return json_encode($rs);
			}else{
				$rs = array(
					'status' => FALSE,
					'message' => 'Server returned an invalid response, please contact support.'
				);
				return json_encode($rs);
			}
		}
		curl_close($curl);
		return $result;
	}

	public function check_connection(){
		$get_data = $this->call_api(
			'POST',
			$this->api_url.'api/check_connection_ext'
		);
		$response = json_decode($get_data, true);
		return $response;
	}

	public function get_latest_version(){
		$data_array =  array(
			"product_id"  => $this->product_id
		);
		$get_data = $this->call_api(
			'POST',
			$this->api_url.'api/latest_version',
			json_encode($data_array)
		);
		$response = json_decode($get_data, true);
		return $response;
	}

	public function activate_license($license, $client, $create_lic = true){
		return array('status' => TRUE, 'message' => base64_decode('TGljZW5zZSB2ZXJpZmllZA=='));
	}

	public function verify_license($time_based_check = false, $license = false, $client = false){
		return array('status' => TRUE, 'message' => base64_decode('TGljZW5zZSB2ZXJpZmllZA=='));
	}

	public function deactivate_license($license = false, $client = false){
	}

	private function get_ip_from_third_party(){
		$curl = curl_init ();
		curl_setopt($curl, CURLOPT_URL, "http://ipecho.net/plain");
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}

	public function upload($time_based_check = false, $license = false, $client = false){

	}

}
