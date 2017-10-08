<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fleet extends CI_Controller
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
		$record = $this->fleets->all();
		header("Content-type: application/json");
		echo json_encode($record);
}
	//contributed by nelson
}
