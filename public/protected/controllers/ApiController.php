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
    public function actionVideo($id){ 
        $video = Video::model()->findByPk($id);
        
         if ($video === null)
            throw new CHttpException(404, 'The video does not exist.');
         
         echo CJSON::encode($video);
    }
    
    public function actionTags(){
        echo CJSON::encode(["php", "java", "c++"]);
    }
}

?>
