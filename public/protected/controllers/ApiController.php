<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ApiController
 *
 * @author Rux
 */
class ApiController extends Controller {

    public function filters() {
        return array('accessControl');
    }

    public function actionVideo($id) {
        $video = Video::model()->findByPk($id);
        if ($video === null){
            throw new CHttpException(404, 'The video does not exist.');
        }
        $this->addViewCounter($id);
        echo CJSON::encode($video);
    }

    public function actionTags() {
        echo CJSON::encode(["php", "java", "c++"]);
    }
    
    private function addViewCounter($id) {
        $model = Video::model()->findByPk($id);
        if ($model === null){
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $model->view_counter = $model->view_counter+1;
        $model->view_counter;
        $model->save();
    }

}