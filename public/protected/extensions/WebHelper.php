<?php
class WebHelper {
    public static function renderTags($videoTags, $route='site/list') {
        $tags_link = array();
        foreach ($videoTags as $tag) {
            $url = Yii::app()->createUrl($route,array('tag'=>$tag->tag));
            $tags_link[] = sprintf('<a href="%s">%s</a>', $url, $tag->tag);
        }

        if (count($tags_link) > 0) {
            echo implode(", ", $tags_link);
        } else {
            echo "-";
        }
    }
    
    public static function displayContent($text) {
        $text = nl2br($text);
        return preg_replace("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie", "'<a href=\"$1\" target=\"_blank\">$3</a>$4'", $text);
    }
    
    public static function permalize($input) {
	return str_replace(' ','-',strtolower(trim(preg_replace("/[^a-zA-Z0-9 ]/", '', $input))));
    }
}

?>
