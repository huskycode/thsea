<?php

class VideoServiceTest extends CDbTestCase {
    
    public $fixtures = array(
            'videos'=>'Video',
            'videos_tag'=>'VideoTag',
    );  

    public function setUp() {

        parent::setUp();
        $this->video = new VideoService(0);
    }

    public function testCountAllVideoTag() {
        $this->assertEquals(2, $this->video->countAllVideoTag('Exp-Sharing'));
        $this->assertEquals(4, $this->video->countAllVideoTag('Agile Thailand 2013'));
        $this->assertEquals(1, $this->video->countAllVideoTag('Workshop'));
    }    

    public function testgetVideoByEmptyTagShouldReturnEmptyArray() {

        $this->assertEquals(array(), $this->video->getVideosByTag(''));
    }

    public function testgetVideoByNullTagShouldReturnEmptyArray() {

        $this->assertEquals(array(), $this->video->getVideosByTag(null));
    }

    public function testgetVideosByTag_IfFoundTagWorkshop_ShouldReturnVideoArrayTagWorkshop() {
 /*       $videoTags = array();
        $videoTags[0] = new VideoTag;
        $videoTags[0]->video_id = '4147';

        $stub = $this->getMockBuilder('VideoService')
                ->disableOriginalConstructor()
                ->setMethods(array('getVideoIdsByTag'))
                ->getMock();

        $stub->expects($this->any())
                ->method('getVideoIdsByTag')
                ->will($this->returnValue($videoTags));
*/
        $videos = VideoService::getVideosByTag('Workshop');
        $this->assertEquals(1, count($videos));
        $this->assertEquals(4147, $videos[0]->id);
    }
    
    public function testgetVideosByTag_IfTagNotFound_ShouldReturnEmptyVideoArray(){
        $this->assertEquals(array(), VideoService::getVideosByTag('ABC'));
    }

    public function testgetVideoByTag_ShouldOrderRecordingDate_FromLatest_ToOldest() {

        $videos = VideoService::getVideosByTag('Test-Order');

        $videoRecording_dates = array_map(
                function($result_video){ return $result_video->recording_date;},
                $videos); 

        $this->validateArraySortByDescendingOrder($videoRecording_dates);
  
    }

    public function testgetVideoByTag_ShouldLimitByAmount() {

        $videos = VideoService::getVideosByTag('Test-Order',1);
        $this->assertEquals(1, count($videos));
  
    }

    private function validateArraySortByDescendingOrder( $array_list ) {

        $originate = $array_list;
        rsort($array_list);

        $this->assertEquals($array_list, $originate); 

    }

    public function tearDown() {
        unset($this->video);
    }

}

?>