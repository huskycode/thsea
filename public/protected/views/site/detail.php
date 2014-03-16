<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
$this->breadcrumbs = array(
    'Index',
);
$search = '#(?:http?://)?(?:www\.)?(?:youtu\.be/|youtube\.com(?:/embed/|/v/|/watch\?v=))([\w\-]{10,12}).*$#x';
$replace = '//www.youtube.com/embed/$1';
$url = preg_replace($search, $replace, $video->url);
?>
<div id="fb-root"></div>
<div id="separator">
</div><!-- #separator -->
<!-- END SEPARATOR -->	
<!-- START BLOG WRAPPER -->
<div class="container video-wrapper" >
    <div class="popup">
        <div class="image-post video">
            <div style="float:right;" class="pull-right">
                <div class="fb-like" data-href="<?php echo Yii::app()->request->getBaseUrl(true) . '#fb-like-' . $video->id; ?>" data-width="200" data-layout="button_count" data-show-faces="false" data-send="false"></div>
            </div>
            <h6><?php echo $video->title; ?></h6>
            <iframe width="654" height="368" src="<?php echo $url; ?>" frameborder="0"></iframe>
<?php echo $video->description; ?>
        </div>
        <div class="comment">
            <div class="fb-comments" data-href="<?php echo Yii::app()->request->getBaseUrl(true) . '#fb-comment-' . $video->id; ?>"></div>
        </div>
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