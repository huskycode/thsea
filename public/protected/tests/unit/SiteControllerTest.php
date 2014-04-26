<?php 
 
Yii::import('application.controllers.SiteController');
 
class SiteControllerTest extends CDbTestCase {

    public $fixtures = array(
            'videos'=>'Video',
            'videos_tag'=>'VideoTag',
    );    
 
    public function setUp() {
        $this->site = new SiteController(0);
    }

 
    public function testgetVideoTagList() {
        
	//      'videoTagHorizontalList' => array('Workshop'=>1, 'Exp-Sharing'=>2,'Agile Thailand 2013'=>3),
  	//      'videoTagVerticalList' => array('Technical'=>2, 'Lean'=>1),
        $this->assertNotNull($this->site->getVideoTagList('videoTagHorizontalList'));
        $this->assertNotNull($this->site->getVideoTagList('videoTagVerticalList'));

	}

    public function testgetVideoByEmptyTagShouldReturnEmptyArray() {

        $this->assertEquals(array(), $this->site->getVideosByTag(''));

    }

    public function testgetVideoByNullTagShouldReturnEmptyArray() {

        $this->assertEquals(array(), $this->site->getVideosByTag(null));

    }

    public function testgetVideoTagsByTag_IfNotFoundTag_ShouldReturnEmptyArray() {

        $siteMock = new SiteController_WithDefinedVideoTag(array());

        $this->assertEquals(array(), $siteMock->getVideosByTag('Workshop'));

    }   

    public function testgetVideoTagsByTag_IfFoundTagWorkshop_ShouldReturnVideoArrayTagWorkshop() {

        $videoTags = array();
        $videoTags[0] = new VideoTag;
        $videoTags[0]->video_id = '4147';

        $siteMock = new SiteController_WithDefinedVideoTag($videoTags);

        //print_r($siteMock->getVideosByTag('Workshop'));
        $this->assertEquals(1, count($siteMock->getVideosByTag('Workshop')));

    }     
    
    public function testgetVideoTagsByTag_IfFoundTagWorkshop_ShouldReturnVideoArrayTagWorkshop2(){
        $videoTags = array();
        $videoTags[0] = new VideoTag;
        $videoTags[0]->video_id = '4147';
        
        $stub = $this->getMockBuilder('SiteController')
                     ->disableOriginalConstructor()
                     ->setMethods(array('getVideoTagsByTag'))
                     ->getMock();
        
        $stub->expects($this->any())
             ->method('getVideoTagsByTag')
             ->will($this->returnValue($videoTags));    
     
        $this->assertEquals(1, count($stub->getVideosByTag('Workshop')));
    }

    public function tearDown() {
        unset($this->site);
    }
    
}
 
class SiteController_WithDefinedVideoTag extends SiteController {

    private $videotag;

    function __construct ($videoTag) {

        $this->videotag = $videoTag;
        parent::__construct(0);

    }

    public function getVideoTagsByTag($tag) {
        return $this->videotag;

    }
}

?>




















