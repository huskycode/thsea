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
                <a class="fb-comment-count" href="#fb-comment-<?php echo $row->id; ?>" >
                    <?php $this->widget('ext.YoutubeViewer', array(
                        'imageUrl'=>$row->thumbnail_url,
                        'width'=>120,
                        'height'=>100,
                        'display'=>'image'
                    )); ?>
                </a>
            </div>
            <div style="float:left; padding: 5px;" class="video-info" >
                 <strong><a style='color:#468aca' class="fb-comment-count" href="#fb-comment-<?php echo $row->id; ?>"><?php echo $row->title ?></a></strong><br />
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
                    openPopup(data.id, data.title, data.url, data.description);
                });
            }
        }
        function openPopup(id, title, video, description) {
            var re = /https?:\/\/(?:[0-9A-Z-]+\.)?(?:youtu\.be\/|youtube\.com\S*[^\w\-\s])([\w\-]{11})(?=[^\w\-]|$)(?![?=&+%\w.-]*(?:['"][^<>]*>|<\/a>))[?=&+%\w.-]*/ig;
            video = video.replace(re, '//www.youtube.com/embed/$1');
            
            if (description){
                description = application.utility.nl2br(description);

            } else {
                description = 'No description avaliable';
            }
            
            $.colorbox({
                html: '\n\
                        <div class="popup">\n\
                        <div class="image-post video">\n\
                            <div style="float:right;" class="pull-right">\n\
                                <div class="fb-like" data-href="<?php echo Yii::app()->request->getBaseUrl(true) . '#fb-like-'; ?>' + id + '" data-width="200" data-layout="button_count" data-show-faces="false" data-send="false"></div>\n\
                            </div>\n\
                            <h6>' + title + '</h6>\n\
                            <iframe width="654" height="368" src="' + video + '" frameborder="0"></iframe>\
                            ' + description  + '\
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
        window.onresize = function(){
            $.colorbox.resize({
                    width: '100%',
                    height: '100%'
                });
            console.log("call resize");
        }
    });
</script>
<!-- END BLOG WRAPPER -->
