<?php

class VideoService {

    public static function countAllVideoTag($tagName) {
        if (isset($tagName) && $tagName != '') {
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

    public static function addViewCounter($id) {
        $model = Video::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $model->view_counter = $model->view_counter + 1;
        $model->view_counter;
        $model->save();
    }
    public static function getVideoDetailUrl($video){
        return Yii::app()->request->getBaseUrl(true) . '/site/detail/' . $video->url_name;
    }
    public static function getVideoLikeUrl($video){
        return static::getVideoDetailUrl($video).'#like';
    }

    public static function getVideo($idOrUrlName){;    
        return Video::model()->find('id=:id OR url_name=:url_name', array(':id'=>$idOrUrlName,
                                                                          ':url_name' => $idOrUrlName));
    }
}