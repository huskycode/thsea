<?php 
 
Yii::import('application.controllers.SiteController');
 

//class SiteControllerTest extends CDbTestCase {
class SiteControllerTest extends CDbTestCase {

    public function setUp() {

        parent::setUp();
        $this->site = new SiteController(0);
    }
    
    public function testgetVideoTagList() {

        $this->assertNotNull($this->site->getVideoTagList('videoTagHorizontalList'));
        $this->assertNotNull($this->site->getVideoTagList('videoTagVerticalList'));
    }

    public function tearDown() {
        unset($this->site);
    }
  
}



?>




















