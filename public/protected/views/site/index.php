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
    <hr />
    <?php $this->widget('ext.VideoSection.TopViewSection', array('Videos' => $topViewVideos)); ?>
    <?php
    $countVideoListHorizontal = count($arrVideoTagHorizontalList);
    for ($i = 0; $i < $countVideoListHorizontal; $i++) {
        $objHorizontal = $arrVideoTagHorizontalList[$i];
        $this->widget('ext.VideoSection.VideoListHorizonSection', array('HeaderName' => '#' . $objHorizontal['videoTagName'], 'Videos' => $objHorizontal['videoList']));
    }
    ?>

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

        $(document).ready(function() {
            // add facebook popup
            //$('.fb-comment-count').colorbox({inline: true, maxWidth: 1200, maxHeight: 490, width: "100%", height: "90%"});
            $('.fb-comment-count').click(function() {
                location.hash = $(this).attr('href');
                OpenFromJSON();
            });
            OpenFromJSON();
        });
        function OpenFromJSON() {
            var hash = window.location.hash;

            if (hash) {
                var id = hash.replace('#fb-comment-', '');
                jQuery.getJSON("/api/video/" + id, function(data) {
                    openPopup(data.id, data.title, data.url);
                });
            }
        }
        function openPopup(id, title, video) {
            var re = /https?:\/\/(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube\.com\S*[^\w\-\s])([\w\-]{11})(?=[^\w\-]|$)(?![?=&+%\w.-]*(?:['"][^<>]*>|<\/a>))[?=&+%\w.-]*/ig;
            video = video.replace(re, '//www.youtube.com/embed/$1');
            $.colorbox({
                html: '\n\
                        <div class="popup">\n\
                        <div class="image-post video">\n\
                            <div style="float:right;" class="pull-right">\n\
                                <div class="fb-like" data-href="<?php echo Yii::app()->request->getBaseUrl(true) . '#fb-like-'; ?>' + id + '" data-width="200" data-layout="button_count" data-show-faces="false" data-send="false"></div>\n\
                            </div>\n\
                            <h6>' + title + '</h6>\n\
                            <iframe width="654" height="368" src="' + video + '" frameborder="0"></iframe>\n\
                        </div>\n\
                        <div class="comment">\n\
                            <div class="fb-comments" data-href="<?php echo Yii::app()->request->getBaseUrl(true) . '#fb-comment-'; ?>' + id + '"></div>\n\
                        </div>\n\
                        </div>\n\
                        ',
                width: "100%",
                height: "100%",
                onClosed: function() {
                    history.pushState("", document.title, window.location.pathname + window.location.search);
                }
            });
            try {
                FB.XFBML.parse();
            } catch (ex) {
            }
        }
        window.onresize = function() {
            $.colorbox.resize({
                width: '100%',
                height: '100%'
            });
            console.log("call resize");
        }
    });
</script>
