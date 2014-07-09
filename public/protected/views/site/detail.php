<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
$this->breadcrumbs = array(
    'Index',
);
$search = '#(?:http?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=))([\w\-]{10,12}).*$#x';
$replace = '//www.youtube.com/embed/$1';
$url = preg_replace($search, $replace, $video->url);
$this->metaSocialName = $video->title;
$this->metaSocialDetail = $video->description;
$this->metaSocialImage = $video->thumbnail_url;
$this->currentUrl = VideoService::getVideoDetailUrl($video);
?>
<style type="text/css">
.responsive-embed {
    position: relative;
    padding-bottom: 56.25%; /* 16/9 ratio */
    padding-top: 30px; /* IE6 workaround*/
    height: 0;
    overflow: hidden;
}
.responsive-embed iframe,
.responsive-embed object,
.responsive-embed embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}    
.gist{font-size:13px;line-height:18px;margin-bottom:20px;width:100%}
.gist pre{font-family:Menlo,Monaco,'Bitstream Vera Sans Mono','Courier New',monospace !important}
.gist-meta{font-family:Helvetica,Arial,sans-serif;font-size:13px !important}
.gist-meta a{color:#26a !important;text-decoration:none}
.gist-meta a:hover{color:#0e4071 !important}
</style>
<div id="fb-root"></div>
<div id="separator">
</div><!-- #separator -->
<!-- END SEPARATOR -->	
<!-- START BLOG WRAPPER -->
<div id="video-detail" class="container" >
    <div class="image-post video">
        <h6><?php echo $video->title; ?></h6>
        <?php $this->widget('ext.YoutubeViewer', array(
            'url'=>$video->url,
            'width'=>600,
            'height'=>368,
         )); ?>
        <div style="float:left;padding-top:2px;" class="pull-left">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $this->currentUrl; ?>" data-text="<?php echo $video->title; ?>">Tweet</a>
        </div>
        <div style="float:left;" class="pull-right">
            <script>!function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + '://platform.twitter.com/widgets.js';
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, 'script', 'twitter-wjs');</script>
            <div class="fb-like" data-href="<?php echo VideoService::getVideoLikeUrl($video); ?>" data-width="200" data-layout="button_count" data-show-faces="false" data-send="false"></div>
        </div>
        <div style="clear: both; padding-top:20px;">
            <p><?php echo $video->description; ?></p>
        </div>
         
        
        
        
        
        <?php if ($video->additional_content!=''): ?>
        <div><?php echo $video->additional_content; ?></div>
        <?php endif; ?>
        
    </div>
    <div class="comment">
        <?php $this->widget('ext.SlideshareViewer', array(
            'url'=>$video->slideshare_url
         )); ?>
        <div class="fb-comments" data-href="<?php echo $this->currentUrl; ?>" data-width="320"></div>
    </div>
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