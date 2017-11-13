<?php
   use PHPUnit\Framework\TestCase;

   class FleetListTest extends TestCase
  {  
  
	private $CI;
     
    public function setUp()
    {
        $this->CI = &get_instance();
		$this->CI->load->model('Fleet_model');
    }
	  
    
    public function testMoreRule ()
    {
	   $fleets = $this->CI->Fleet_model->all();
	   $sum = 0;

	   // Rule: sum <= $10million
	   foreach ($fleets as $fleet)
	   {
		   $sum += $fleet->price;
	   }
	   
	   $result = $sum <= 10000 ? true : false;		   
	   $this->assertEquals(true, $result);
    }

  }
