<div class="seven columns" >
    <div class="video-most-recent-leftside">
        <div class="video-block" >
            <div class="video-thumbnail-large">
                <a class="fb-comment-count" href="<?php echo VideoService::getVideoDetailUrl($this->Videos[0]); ?>">
                    <?php
                    $this->widget('ext.YoutubeViewer', array(
                        'imageUrl' => $this->Videos[0]->thumbnail_url,
                        'display' => 'image',
                        'alt' => $this->Videos[0]->title
                    ));
                    ?> 
                </a>
            </div>
            <div class="video-text clearfix">
                <div class="video-title">
                    <a class="fb-comment-count" href="<?php echo VideoService::getVideoDetailUrl($this->Videos[0]); ?>"
                       title="<?php echo $this->Videos[0]->title; ?>">
                        <?php echo $this->Videos[0]->title; ?>
                    </a>
                </div>
                <div class="video-info">
                    <span class="tags">
                        <?php echo WebHelper::renderTags($this->Videos[0]->videoTags); ?>
                    </span><br />
                    <span class="view-counter">
                        <?php echo number_format($this->Videos[0]->view_counter); ?> views
                    </span>
                    <span class="date"><?php echo DateTimeHelper::TimeAgo($this->Videos[0]->recording_date) ?></span><br/>
                </div>  
            </div>
        </div>
    </div>
</div>

<div class="nine columns column-last" >

    <?php
    $displayVideoCount = 3;
    $lastVideoIndex = count($this->Videos) - 1;
    if ($lastVideoIndex < $displayVideoCount) {
        $displayVideoCount = $lastVideoIndex;
    }
    for ($i = 1; $i <= $displayVideoCount; $i++):
        ?>

        <div class="video-block">
            <div class="video-thumbnail-small">
                <a class="fb-comment-count" href="<?php echo VideoService::getVideoDetailUrl($this->Videos[$i]); ?>">
                    <?php
                    $this->widget('ext.YoutubeViewer', array(
                        'imageUrl' => $this->Videos[$i]->thumbnail_url,
                        'display' => 'image',
                        'alt' => $this->Videos[$i]->title
                    ));
                    ?>
                </a>
            </div>
            <div class="video-text clearfix">
                <div class="video-title">

                    <a class="fb-comment-count" href="<?php echo VideoService::getVideoDetailUrl($this->Videos[$i]); ?>"
                       title="<?php echo $this->Videos[$i]->title; ?>">
                        <?php echo TextHelper::limitText($this->Videos[$i]->title); ?>
                    </a>

                </div>
                <div class="video-info">
                    <span class="tags">
                        <?php echo WebHelper::renderTags($this->Videos[$i]->videoTags); ?>
                    </span><br />
                    <span class="view-counter">
                        <?php echo number_format($this->Videos[$i]->view_counter); ?> views
                    </span>
                    <span class="date"><?php echo DateTimeHelper::TimeAgo($this->Videos[$i]->recording_date) ?></span><br/>
                </div>
            </div>
        </div>
    <?php endfor; ?>
    <a href="<?php echo Yii::app()->createUrl("/list"); ?>" style="color:#468aca;" class="viewmore">view all</a>
</div>
