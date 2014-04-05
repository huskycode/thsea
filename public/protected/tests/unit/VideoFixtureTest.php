<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of VideoFixtureTest
 *
 * @author Rux
 */
class VideoFixtureTest extends CDbTestCase {
    public $fixtures = array(
            'videos'=>'Video'
    );
    
    public function testgetVideo_ByExistingId_ShouldReturnThatVideo(){        
        $video =  VideoService::getVideo(4143);
        $this->assertEquals(4143, $video->id);
    }
    
    public function testaddNewVideo_IfDuplicateUrlName_ShouldSaveFail(){
        $newVideo = new Video();
        $newVideo->title = "test title";
        $newVideo->description = "test desc";
        $newVideo->url = "http://youtube.com";
        $newVideo->url_name = "programmer-crisis-solved-with-agile";
        $newVideo->thumbnail_url = null;
        $newVideo->recording_date = "2014-04-05";
        $newVideo->posted_date = "2014-04-05";
        $newVideo->posted_by = "admin";
        $newVideo->view_counter = 1;
        
        $canSave = $newVideo->save();        
        $this->assertFalse($canSave);
    }
    
    public function testInvokeFixtureByName_ShouldReturnRightSpecifiedFixture(){
        $this->assertCount(1, $this->videos);
        $this->assertEquals(4143, $this->videos[0]['id']);        
    }
}

?>
