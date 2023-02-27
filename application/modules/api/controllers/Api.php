<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends MX_Controller
{


	function __construct()
	{
		parent::__construct();
	}


	function __destruct()
	{
	}

	public function dosen()
	{
		$this->load->library('curl');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.kemdikbud.go.id:8243/pddikti/1.2/dosen?nidn=0415089001',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer 0ed841a2-e2e6-3edc-8652-7882dacc6380',
				'Content-Type: application/x-www-form-urlencoded'
			),
		));

		$response = curl_exec($curl);

		curl_close($curl);
		echo $response;
	}
}
