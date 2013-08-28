<?php
/* @var $this AdminController */

$this->breadcrumbs=array(
	'Admin',
);
?>

<?php
    echo Yii::app()->createUrl('site/video', array(
        '#'=>'video1'
    ));
?>
<hr />
<?php
    echo $this->createUrl('site/video', array(
        '#'=>'video1'
    ));
?>