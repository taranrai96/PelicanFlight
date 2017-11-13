<?php

/*This is a controller that defines the view being dispay and pass
data to that review*/

defined('BASEPATH') OR exit('No direct script access allowed');

class FlightSearch extends Application
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}


	public function index()
	
	{
		$this->load->helper('form');
		// this is the view we want to show

		
		$options = array(
        'YVR' => 'Vancouver International Airport, YVR',
        'YPR' => 'Prince Rupert Airport, YPR',
        'YXS' => 'Prince George Airport, YXS',
        'YXC' => 'Cranbrook/Canadian Rockies International Airport, YXC',
		);
	
		
		$fields = array(
			'fsource'  => form_label('Source') . form_dropdown('source', $options),
			'fdestination'  => form_label('Destination') . form_dropdown('destination', $options),
			'zsubmit'    => form_submit('submit', 'Find your flight'),
		);
		
		$display = $this->session->userdata('display');

		$this->data = array_merge($this->data, $fields);
		$this->data = array_merge($this->data, array('thedisplay'=>$display));


		$this->data['pagebody'] = 'flightsearch';
		$this->render();

	}
	
		public function submit(){
			
			//$this->load->helper('array');
			
/* 			$this->data = $this->input->post();
			$this->data['pagebody'] = 'flightsearchresult';
			$this->render(); */
			
			$source = $this->input->post('source');
			$destination = $this->input->post('destination');
			
			$sources = $this->flight_model->all();
			$tasks = array();
			
			foreach($sources as $task) {
				$tasks[] = $task;
			}
			
			if ($source == $destination){
				$this->session->set_userdata('display', 'Base and destination cannot be the same.');
			}
			else if ($source == 'YVR') {
				$returnstring = '';
				foreach($sources as $task) {
					if ($task->dest ==$destination)
						$returnstring .= 'YVR -> '. $task->dest. ', '. $task->departureTime. ' to '. $task -> arrivalTime. '</br>';
				}
				$this->session->set_userdata('display',$returnstring);
			} else if ($destination == 'YVR'){
				$returnstring = '';
				foreach($sources as $task) {
					if ($task->base ==$source)
						$returnstring .= $task->base. '-> YVR' . ', '. $task->departureTime. ' to '. $task -> arrivalTime. '</br>';
				}
				$this->session->set_userdata('display',$returnstring);
			} else {
				$secondleg = '';
				foreach($sources as $task) {
					if ($task->base ==$source && $task->dest == 'YVR'){
						$firstleg = $task->base. ' -> YVR' . ', '. $task->departureTime. ' to '. $task -> arrivalTime;
						break;
					}
				}
				foreach($sources as $task) {
					if ($task->base =='YVR' && $task->dest == $destination)
						$secondleg = 'YVR -> '. $destination . ', '. $task->departureTime. ' to '. $task -> arrivalTime;
				}
				$this->session->set_userdata('display',$firstleg. ' and then '. $secondleg);
			}
			
			//$this->parser->parse('flighttest', $tasks[1]);
			
			$this->index();
			
		}
	
}
