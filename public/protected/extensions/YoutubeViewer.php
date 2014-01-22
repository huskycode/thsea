<?php

/**
 * Description of YoutubeViewer
 *
 * @author Rux
 */
class YoutubeViewer extends CWidget {

    public $url;
    public $width;
    public $height;
    public $display;
    public $alt;
    public $imageUrl;
	

    const DISPLAY_VIDEO = 'video';
    const DISPLAY_IMAGE = 'image';
	const SOURCE_IMAGE = 'source_image';

    public function run() {       

        if (strtolower($this->display) == self::DISPLAY_IMAGE) {
            $this->renderImage();
        } else if (strtolower($this->display) == self::SOURCE_IMAGE) {
			$this->renderSource();
		} else {
            $this->renderVideo();
        }
    }

    private function getVideoId() {        
        if (strtolower(substr($this->url, 0, 4)) == 'http') {
            $matches = array();

            preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $this->url, $matches);

            if (count($matches) > 0) {
                return $matches[0];
            }
        }

        return $this->url;
    }

    private function renderVideo() {
        echo '<iframe width="' . $this->width . '" height="' . $this->height . '" src="//www.youtube.com/embed/' . $this->getVideoId() . '" frameborder="0"></iframe>';
    }

    private function renderImage() {
        $image_url = '';
        
         if (!isset($this->imageUrl) || $this->imageUrl == '') {
            $image_name = 'sddefault.jpg';

            if ($this->width > 200) {
                $image_name = 'maxresdefault.jpg';
            }
            
            $image_url = 'http://img.youtube.com/vi/' . $this->getVideoId() . '/' . $image_name;
        } else {        
           $image_url = $this->imageUrl;
        }
        
        echo '<img alt="' . $this->alt . '" src="' . $image_url . '" border="0" width="' . $this->width . 'px" height="' . $this->height . 'px" />';
    }
	
    private function renderSource() {
        $image_name = 'sddefault.jpg';

        if ($this->width > 200) {
            $image_name = 'maxresdefault.jpg';
        }
        //echo 'http://img.youtube.com/vi/' . $this->getVideoId() . '/' . $image_name;
		
		echo '<div data-src="http://img.youtube.com/vi/'. $this->getVideoId() . '/' . $image_name .'" data-link="/video">
			  <div class="camera_caption fadeFromBottom">'. $this->alt .'</div></div>';
		
    }	

}

?>