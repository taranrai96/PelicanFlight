<?php

/*This is a controller that responds a list of plans as json notation*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Fleet extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

    //this is a defualt method when this controller is get called 
	public function index()
	{
		$record = $this->fleets->all();
		header("Content-type: application/json");
		echo json_encode($record);
}

}
