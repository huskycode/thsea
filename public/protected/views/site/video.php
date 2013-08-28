<?php
/* @var $this SiteController */
$this->pageTitle = Yii::app()->name . ' - Video';
$this->breadcrumbs = array(
    'Video',
);

function getCommentUrl($id) {
    return 'http://thsea-uat.nfshost.com/index.php?r=site/page&amp;view=video#video' . $id;
    // return $this->createAbsoluteUrl('site/video', array('#'=>'video'.$id));
}

function getLikeUrl($id){
    return 'http://thsea-uat.nfshost.com/index.php?r=site/page&amp;view=video#iikevideo' . $id;
}

function convertUrlToLink($text) {
    return preg_replace("#((http|https|ftp)://(\S*?\.\S*?))(\s|\;|\)|\]|\[|\{|\}|,|\"|'|:|\<|$|\.\s)#ie", "'<a href=\"$1\" target=\"_blank\">$3</a>$4'", $text);
}

function renderTags($videoTags) {
    $tags_link = array();
    foreach ($videoTags as $tag) {
        $tags_link[] = '<a href="#">'.$tag->tag.'</a>';
    }

    echo implode(", ", $tags_link);
}
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=416497271802249";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- START SEPARATOR  -->
<div id="separator">
    <div class="btop-1px"></div>
    <div class="container">
        <!-- start separator -->
        <div class="sixteen columns">
            <h4 class="page-title">The Video</h4>
        </div><!-- sixteen columns -->
    </div><!-- .container -->
    <div class="bbottom-1px"></div>
</div><!-- #separator -->
<!-- END SEPARATOR -->	
<!-- START BLOG WRAPPER -->
<div class="container main-wrapper">
    <div id="main-content" class="twelve columns">

        <?php foreach ($list as $row): ?>

            <div class="entry-post format-image">
                <div class="info-post">
                </div><!-- info-post -->

                <div class="stack">
                    <div class="meta-post">
                        <div style="right:0; position:absolute;background:none;" class="pull-right">
                            <div class="fb-like" data-href="<?php echo getLikeUrl($row->id); ?>" data-width="200" data-layout="button_count" data-show-faces="false" data-send="false"></div>
                        </div>
                        <div class="date" title="Posted Date"><span><?php echo Yii::app()->dateFormatter->formatDateTime($row->posted_date, 'long', null) ?></span></div>
                        <div class="tags" title="Tags"><span>
                                <?php
                                renderTags($row->videoTags);
                                ?>
                            </span></div>
                        <div class="comments" title="Comments"><span><a class="fb-comment-count" href="#fb-comment-<?php echo $row->id; ?>"><fb:comments-count href="<?php echo getCommentUrl($row->id); ?>"/></fb:comments-count></a></span></div>
                    </div><!-- meta-post -->
                </div><!-- stack -->
                <div class="image-post">
                    <a class="fb-comment-count" href="#fb-comment-<?php echo $row->id; ?>">
                        <?php
                        $this->widget('application.components.YoutubeViewer', array(
                            'v' => $row->url,
                            'width' => 674,
                            'height' => 337,
                            'display' => 'image',
                            'alt' => $row->title
                        ));
                        ?>
                    </a>
                </div><!-- post-image -->
                <div class="text-post clearfix">
                    <div class="title-post">
                        <h6><a class="fb-comment-count" href="#fb-comment-<?php echo $row->id; ?>"><?php echo $row->title ?></a></h6>
                    </div>
                    <p><?php
                        if ($row->description == null) {
                            echo 'No description avaliable';
                        } else {
                            echo convertUrlToLink($row->description);
                        }
                        ?>
                    </p>
                    <a href="#fb-comment-<?php echo $row->id; ?>" class="button read-more fb-comment-count">Comment</a>
                </div><!-- text-post -->
                <div class="hidden">
                    <div id="fb-comment-<?php echo $row->id; ?>" class="popup">
                        <div class="image-post video">
                            <div style="float:right;" class="pull-right">
                                <div class="fb-like" data-href="<?php echo getLikeUrl($row->id); ?>" data-width="200" data-layout="button_count" data-show-faces="false" data-send="false"></div>
                            </div>
                            <h6><?php echo $row->title; ?></h6>
                            <?php
                            $this->widget('application.components.YoutubeViewer', array(
                                'v' => $row->url,
                                'width' => 654,
                                'height' => 368,
                                'display' => 'video'
                            ));
                            ?>
                        </div>
                        <div class="comment">
                            <div class="fb-comments" data-href="<?php echo getCommentUrl($row->id); ?>"></div>
                        </div>
                    </div>
                </div>
                <div class="divider-blog-1px"></div>
            </div><!-- entry-post -->

        <?php endforeach; ?>


        <!-- START PAGINATION-->
        <div id="nav-pagination">
            <ul class="nav-pagination clearfix">
                <li class="first"><a href="#"></a></li>
                <li clase="current"><a href="#">1</a></li>
                <!--<li class="current"><a href="#">2</a></li>-->
                <!--<li><a href="#">3</a></li>-->
                <!--<li><a href="#">4</a></li>-->
                <!--<li><a href="#">5</a></li>-->
                <!--<li><a href="#">6</a></li>-->
                <!--<li><a href="#">7</a></li>-->
                <li class="last"><a href="#"></a></li>
            </ul>
        </div><!-- #nav-pagination -->
    </div><!-- main-content -->

    <!-- START SIDEBAR -->
    <div id="sidebar" class="four columns">	
    </div><!-- sidebar -->
</div><!-- .container -->
<script type="text/javascript">
    jQuery.noConflict()(function($) {
        $(document).ready(function() {
            $('.fb-comment-count').colorbox({inline: true, maxWidth: 1200, maxHeight: 490, width: "100%", height: "90%"});
        });
    });
</script>
<!-- END BLOG WRAPPER -->