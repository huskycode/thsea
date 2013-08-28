<?php
/**
 * Description of YoutubeViewer
 *
 * @author Rux
 */
class YoutubeViewer extends CWidget {
    public $v;
    public $width;
    public $height;
    public $display;
    public $alt;
    
    const DISPLAY_VIDEO = 'video';    
    const DISPLAY_IMAGE = 'image';
    
    public function run() {
        if (!isset($this->v) || $this->v==''){
            echo "Please specify 'v'.";
            return;
        }
        
        if(strtolower($this->display)==self::DISPLAY_IMAGE){
           $this->renderImage();
        } else {
           $this->renderVideo();
        }
    }
    
    private function getVideoId(){
        if(strtolower(substr($this->v, 0, 4))=='http'){
             preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", 
            $this->v, 
            $matches);
            return $matches[0];
        }
        
        return $this->v;
    }
    
    private function renderVideo(){
        echo '<iframe width="'.$this->width.'" height="'.$this->height.'" src="//www.youtube.com/embed/'.$this->getVideoId().'" frameborder="0"></iframe>';
    }
    
    private function renderImage(){
        $image_name = 'sddefault.jpg';
        
        if ($this->width > 200){
            $image_name = 'maxresdefault.jpg';
        }
        echo '<img alt="'.$this->alt.'" src="http://img.youtube.com/vi/'.$this->getVideoId().'/'.$image_name.'" border="0" width="'.$this->width.'px" height="'.$this->height.'px" />';
    }
}

?>