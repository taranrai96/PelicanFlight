<?php

/**
 * This is a "Fleets" model for planes, but with bogus hard-coded data,
 * so that we don't have to worry about any database setup.
 * This would be considered a "mock database" model.
 *
 * @author chris
 */

class Fleets extends CI_Model

{

	var $data = array(
		'1'	 => array('vehicleID'	=> '001', 'id'	=> 'baron',
			'manufacturer'	 => 'Beechcraft', 'model'	=> 'Baron', 'price'	=> '1350',
			'seats'	=> '4', 'reach' => '1948', 'cruise' =>	'373', 'takeoff'	=>	'701',
			'hourly'	=>	'340'),
		'2'	 => array('vehicleID'	=> '002', 'id'	=> 'mustang',
			'manufacturer'	 => 'Cessna', 'model'	=> 'Citation Mustang', 'price'	=> '2770',
			'seats'	=> '4', 'reach' => '2130', 'cruise' =>	'630', 'takeoff'	=>	'950',
			'hourly'	=>	'1015'),
		'3'	 => array('vehicleID'	=> '003', 'id'	=> 'citation',
			'manufacturer'	 => 'Cessna', 'model'	=> 'Citation M2', 'price'	=> '3200',
			'seats'	=> '7', 'reach' => '1550', 'cruise' =>	'748', 'takeoff'	=>	'978',
			'hourly'	=>	'1122'),
		'4'	 => array('vehicleID'	=> '004', 'id'	=> 'caravan',
			'manufacturer'	 => 'Cessna', 'model'	=> 'Grand Caravan EX', 'price'	=> '2330',
			'seats'	=> '14', 'reach' => '1689', 'cruise' =>	'340', 'takeoff'	=>	'660',
			'hourly'	=>	'389')
		
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

	// retrieve a single fleet, null if not found
	public function get($which)
	{
		return !isset($this->data[$which]) ? null : $this->data[$which];
	}

	// retrieve all of the fleets
	public function all()
	{
		return $this->data;
	}
	
	// retrive total number of fleets
	public function getCount()
	{
		return count($this->data);
	}

}
