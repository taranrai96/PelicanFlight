<?php

/**
 * This is a "Flights" model for planes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author chris
 */

class Flight_model extends CSV_Model

{
	// Constructor
	public function __construct()
	{
		parent::__construct(APPPATH . '../data/Flights.csv', 'flightID');
		
	}

	/**
	// retrieve a single flight, null if not found
	public function get($which)
	{
		return !isset($this->data[$which]) ? null : $this->data[$which];
	}

	// retrieve all of the flights
	public function all()
	{
		return $this->data;
	}
	
	// retrive total number of flights
	public function getCount()
	{
		return count($this->data);
	}
	*/

}
