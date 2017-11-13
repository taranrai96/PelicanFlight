<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MtceFlight extends Application {


	private $items_per_page = 10;

		public function index()
		{
			$this->page(1);
		}

		// Show a single page of todo items
		private function show_page($flights)
		{

			$this->load->library('session');
			$role = $this->session->userdata('userrole');
			$this->data['pagetitle'] = 'Flight List Maintenance ('. $role . ')';
			// build the task presentation output
			$result = ''; // start with an empty array      
			foreach ($flights as $flight)
			{
				if ($role == ROLE_ADMIN)
					$result .= $this->parser->parse('oneitemFlightx', (array) $flight, true);
				else
					$result .= $this->parser->parse('oneitemFlight', (array) $flight, true);
			}
			$this->data['display_flight'] = $result;

			// and then pass them on
			$this->data['pagebody'] = 'itemlistFlight';
			$this->render();
		}
		
		// Extract & handle a page of items, defaulting to the beginning
		function page($num = 1)
		{
			$records = $this->flight_model->all(); // get all the fleet
			$flight = array(); // start with an empty extract

			// use a foreach loop, because the record indices may not be sequential
			$index = 0; // where are we in the tasks list
			$count = 0; // how many items have we added to the extract
			$start = ($num - 1) * $this->items_per_page;
			foreach($records as $item) {
				if ($index++ >= $start) {
					$flight[] = $item;
					$count++;
				}
				if ($count >= $this->items_per_page) break;
			}
			
			$this->data['pagination'] = $this->pagenav($num);
			
			$this->load->library('session');
			$role = $this->session->userdata('userrole');
			if ($role == ROLE_ADMIN) 
					$this->data['pagination'] .= $this->parser->parse('itemaddFlight',[], true);

			//var_dump($fleet);exit();
			$this->show_page($flight);
		}
		
		// Build the pagination navbar
		private function pagenav($num) {
			$lastpage = ceil($this->flight_model->size() / $this->items_per_page);
			$parms = array(
				'first' => 1,
				'previous' => (max($num-1,1)),
				'next' => min($num+1,$lastpage),
				'last' => $lastpage
			);
			return $this->parser->parse('itemnavFlight',$parms,true);
		}
		
		// Initiate adding a new task
		public function add()
		{
			$this->load->library('session');
			$task = $this->flight_model->create();
			$this->session->set_userdata('task', $task);
			$this->showit();
		}
		
				// initiate editing of a task
		public function edit($id = null)
		{

			if ($id == null)
				redirect('/mtceFlight');
			$fleet = $this->flight_model->get($id);

			$this->load->library('session');
			$this->session->set_userdata('task', $fleet);
			$this->showit();
		}
		
				// Render the current DTO
		private function showit()
		{
			$this->load->helper('form');
			$this->load->library('session');
			$task = $this->session->userdata('task');
			$this->data['id'] = $task->flightID;

			// if no errors, pass an empty message
			if ( ! isset($this->data['error']))
				$this->data['error'] = '';

			$fields = array(
				'fflightID' => form_label('FlightID') . form_input('flightID',$task->flightID),
				'fvehicleID'  => form_label('VehicleID') . form_input('vehicleID',$task->vehicleID),
				'fdepartureTime' => form_label('DepartureTime') . form_input('departureTime',$task->departureTime),
				'farrivalTime' => form_label('ArrivalTime') . form_input('arrivalTime',$task->arrivalTime),
				'fbase' => form_label('Base') . form_input('base', $task->base),
				'fdest' => form_label('Dest') . form_input('dest', $task->dest),
				'zsubmit'    => form_submit('submit', 'Update'),
			);			

			$this->data = array_merge($this->data, $fields);
			$this->data['pagebody'] = 'itemeditFlight';
			$this->render();
		}
		
				// handle form submission
		public function submit()
		{
			
			// setup for validation
			//$this->load->library('form_validation');
			//$this->form_validation->set_rules($this->fleet->rules());

			// retrieve & update data transfer buffer
			$this->load->library('session');
			$task = (array) $this->session->userdata('task');

			$task = array_merge($task, $this->input->post());
	

			$task = (object) $task;  // convert back to object
			$this->session->set_userdata('task', (object) $task);

			// validate away
			//if ($this->form_validation->run())
			//{
				//var_dump($task->vehicleID);

				//$this->flight_model->get($task->flightID);
				if (($this->flight_model->get($task->flightID) == null))
				{
					
					$this->flight_model->add($task);
					$this->alert('Flight ' . $task->flightID . ' added', 'success');
				} else
				{
					//var_dump($task);
					$this->flight_model->update($task);
					$this->alert('Flight ' . $task->flightID . ' updated', 'success');
				}
			//} else
			//{
			//	$this->alert('<strong>Validation errors!<strong><br>' . validation_errors(), 'danger');
			//}
			$this->showit();
		}
		
		// build a suitable error mesage
		private function alert($message) {
			$this->load->helper('html');        
			$this->data['error'] = heading($message,3);
		}
		
		// Forget about this edit
		function cancel() {
			$this->load->library('session');
			$this->session->unset_userdata('task');
			redirect('/mtceFlight');
		}
		
		// Delete this item altogether
		function delete()
		{
			$this->load->library('session');
			$dto = $this->session->userdata('task');
			$task = $this->flight_model->get($dto->flightID);
			$this->flight_model->delete($task->flightID);
			$this->session->unset_userdata('task');
			redirect('/mtceFlight');
		}

}



