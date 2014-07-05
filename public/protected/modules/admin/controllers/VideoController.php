<?php

class VideoController extends Controller {

    const PAGE_SIZE = 15;

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules() {
        return array(
            array('allow', // allow authenticated users to access all actions
                'users' => array('@'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $criteria->order = "recording_date DESC";

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
            $model->posted_by = Yii::app()->user->userName;

            if($model->validate()){ 
                
                try {
                    $this->saveVideo($model);

                    if(isset($_POST['tags']) && $_POST['tags']!=''){
                        $tags = CJSON::decode($_POST['tags']);
                        $command = Yii::app()->db->createCommand();  

                        for($i=0; $i<count($tags); $i++) {
                            $tag = $tags[$i];

                            $command->insert('video_tag', array(
                                'video_id'=>$model->id,
                                'tag'=>$tag
                            ));

                            $command->reset(); 
                        }
                    }
                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";exit;
                }

                $this->redirect(array('index'));
            } 
        }

        $this->render('create', array(
            'model' => $model,
            'jsonTags' => CJSON::encode($this->getTags())
        ));
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Video'])) {
            $model->attributes = $_POST['Video'];
            $model->posted_by = Yii::app()->user->userName;
            
            if($model->validate()){
            
                try {
                    $this->saveVideo($model);

                    $command = Yii::app()->db->createCommand();
                    $command->delete('video_tag', 'video_id=:id', array(':id'=>$id));   
                    $command->reset(); 

                    if(isset($_POST['tags']) && $_POST['tags']!=''){
                        $tags = CJSON::decode($_POST['tags']);

                        for($i=0; $i<count($tags); $i++) {
                            $tag = $tags[$i];

                            $command->insert('video_tag', array(
                                'video_id'=>$id,
                                'tag'=>$tag
                            ));

                            $command->reset(); 
                        }
                    }

                    $this->redirect(array('index'));

                } catch (Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
            'jsonTags' => CJSON::encode($this->getTags())
        ));
    }

    private function saveVideo($model) {
        if ($model->recording_date == '') {
            $model->recording_date = null;
        }

        if ($model->description == '') {
            $model->description = null;
        }

        return $model->save();
    }
    
    private function getTags(){
        $tags=  VideoTag::model()->findAll(array(
            'select'=>'tag',
            'group'=>'tag',
            'distinct'=>true,
        ));
       
        $arr_tags = array();
        
        foreach($tags as $tag){
            $arr_tags[] = $tag->tag;
        }
       
        return $arr_tags;
    }

    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        $this->redirect(array('index'));
    }

    private function loadModel($id) {
        $model = Video::model()->with('videoTags')->findByPk($id);
        
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