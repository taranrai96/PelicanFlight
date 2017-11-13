<?php
 use PHPUnit\Framework\TestCase;

 class FlightTest extends TestCase
  {  
  
	private $CI;
     
    public function setUp()
    {
        $this->CI = &get_instance();
		$this->CI->load->model('Flight');
    }
	  
    
    public function testSetPass()
    {
	   $this->assertEquals("T50", $this->CI->Flight->setFlightID("T50"));
       $this->assertEquals("2017-11-12 10:30:00", $this->CI->Flight->setDepartureTime("2017-11-12 10:30:00"));
	   $this->assertEquals("2017-11-12 20:00:00", $this->CI->Flight->setArrivalTime("2017-11-12 20:00:00"));
	   $this->assertEquals('YPR', $this->CI->Flight->setBase('YPR'));
	   $this->assertEquals('YVR', $this->CI->Flight->setDest('YVR'));
    }
	
	
	public function testSetFail()
    {
	   $this->assertEquals(-1, $this->CI->Flight->setFlightID("A50"));
       $this->assertEquals(-1, $this->CI->Flight->setDepartureTime("2017-11-12 07:50:00"));
	   $this->assertEquals(-1, $this->CI->Flight->setArrivalTime("2017-11-13 23:50:00"));
	   $this->assertEquals(-1, $this->CI->Flight->setBase('PPR'));
	   $this->assertEquals(-1, $this->CI->Flight->setDest('YVX'));
    }
  }
