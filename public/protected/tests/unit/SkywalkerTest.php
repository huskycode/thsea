<?php 

class SkywalkerTest extends CDbTestCase {

    public $fixtures=array(
        'fixture'=>'fixture',
    );

    public function setUp() {
    	$this->skywalker = new Skywalker();
    } 

    public function testGetPersonName() {

        $skywalkerRecord = $this->skywalker->getPersonName(1);
        $this->assertEquals('luke',$skywalkerRecord[0]->name);
        //http://uat.seacademy.in.th/api/tags
    }

    public function tearDown() {
    	unset($this->skywalker);
    }
}

?>