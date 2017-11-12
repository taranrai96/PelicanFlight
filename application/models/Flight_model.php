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

}
