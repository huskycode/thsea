<div id="home-popular" class="horizontal-list">
    <h2>Popular</h2>
    <div>
        <?php
        $displayVideoCount = 3;
        $lastVideoIndex = count($this->Videos);
        if ($lastVideoIndex < $displayVideoCount) {
            $displayVideoCount = $lastVideoIndex;
        }
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
                        #<span class="tags">
                            <?php echo WebHelper::renderTags($this->Videos[$i]->videoTags); ?>
                        </span><br />
                        <span class="view-counter">
                            <?php echo number_format($this->Videos[$i]->view_counter); ?> views
                        </span>
                        <span class="date"><?php echo DateTimeHelper::TimeAgo($this->Videos[$i]->recording_date) ?></span>
                    </div>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</div>