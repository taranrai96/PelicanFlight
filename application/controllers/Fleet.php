<?php

/*This is a controller that defines the view being dispay and pass
data to that review*/

defined('BASEPATH') OR exit('No direct script access allowed');

class Fleet extends Application
{
	
	function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'fleet';
		
		// build the list of plans, to pass on to our view
		$source = $this->fleets->all();

		// pass on the data to present, as the "vehicles" view parameter
		$this->data['vehicles'] = $source;	
		
		$this->render(); 
	}
	
	/**
     * Show just one airplane
     */
    public function show($key)
    {		
		// this is the view we want shown
		$this->data['pagebody'] = 'fleet';

		// build the list of airplanes, to pass on to our view
		$source = $this->airplane->get($key);

		// pass on the data to present, as the "vehicles" view parameter
		$this->data['vehicles'] = $source;
		
		// pass on the data to present, adding the author record's fields
		$this->data = array_merge($this->data, (array) $source);

		$this->render();
    }
}
