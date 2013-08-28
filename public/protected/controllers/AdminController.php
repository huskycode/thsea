<?php

class AdminController extends Controller {
    
    const PAGE_SIZE = 10;

    public function actionIndex() {
        $this->render('index');
    }

    public function actionVideo() {
        $criteria = new CDbCriteria();
        $criteria->order = "posted_date DESC";

        $model = new Video();
        $list = $model->with('videoTags')->findAll($criteria);

        $total = $model->count($criteria);
        $pages = new CPagination($total);
        $pages->pageSize = self::PAGE_SIZE;
        $pages->applyLimit($criteria);

        $this->render('video', array(
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