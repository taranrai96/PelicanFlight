<?php

/**
 * This is a "Flight" model for unit testing.
 * @author Judy
 */


class Flight extends Entity

{
	private $FlightID;
	private $DepartureTime;
	private $ArrivalTime;
	private $Base;
	private $Dest;
	
	// Constructor
	public function __construct()
    {
		parent::__construct();
	}
	
		
	// Rule: First character must start with 'T'; Rest must be number
	function setFlightID($value)
	{
		if(($value[0] == 'T') && (is_numeric(substr($value, 1))))
		{
			return $this->FlightID = $value;
		}
			return -1;
	}
	
	
	// Rule: No early than 8am
	function setDepartureTime($value)
	{
		$time = strtotime($value);
		$date = date("H:i:s", $time);
		
		if($date > "08:00:00") {			
			return $this->DepartureTime = $value;
		}
		return -1;	
	}
	
	// Rule: No late than 10pm 	
	function setArrivalTime($value)
	{		
		$time = strtotime($value);
		$date = date("H:i:s", $time);
		
		if($date < "22:00:00") {			
			return $this->ArrivalTime = $value;
		}
		return -1;
	}

	// Rule: 'YVR' or 'YPR' or 'YXS' or 'YXC'	
	function setBase($value)
	{
		if(($value == 'YVR') || ($value == 'YPR') ||
		   ($value == 'YXS') || ($value == 'YXC'))
		{
			return $this->Base = $value;
		}
		return -1;
	}
	
	// Rule: 'YVR' or 'YPR' or 'YXS' or 'YXC'	
	function setDest($value)
	{
		if(($value == 'YVR') || ($value == 'YPR') ||
		   ($value == 'YXS') || ($value == 'YXC'))
		{
			return $this->Dest = $value;
		}
		return -1;
	}
}
