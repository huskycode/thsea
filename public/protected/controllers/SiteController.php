<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionIndex() {
        $recentlyVideos = Video::model()->recently(4)->findAll();
        $topViewVideos = Video::model()->topview(3)->findAll();
        $arrVideoTagHorizontalList = array();
        $arrVideoTag = array('Workshop', 'Exp-Sharing', 'Technical');
        for ($i = 0; $i < count($arrVideoTag); $i++) {
            $videoList = $this->getVideosByTag($arrVideoTag[$i], 3);
            $arrVideoTagHorizontalList[] = array('videoTagName' => $arrVideoTag[$i], 'videoList' => $videoList);
        }

        $this->render('index', array(
            'recentlyVideos' => $recentlyVideos,
            'topViewVideos' => $topViewVideos,
            'arrVideoTagHorizontalList' => $arrVideoTagHorizontalList
        ));
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionList() {
        $this->renderVideos(Yii::app()->params['videoListPageSize'], 'list');
    }

    private function getVideosByTag($tag = '', $amount = 3) {
        $criteria = new CDbCriteria();
        if (isset($tag) && $tag != '') {
            $videoTags = VideoTag::model()->findAll(array(
                'select' => 'video_id',
                'condition' => sprintf("tag='%s'", $tag),
                'group' => 'video_id',
                'distinct' => true,
            ));
            if (count($videoTags) > 0) {
                $videoIds = array();
                $countVideoTags = count($videoTags);
                for ($i = 0; $i < $countVideoTags; $i++) {
                    $videoIds[] = $videoTags[$i]->video_id;
                }
                $criteria->condition = sprintf("id IN ('%s')", implode("','", $videoIds));
            }
        }
        $criteria->order = "recording_date DESC";
        $criteria->limit = $amount;
        $model = new Video();
        return $model->with("videoTags")->findAll($criteria);
    }

    private function renderVideos($pageSize, $toView) {
        $criteria = new CDbCriteria();

        if (isset($_GET['tag']) && $_GET['tag'] != '') {
            $videoTags = VideoTag::model()->findAll(array(
                'select' => 'video_id',
                'condition' => sprintf("tag='%s'", $_GET['tag']),
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

        $criteria->order = "recording_date DESC";

        $model = new Video();

        $total = $model->count($criteria);
        $pages = new CPagination($total);
        $pages->pageSize = $pageSize;
        $pages->applyLimit($criteria);

        $list = $model->with("videoTags")->findAll($criteria);

        $this->render($toView, array(
            'list' => $list,
            'pages' => $pages
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
