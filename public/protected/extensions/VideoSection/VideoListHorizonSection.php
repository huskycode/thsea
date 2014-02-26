<?php
class VideoListHorizonSection extends CWidget {
    public $HeaderName;
    public $Videos;
    public $tagId = '';
    public $isTag = true;
    
    public function run(){
        $this->render('VideoListHorizonSection');
    }
}