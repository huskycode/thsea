<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - Video Link Manager';
$this->breadcrumbs = array(
    'Video Link Manager',
);
?>
<style type="text/css">
    .video-panel{
        background-color: #ebebeb; 
        height: 40px; 
        line-height: 30px; 
        vertical-align: middle;
        padding-top: 10px;
        padding-left: 5px;
        padding-right: 10px;
        width:100%;
    }
    .clear{
        clear: both;
    }
</style>
<div class="divider-blog-1px" style="clear:both"></div>
<div class="video-panel">
    <!--<select id="video-sort" >
        <option>Newest</option>
        <option>Most view</option>
    </select> -->
    <div style="float:left">
        <h4><strong>Video Link Manager</strong></h4>        
    </div>
    <div style="float:left"></div>
    <div style="float: right">
    <!--<strong>View:</strong> Most recent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
        <input type="button" value="+ Add" onclick="window.location='<?php echo Yii::app()->createUrl('admin/video/create'); ?>'" />
        &nbsp;&nbsp;
    </div>
</div>
<div class="clear"> </div>
<div style="clear:both"></div>
<?php foreach ($list as $row): ?>
<div>
    <div class="divider-blog-1px" style="clear:both; margin-top: 0px;"></div>
    <div style="float:left; padding: 5px;padding-left: 15px;">
        <a href="<?=$row->url?>" target="_blank">
            <?php $this->widget('ext.YoutubeViewer', array(
                'imageUrl'=>$row->thumbnail_url,
                'width'=>80,
                'height'=>60,
                'display'=>'image'
            )); ?>
        </a>
    </div>
    <div style="float:left; padding: 5px;">
         <strong><?php echo $row->title; ?></strong><br />
         Recording date: <?php echo $row->recording_date!=null?Yii::app()->dateFormatter->formatDateTime($row->recording_date, 'long', null):'-'?>
    </div>
    <div style="float:right; padding: 5px;">
        <input type="button" value="Edit" onclick="window.location='<?php echo Yii::app()->createUrl('/admin/video/update/' . $row->id); ?>';" />
        <input type="button" value="Delete" onclick="if(confirm('Are you sure you want to delete this item?')){window.location='<?php echo Yii::app()->createUrl('/admin/video/delete/' . $row->id); ?>';}" />
    </div>
</div>
<?php endforeach; ?>
<div class='clear'></div>
<div class="divider-blog-1px;margin-top:0px;"></div>
<div class='clear'></div>
<div style='background-color: #cccccc; text-align: right;'>
    <?php $this->widget('CLinkPager', array('pages' => $pages)); ?>
</div>

