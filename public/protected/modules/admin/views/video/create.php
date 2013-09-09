<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - Video Manager';
$this->breadcrumbs = array(
    'Video Manager',
);
?>

<div class="divider-blog-1px" style="clear:both"></div>
<div class="video-panel">
    <!--<select id="video-sort" >
        <option>Newest</option>
        <option>Most view</option>
    </select> -->
    <div style="float:left">
        <h4><strong>Create Video Link</strong></h4s>        
    </div>
</div>
<div style="padding-left: 20px">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>