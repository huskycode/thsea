<?php
class VideoService
{
    public static function countAllVideoTag($tagName)
    {
        if (isset($tagName) && $tagName != '') 
        {
            $videoTags = VideoTag::model()->findAll(array(
                'select' => 'video_id',
                'condition' => sprintf("tag='%s'", $tagName),
                'group' => 'video_id',
                'distinct' => true,
            ));
            return count($videoTags);
        }
        return 0;
    }

}
