<?php
class VideoListHorizonSection extends CWidget {
    public $HeaderName;
    public $Videos;
    public $showTag = false;
    
    public function run(){
        $this->render('VideoListHorizonSection');
    }
}