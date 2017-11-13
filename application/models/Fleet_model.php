<?php

/**
 * This is a "Fleets" model for planes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author chris
 */

class Fleet_model extends CSV_Model

{
	// Constructor
	public function __construct()
	{
		parent::__construct(APPPATH . '../data/Fleet.csv', 'vehicleID');
		
	}

		// Retrieve an existing collection record as an object
	function get($key, $key2 = null)
	{
		return (isset($this->_data[$key])) ? $this->_data[$key] : null;

	}

}
