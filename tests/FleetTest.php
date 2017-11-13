<?php
 use PHPUnit\Framework\TestCase;

 class FleetTest extends TestCase
  {  
  
	private $CI;
     
    public function setUp()
    {
        $this->CI = &get_instance();
		$this->CI->load->model('Fleet');
    }
	  
    
    public function testSetPass()
    {
	   $this->assertEquals(005, $this->CI->Fleet->setVehicleID(005));
       $this->assertEquals("Baron", $this->CI->Fleet->setModel("Baron"));
	   $this->assertEquals(4, $this->CI->Fleet->setSeats(4));
	   $this->assertEquals(1948, $this->CI->Fleet->setReach(1948));
	   $this->assertEquals(373, $this->CI->Fleet->setCruise(373));
	   $this->assertEquals(701, $this->CI->Fleet->setTakeoff(701));
	   $this->assertEquals(340, $this->CI->Fleet->setHourly(340));
    }
	
	
	public function testSetFail()
    {
	   $this->assertEquals(-1, $this->CI->Fleet->setVehicleID("1ab"));
       $this->assertEquals(-1, $this->CI->Fleet->setModel("abc"));
	   $this->assertEquals(-1, $this->CI->Fleet->setSeats(-4));
	   $this->assertEquals(-1, $this->CI->Fleet->setReach("abc"));
	   $this->assertEquals(-1, $this->CI->Fleet->setCruise("abc"));
	   $this->assertEquals(-1, $this->CI->Fleet->setTakeoff("abc"));
	   $this->assertEquals(-1, $this->CI->Fleet->setHourly("abc"));
    }
  }
