<?php
/*This is a controller that responds a list of plans as json notation*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Info extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

    //function that returns json information about fleets 
	public function fleets_info()
	{
		$record = $this->fleet_model->all();
		header("Content-type: application/json");
		echo json_encode($record);
}

	//function that returns json information about flights
	public function flights_info()
	{
		$record = $this->flight_model->all();
		header("Content-type: application/json");
		echo json_encode($record);
}
}