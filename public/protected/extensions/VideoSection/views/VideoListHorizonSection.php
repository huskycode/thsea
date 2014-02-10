<?php
$displayVideoCount = 3;
$lastVideoIndex = count($this->Videos);
if ($lastVideoIndex < $displayVideoCount) {
    $displayVideoCount = $lastVideoIndex;
}
if($displayVideoCount > 0) {
    ?>
    <div class="horizontal-list video-span-<?php echo $displayVideoCount; ?>">
        <h2><?php 
        $url = Yii::app()->createUrl('site/list',array('tag'=>$this->HeaderName));
        echo '<a href="'.$url.'">'.$this->HeaderName.'</a>';
        ?></h2>
        <div>
            <?php
            for ($i = 0; $i < $displayVideoCount; $i++):
                ?>
                <div class="video-block">
                    <div class="video-thumbnail-small">
                        <a class="fb-comment-count" href="#fb-comment-<?php echo $this->Videos[$i]->id; ?>">
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
                            <a class="fb-comment-count" href="#fb-comment-<?php echo $this->Videos[$i]->id; ?>">
                                <?php echo TextHelper::limitText($this->Videos[$i]->title); ?>
                            </a>
                        </div>
                        <div class="video-info">
                            <?php if(false){ ?>
                            #<span class="tags">
                                <?php echo WebHelper::renderTags($this->Videos[$i]->videoTags); ?>
                            </span><br />
                            <?php } ?>
                            <span class="view-counter">
                                <?php echo number_format($this->Videos[$i]->view_counter); ?> views
                            </span>
                            <span class="date"><?php echo DateTimeHelper::TimeAgo($this->Videos[$i]->recording_date) ?></span><br/>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
<?php } ?>