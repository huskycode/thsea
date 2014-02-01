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
        $newText = static::substr_th($text, 0,$limit);
        $len = static::strlen_th($text);
        
        if ($len>$limit){
            $newText .= '...';
        }
        
        return $newText;
    }
    
    public static function htmlEncode($text){
        return htmlentities($text, ENT_QUOTES | ENT_XHTML, "UTF-8");
    }

    // Get string length for Character Thai
    public static function strlen_th($string) {
        $array = static::mb_strsplit($string);
        $count = 0;

        foreach($array as $value)
        {
            $ascii = ord(iconv("UTF-8", "TIS-620", $value ));

            if( !( $ascii == 209 ||  ($ascii >= 212 && $ascii <= 218 ) || ($ascii >= 231 && $ascii <= 238 )) )
            {
                $count += 1;
            }
        }
        return $count;
    }
    
    public static function substr_th($string, $start, $length) {            
        $length = ($length+$start)-1;
        $array = static::mb_strsplit($string);
        $count = 0;
        $return = "";

        for($i=$start; $i < count($array); $i++)
        {
            $ascii = ord(iconv("UTF-8", "TIS-620", $array[$i] ));

            if( $ascii == 209 ||  ($ascii >= 212 && $ascii <= 218 ) || ($ascii >= 231 && $ascii <= 238 ) )
            {
                //$start++;
                $length++;
            }

            if( $i >= $start )
            {
                $return .= $array[$i];
            }

            if( $i >= $length )
                break;
            }

        return $return;
    }
    
    
    // Convert a string to an array with multibyte string
    private static function mb_strsplit($string, $split_length = 1) {
        mb_internal_encoding('UTF-8');
        mb_regex_encoding('UTF-8'); 

        $split_length = ($split_length <= 0) ? 1 : $split_length;
        $mb_strlen = mb_strlen($string, 'utf-8');
        $array = array();
        $i = 0; 

        while($i < $mb_strlen)
        {
            $array[] = mb_substr($string, $i, $split_length);
            $i = $i+$split_length;
        }

        return $array;
    }
    
    
}

?>
