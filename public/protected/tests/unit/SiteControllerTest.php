<?php 
 
Yii::import('application.controllers.SiteController');
 
class SiteControllerTest extends CTestCase {
 
    public function setUp() {
        $this->site = new SiteController(0);
    }
 
    public function tearDown() {
        unset($this->site);
    }

    public function testBar() {
        $this->assertTrue("bar" != "foo");
    }
    
}
 
?>
