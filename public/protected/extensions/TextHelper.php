<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TextHelper
 *
 * @author Rux
 */
class TextHelper {
    public static function limitText($text, $limit=60) {
       /* if (str_word_count($text, 0) > $limit) {
            $words = str_word_count($text, 2);
            $pos = array_keys($words);
            $text = substr($text, 0, $pos[$limit]) . '...';
        }
        
        return $text;*/
        
        $newText = iconv_substr($text, 0,$limit, "UTF-8");
        $len = iconv_strlen($text, "UTF-8");
        
        if ($len>$limit){
            $newText .= '...';
        }
        
        return $newText;
    }
    
    public static function htmlEncode($text){
        return htmlentities($text, ENT_QUOTES | ENT_XHTML, "UTF-8");
    }
}

?>
