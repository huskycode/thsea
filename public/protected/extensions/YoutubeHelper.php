<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of YoutubeHelper
 *
 * @author rux
 */
class YoutubeHelper {
    public static function getVideoId($url) {   
        $videoId = $url;
        
        if (strtolower(substr($url, 0, 4)) == 'http') {
            $matches = array();

            preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);

            if (count($matches) > 0) {
                $videoId = $matches[0];
            }
        }

        return $videoId;
    }
}
