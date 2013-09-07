<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - Video Manager';
$this->breadcrumbs = array(
    'Video Manager',
);
?>
<h3>Create Video</h3>
<div style="padding-left: 20px">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>