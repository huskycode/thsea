<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name;
$this->breadcrumbs = array(
    'Index',
);

function getCommentUrl($id) {
    return Yii::app()->request->getBaseUrl(true) . '#fb-comment-' . $id;
}

function getLikeUrl($id) {
    return Yii::app()->request->getBaseUrl(true) . '#fb-like-' . $id;
}

function displayContent($text) {
    $text = nl2br($text);
    return preg_replace("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie", "'<a href=\"$1\" target=\"_blank\">$3</a>$4'", $text);
}
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
<div class="container video-wrapper" >

    <?php $this->widget('ext.VideoSection.MostRecentSection', array('Videos' => $recentlyVideos)); ?>
    <div class="clear-both"></div>
    <div class="video-group">
        <div class="group-horizontal">
            <?php 
            //$this->widget('ext.VideoSection.TopViewSection', array('Videos' => $topViewVideos));
            $this->widget('ext.VideoSection.VideoListHorizonSection', array('HeaderName' => 'Popular', 'Videos' => $topViewVideos, 'tagId'=>'home-popular','isTag'=>false));
            $countVideoListHorizontal = count($arrVideoTagHorizontalList);
            for ($i = 0; $i < $countVideoListHorizontal; $i++) {
                $objHorizontal = $arrVideoTagHorizontalList[$i];
                $this->widget('ext.VideoSection.VideoListHorizonSection', array('HeaderName' => $objHorizontal['videoTagName'], 'Videos' => $objHorizontal['videoList']));
            }
            ?>
        </div>
        <div class="group-vertical">
            <?php
                $countVideoListVertical = count($arrVideoTagVerticalList);
                for ($i = 0; $i < $countVideoListVertical; $i++) {
                    $objVertical = $arrVideoTagVerticalList[$i];
                    $this->widget('ext.VideoSection.VideoListVerticalSection', array('HeaderName' => $objVertical['videoTagName'], 'Videos' => $objVertical['videoList']));
                }
            ?>
        </div>
    </div>
    <div class="clearfix"></div>

    <!-- CLIENTS -->
    <div class="container header-block" style="margin-top: 30px;">
        <!-- start header -->
        <div class="sixteen columns lp-header">
            <h6>Content Sponsor</h6>
            <div class="nav-projects">
            </div><!-- .nav-projects -->
        </div><!-- .sixteen  -->
        <!-- end header -->
    </div><!-- .container -->
    <div id="clients" class="container">
        <ul id="clients-carousel" class="jcarousel-skin-tango" >
            <!-- start carousel -->
            <li><div class="four columns">
                    <div class="block">
                        <a href="http://www.agile66.com/" target="_blank" alt="Agile66"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/clients/Agile66.jpg" alt="" /></a>
                    </div><!-- block -->  
                </div><!-- .four  --></li>

        </ul><!-- #clients-carousel -->
    </div><!-- .container -->
    <!-- END CLIENTS -->

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

<script type="text/javascript">
       
    jQuery.noConflict()(function($) {
  
       
    });
</script>
