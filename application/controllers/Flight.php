<?php
/*This is a controller that defines the view being dispay and pass
data to that review*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Flight extends Application
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'flight';
		
		// build the list of authors, to pass on to our view
		$source = $this->flights->all();

		// pass on the data to present
		$this->data['trip'] = $source;	
		
		$this->render(); 
	}

}
