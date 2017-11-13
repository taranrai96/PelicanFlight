<?php
/*This is a controller that defines the initail view being dispay and pass
data to that review*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	public function index()
	{
		$this->data['pagebody'] = 'welcome';
		
		//pass on the data to present, to pass on to our view
		$numPlane = $this->fleet_model->size();
		$numFlight = $this->flight_model->size();
		
		// pass on the data to present, as the "numOfplane" view parameter
		$this->data['numOfplane'] = $numPlane;
		$this->data['numOfflight'] = $numFlight;
		
		$this->render(); 
	}

}
