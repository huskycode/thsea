<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SimpleSection
 *
 * @author Rux
 */
class VideoListVerticalSection  extends CWidget {
    public $Videos;
    public $HeaderName;
    
    public function run(){
        $this->render('VideoListVerticalSection');
    }
}

?>
