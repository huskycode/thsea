<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SlideshareViewer
 *
 * @author rux
 */
class SlideshareViewer extends CWidget {
    public $url = '';
    
    public function run() {   
        if ($this->url==''){
            return;
        }
        
        $slideInfo = $this->getSlideInfo();
        echo $slideInfo['html'];
    }
    
    private function getSlideInfo(){
        $api = 'http://www.slideshare.net/api/oembed/2?url='.$this->url.'&format=json';
        $obj = null;
        $result = @file_get_contents($api);  
        
        if ($result){
            $obj =  CJSON::decode($result);
        }
   
        return $obj;
    }
}
