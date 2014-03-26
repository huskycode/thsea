<?php 

class VideoServiceTest extends CDbTestCase {

    public $fixtures=array(
        'fixture'=>'fixture',
    );

    public function setUp() {
    	$this->video = new VideoService();
    } 

    public function testCountAllVideoTag() {
 		
        $this->assertEquals(2,$this->video->countAllVideoTag('Exp-Sharing'));
        $this->assertEquals(4,$this->video->countAllVideoTag('Agile Thailand 2013'));
	    $this->assertEquals(1,$this->video->countAllVideoTag('Workshop'));

	}

    public function tearDown() {
    	unset($this->video);
    }
}

?>