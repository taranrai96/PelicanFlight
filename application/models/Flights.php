<?php

/**
 * This is a "Flights" model for planes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author chris
 */

class Flights extends CI_Model

{

	var $data = array(
		'1'	 => array('vehicleID'	=> '003', 'FlightID'	=> 'T01',
			'departureTime'	 => '8:00', 'arrivalTime'	=> '9:15', 'base'	=> 'YVR',
			'dest'	=> 'YPR'),
		'2'	 => array('vehicleID'	=> '003', 'FlightID'	=> 'T02',
			'departureTime'	 => '9:45', 'arrivalTime'	=> '11:00', 'base'	=> 'YPR',
			'dest'	=> 'YVR'),
		'3'	 => array('vehicleID'	=> '002', 'FlightID'	=> 'T03',
			'departureTime'	 => '8:30', 'arrivalTime'	=> '9:30', 'base'	=> 'YVR',
			'dest'	=> 'YXS'),
		'4'	 => array('vehicleID'	=> '002', 'FlightID'	=> 'T04',
			'departureTime'	 => '10:30', 'arrivalTime'	=> '11:30', 'base'	=> 'YXS',
			'dest'	=> 'YVR'),
		'5'  => array('vehicleID'	=> '001', 'FlightID'	=> 'T05',
			'departureTime'	 => '9:00', 'arrivalTime'	=> '10:30', 'base'	=> 'YVR',
			'dest'	=> 'YXC'),
		'6'	 => array('vehicleID'	=> '001', 'FlightID'	=> 'T06',
			'departureTime'	 => '11:00', 'arrivalTime'	=> '12:30', 'base'	=> 'YXC',
			'dest'	=> 'YVR'),
		'7'	 => array('vehicleID'	=> '004', 'FlightID'	=> 'T07',
			'departureTime'	 => '14:00', 'arrivalTime'	=> '16:30', 'base'	=> 'YVR',
			'dest'	=> 'YPR'),
		'8'	 => array('vehicleID'	=> '004', 'FlightID'	=> 'T08',
			'departureTime'	 => '17:00', 'arrivalTime'	=> '19:30', 'base'	=> 'YPR',
			'dest'	=> 'YVR'),
		'9'	 => array('vehicleID'	=> '003', 'FlightID'	=> 'T09',
			'departureTime'	 => '13:00', 'arrivalTime'	=> '14:00', 'base'	=> 'YVR',
			'dest'	=> 'YXS'),
		'10' => array('vehicleID'	=> '003', 'FlightID'	=> 'T10',
			'departureTime'	 => '14:30', 'arrivalTime'	=> '15:30', 'base'	=> 'YXS',
			'dest'	=> 'YVR'),
		'11' => array('vehicleID'	=> '002', 'FlightID'	=> 'T12',
			'departureTime'	 => '14:15', 'arrivalTime'	=> '15:30', 'base'	=> 'YXC',
			'dest'	=> 'YVR')

	);

	// Constructor
	public function __construct()
	{
		parent::__construct();

		// inject each "record" key into the record itself, for ease of presentation
		foreach ($this->data as $key => $record)
		{
			$record['key'] = $key;
			$this->data[$key] = $record;
		}
	}

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

}
