<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Flight extends Application
{

	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/
	 * 	- or -
	 * 		http://example.com/welcome/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'flight';
		
		// build the list of authors, to pass on to our view
		$source = $this->flights->all();

		// pass on the data to present, as the "authors" view parameter
		$this->data['trip'] = $source;	
		
		$this->render(); 
	}

}
