<?php

class VideoController extends Controller {

    const PAGE_SIZE = 15;
    
    public function actionIndex() {
        $criteria = new CDbCriteria();
        $criteria->order = "posted_date DESC";

        $model = new Video();

        $total = $model->count($criteria);
        $pages = new CPagination($total);
        $pages->pageSize = self::PAGE_SIZE;
        $pages->applyLimit($criteria);

        $list = $model->with('videoTags')->findAll($criteria);

        $this->render('index', array(
            'list' => $list,
            'pages' => $pages
        ));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}