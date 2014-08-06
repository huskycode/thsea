<?php
/**
 * Description of YoutubeSyncSlideshareViewer
 *
 * @author rux
 */
class YoutubeSyncSlideshareViewer {
    public $url;
    public $width;
    public $height;
    
    public function run() { 
        $this->render('YoutubeSyncSlideshareViewer');        
    }
    
    public function getVideoId() {        
        if (strtolower(substr($this->url, 0, 4)) == 'http') {
            $matches = array();

            preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $this->url, $matches);

            if (count($matches) > 0) {
                return $matches[0];
            }
        }

        return $this->url;
    }
}
