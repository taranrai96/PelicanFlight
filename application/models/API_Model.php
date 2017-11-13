<?php


class API_Model extends CI_Model
{

    // Constructor
    public function __construct()
    {
        parent::__construct();

    }
    
	//Retrieve airline data from WACKY Server
	
    public function airlines($airline=''){
		$response = file_get_contents('https://wacky.jlparry.com/info/airlines/'.$airline);
        $data = [];
		$data = json_decode($response, true);

        return $data;
    }
	
	//Retrieve airport data from WACKY Server
	
    public function airports($airport=''){
		$response = file_get_contents('https://wacky.jlparry.com/info/airports/'.$airport);
        $data = [];
		$data = json_decode($response, true);

        return $data;
    }
	
	//Retrieve airplane data from WACKY Server
	
    public function airplane($airplane=''){
		$response = file_get_contents('https://wacky.jlparry.com/info/airplane/'.$airplane);
        $data = [];
		$data = json_decode($response, true);

        return $data;
    }

	//Retrieve region data from WACKY Server
	
    public function region($region=''){
		$response = file_get_contents('https://wacky.jlparry.com/info/region/'.$region);
        $data = [];
		$data = json_decode($response, true);

        return $data;
    }

	

}