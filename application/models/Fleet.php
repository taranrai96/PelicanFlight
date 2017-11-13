<?php

/**
 * This is a "Fleet" model for unit testing.
 * @author Judy
 */


class Fleet extends Entity

{
	private $VehicleID;
	private $Model;
	private $Seats;
	private $Reach;
	private $Cruise;
	private $Takeoff;
	private $Hourly;
	
	// Constructor
	public function __construct()
    {
		parent::__construct();
	}
	
		
	// Rule: Input must be a number
	function setVehicleID($value)
	{
		if(is_numeric($value))
		{
			return $this->VehicleID = $value;
		}
			return -1;
	}
	
	
	// Rule: 'Baron' or 'Citation Mustang' or 'Citation M2'
	function setModel($value)
	{
		if(($value == 'Baron') || ($value == 'Citation Mustang') ||
		   ($value == 'Citation M2'))
		{
			return $this->Model = $value;
		}
		return -1;
	}
	
	// Rule: Input must be a positive number	
	function setSeats($value)
	{
		if(is_numeric($value) && $value > 0)
		{
			return $this->Seats = $value;
		}
		return -1;
	}

	// Rule: Input must be a positive number	
	function setReach($value)
	{
		if(is_numeric($value) && $value > 0)
		{
			return $this->Reach = $value;
		}
		return -1;
	}
	
	// Rule: Input must be a positive number	
	function setCruise($value)
	{
		if(is_numeric($value) && $value > 0)
		{
			return $this->Cruise = $value;
		}
		return -1;
	}
	
	// Rule: Input must be a positive number	
	function setTakeoff($value)
	{
		if(is_numeric($value) && $value > 0)
		{
			return $this->Takeoff = $value;
		}
		return -1;
	}
	
	// Rule: Input must be a positive number	
	function setHourly($value)
	{
		if(is_numeric($value) && $value > 0)
		{
			return $this->Hourly = $value;
		}
		return -1;
	}
}
