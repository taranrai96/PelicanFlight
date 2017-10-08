<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Flight extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		$record = $this->flights->all();
		header("Content-type: application/json");
		echo json_encode($record);
}
	//contributed by nelson
}
