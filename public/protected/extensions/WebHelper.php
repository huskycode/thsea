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
}

?>
