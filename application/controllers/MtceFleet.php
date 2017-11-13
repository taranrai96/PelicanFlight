<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MtceFleet extends Application {


	private $items_per_page = 10;

		public function index()
		{
			$this->page(1);
		}

		// Show a single page of todo items
		private function show_page($fleets)
		{

			$this->load->library('session');
			$role = $this->session->userdata('userrole');
			$this->data['pagetitle'] = 'Fleet List Maintenance ('. $role . ')';
			// build the task presentation output
			$result = ''; // start with an empty array      
			foreach ($fleets as $fleet)
			{
				if ($role == ROLE_ADMIN)
					$result .= $this->parser->parse('oneitemx', (array) $fleet, true);
				else
					$result .= $this->parser->parse('oneitem', (array) $fleet, true);
			}
			$this->data['display_fleet'] = $result;

			// and then pass them on
			$this->data['pagebody'] = 'itemlist';
			$this->render();
		}
		
		// Extract & handle a page of items, defaulting to the beginning
		function page($num = 1)
		{
			$records = $this->fleet_model->all(); // get all the fleet
			$fleet = array(); // start with an empty extract

			// use a foreach loop, because the record indices may not be sequential
			$index = 0; // where are we in the tasks list
			$count = 0; // how many items have we added to the extract
			$start = ($num - 1) * $this->items_per_page;
			foreach($records as $item) {
				if ($index++ >= $start) {
					$fleet[] = $item;
					$count++;
				}
				if ($count >= $this->items_per_page) break;
			}
			
			$this->data['pagination'] = $this->pagenav($num);
			
			$this->load->library('session');
			$role = $this->session->userdata('userrole');
			if ($role == ROLE_ADMIN) 
					$this->data['pagination'] .= $this->parser->parse('itemadd',[], true);

			//var_dump($fleet);exit();
			$this->show_page($fleet);
		}
		
		// Build the pagination navbar
		private function pagenav($num) {
			$lastpage = ceil($this->fleet_model->size() / $this->items_per_page);
			$parms = array(
				'first' => 1,
				'previous' => (max($num-1,1)),
				'next' => min($num+1,$lastpage),
				'last' => $lastpage
			);
			return $this->parser->parse('itemnav',$parms,true);
		}
		
		// Initiate adding a new task
		public function add()
		{
			$this->load->library('session');
			$task = $this->fleet_model->create();
			$this->session->set_userdata('task', $task);
			$this->showit();
		}
		
				// initiate editing of a task
		public function edit($id = null)
		{

			if ($id == null)
				redirect('/mtceFleet');
			$fleet = $this->fleet_model->get($id);

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
			$this->data['id'] = $task->vehicleID;

			// if no errors, pass an empty message
			if ( ! isset($this->data['error']))
				$this->data['error'] = '';

			$fields = array(
				'fvehicleID' => form_label('VehicleID') . form_input('vehicleID',$task->vehicleID),
				'fmodel'  => form_label('Model') . form_input('model',$task->model),
				'fseats' => form_label('Seats') . form_input('seats',$task->seats),
				'freach' => form_label('Reach') . form_input('reach',$task->reach),
				'fcruise' => form_label('Cruise') . form_input('cruise', $task->cruise),
				'ftakeoff' => form_label('Takeoff') . form_input('takeoff', $task->takeoff),
				'fhourly' => form_label('Hourly') . form_input('hourly', $task->hourly),
				'zsubmit'    => form_submit('submit', 'Update'),
			);			

			$this->data = array_merge($this->data, $fields);
			$this->data['pagebody'] = 'itemedit';
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

				//$this->fleet_model->get($task->vehicleID);
				if (($this->fleet_model->get($task->vehicleID) == null))
				{
					
					$this->fleet_model->add($task);
					$this->alert('Fleet ' . $task->vehicleID . ' added', 'success');
				} else
				{
					//var_dump($task);
					$this->fleet_model->update($task);
					$this->alert('Fleet ' . $task->vehicleID . ' updated', 'success');
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
			redirect('/mtceFleet');
		}
		
		// Delete this item altogether
		function delete()
		{
			$this->load->library('session');
			$dto = $this->session->userdata('task');
			$task = $this->fleet_model->get($dto->vehicleID);
			$this->fleet_model->delete($task->vehicleID);
			$this->session->unset_userdata('task');
			redirect('/mtceFleet');
		}

}



