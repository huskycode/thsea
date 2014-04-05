﻿<?php
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
<div id="fb-root"></div>
<div id="separator">
</div><!-- #separator -->
<!-- END SEPARATOR -->	
<!-- START BLOG WRAPPER -->
<div id="video-detail" class="container" >
    <div class="image-post video">
        <div style="float:right;" class="pull-right">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $this->currentUrl; ?>" data-text="<?php echo $video->title; ?>">Tweet</a>
        </div>
        <div style="float:right;" class="pull-right">
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
        <h6><?php echo $video->title; ?></h6>
        <iframe width="654" height="368" src="<?php echo $url; ?>" frameborder="0"></iframe>
        <p><?php echo $video->description; ?></p>
    </div>
    <div class="comment">
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