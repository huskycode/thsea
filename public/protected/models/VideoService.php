<?php
class VideoService extends CFormModel {
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function countAllVideoTag($tagName) {
        $criteria = new CDbCriteria();
        if (isset($tagName) && $tagName != '') {
            $videoTags = VideoTag::model()->findAll(array(
                'select' => 'video_id',
                'condition' => sprintf("tag='%s'", $tagName),
                'group' => 'video_id',
                'distinct' => true,
            ));
            if (count($videoTags) > 0) {
                $videoIds = array();
                for ($i = 0; $i < count($videoTags); $i++) {
                    $videoIds[] = $videoTags[$i]->video_id;
                }
                $criteria->condition = sprintf("id IN ('%s')", implode("','", $videoIds));
            }
        }
        $model = new Video();
        return $model->count($criteria);
    }

}
