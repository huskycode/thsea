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

    public function actionCreate() {
        $model = new Video;
        $model->posted_date = date('Y-m-d H:i:s');
        
        if (isset($_POST['Video'])) {
            $model->attributes = $_POST['Video'];
            
            if ($this->saveVideo($model))
                $this->redirect(array('index'));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Video'])) {
            $model->attributes = $_POST['Video'];
            
            if ($this->saveVideo($model))
                $this->redirect(array('index'));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }
    
    private function saveVideo($model){
        $model->posted_by = 'admin';
            
        if($model->recording_date==''){
            $model->recording_date = null;
        }

        if($model->description==''){
            $model->description = null;
        }

        return $model->save();          
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        $this->redirect(array('index'));
    }

    private function loadModel($id) {
        $model = Video::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
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