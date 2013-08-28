<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - Video Manager';
$this->breadcrumbs = array(
    'Video Manager',
);
?>
<style type="text/css">
    .video-panel{
        background-color: #ebebeb; 
        height: 30px; 
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
<script type="text/javascript">
    $(function(){
       
      
      
    });
</script>
<div class="divider-blog-1px" style="clear:both"></div>
<div class="video-panel">
    <!--<select id="video-sort" >
        <option>Newest</option>
        <option>Most view</option>
    </select> -->
    <div style="float:left"><h5>Videos</h5></div>
    <div style="float: right">
    <strong>View:</strong> Newest&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </div>
</div>
<div class="clear"> </div>
<div style="clear:both"></div>
<?php foreach ($list as $row): ?>
<div>
    <div class="divider-blog-1px" style="clear:both; margin-top: 0px;"></div>
    <div style="float:left; padding: 5px;">
        <a href="<?=$row->url?>" target="_blank">
            <?php $this->widget('application.components.YoutubeViewer', array(
                'url'=>$row->url,
                'width'=>80,
                'height'=>60,
                'display'=>'image'
            )); ?>
        </a>
    </div>
    <div style="float:left; padding: 5px;">
         <strong><?php echo$row->id; ?>. <?php echo $row->title; ?></strong><br />
         Posted date: <?php echo Yii::app()->dateFormatter->formatDateTime($row->posted_date, 'long', null)?>
    </div>
</div>
<?php endforeach; ?>
<div class="divider-blog-1px"></div>
<div class='clear'></div>
<div style='background-color: #cccccc; text-align: right;'>
    <?php $this->widget('CLinkPager', array('pages' => $pages)); ?>
</div>

