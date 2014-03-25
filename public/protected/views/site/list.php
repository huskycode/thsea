<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
$this->breadcrumbs = array(
    'Index',
);

?>
<style type="text/css">
    ul.yiiPager li{
        font-size: 1.5em;
    }
    ul.yiiPager li.next{
        border-top: 3px solid #FF7E00;
        width: 30px;
        background-image: url('<?php echo Yii::app()->request->getBaseUrl(true); ?>/images/icons/sprites.png');
        padding: 2px 0;
        border: #cccccc solid 1px;
    }
</style>
<div id="fb-root"></div>
<div id="separator">
</div><!-- #separator -->
<!-- END SEPARATOR -->	
<!-- START BLOG WRAPPER -->
<div class="container main-wrapper">
    <div id="main-content" class="sixteen columns">
        <h4 style="padding-bottom: 20px"># <?php echo isset($_GET['tag']) && $_GET['tag']!=''?$_GET['tag']:'All'; ?></h4>
    
        <?php foreach ($list as $row): ?>
        <div id="fb-comment-<?php echo $row->id; ?>">
            <div class="divider-blog-1px" style="clear:both; margin-top: 0px;"></div>
            <div style="float:left; padding: 5px;padding-left: 15px;">
                <a class="fb-comment-count" href="<?php echo Yii::app()->createurl('/video/'.$row->getUrlName()); ?>" >
                    <?php $this->widget('ext.YoutubeViewer', array(
                        'imageUrl'=>$row->thumbnail_url,
                        'width'=>120,
                        'height'=>100,
                        'display'=>'image'
                    )); ?>
                </a>
            </div>
            <div style="float:left; padding: 5px;" class="video-info" >
                 <strong><a style='color:#468aca' class="fb-comment-count" href="<?php echo Yii::app()->createurl('/video/'.$row->getUrlName()); ?>"><?php echo $row->title ?></a></strong><br />
                 <span class="tags">
                        <?php echo WebHelper::renderTags($row->videoTags); ?>
                    </span><br />
                 <span class="view-counter">
                        <?php echo number_format($row->view_counter); ?> views
                 </span>
                 <span class="date" ><?php echo DateTimeHelper::TimeAgo($row->recording_date) ?></span><br />
                 <span title='<?php echo $row->description; ?>'><?php echo TextHelper::htmlEncode(TextHelper::limitText($row->description, 100)); ?></span>
            </div>        
        </div>
        <?php endforeach; ?>  
       <div class="clear-both divider-blog-1px"></div>
            
        <div style="font-size: 2em;">
            <?php
            $this->widget('CLinkPager', array(
                'pages' => $pages,
                'header' => '',
                'nextPageLabel' => '>',
                'prevPageLabel' => '<'));
            ?>  
        </div>

    </div><!-- main-content -->

    <!-- START SIDEBAR -->
    <div id="sidebar" class="four columns">	
    </div><!-- sidebar -->
</div><!-- .container -->
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=416497271802249";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<!-- START SEPARATOR  -->
<script type="text/javascript">
    jQuery.noConflict()(function($) {

    });
</script>
<!-- END BLOG WRAPPER -->
