    <div class="six columns" >
        
        <div class="video-block" style="height:315px">
                <div class="video-thumbnail-large">
                    <a class="fb-comment-count" href="#fb-comment-<?php echo $this->Videos[0]->id; ?>">
                        <?php
                        $this->widget('ext.YoutubeViewer', array(
                            'imageUrl' => $this->Videos[0]->thumbnail_url,
                            'width' => 430,
                            'height' => 180,
                            'display' => 'image',
                            'alt' => $this->Videos[0]->title
                        ));
                        ?> 
                    </a>
                </div>
                <div class="video-text clearfix">
                        <div class="video-title">
                            <h6><a href="#"><?php echo $this->Videos[0]->title; ?></a></h6>
                        </div>
                        <div class="video-info">
                            #<span class="tags">
                                <?php echo WebHelper::renderTags($this->Videos[0]->videoTags); ?>
                            </span><br />
                            <span class="view-counter">
                                <?php echo number_format($this->Videos[0]->view_counter); ?> views
                            </span>
                            <span>
                                <?php //echo DateTimeHelper::TimeAgo($this->Videos[0]->recording_date) ?>
                            </span>
                            <span class="date"><?php echo $this->Videos[0]->recording_date != null ? Yii::app()->dateFormatter->formatDateTime($this->Videos[0]->recording_date, 'long', null) : '-' ?></span>
                        </div>  
                </div>
        </div>
        
    </div>

    <div class="ten columns column-last" >
    
    <?php
       $displayVideoCount = 3;
       
       for($i=1; $i<=$displayVideoCount; $i++):
    ?>
    <!-- First Video-->
    <div class="video-block">
            <div class="video-thumbnail">
                    <a class="fb-comment-count" href="#fb-comment-<?php echo $this->Videos[$i]->id; ?>">
                        <?php
                        $this->widget('ext.YoutubeViewer', array(
                            'imageUrl' => $this->Videos[$i]->thumbnail_url,
                            'width' => 156,
                            'height' => 86,
                            'display' => 'image',
                            'alt' => $this->Videos[$i]->title
                        ));
                        ?>
                    </a>
            </div><!-- Thumbnail -->
            <div class="video-text clearfix">
                    <div class="video-title">
                        <h6>
                            <a class="fb-comment-count" href="#fb-comment-<?php echo $this->Videos[$i]->id; ?>">
                                <?php echo $this->Videos[$i]->title; ?>
                            </a>
                        </h6>
                    </div>
                    <div class="video-info">
                        #<span class="tags">
                            <?php echo WebHelper::renderTags($this->Videos[$i]->videoTags); ?>
                        </span><br />
                            <span class="view-counter">
                                <?php echo number_format($this->Videos[$i]->view_counter); ?> views
                            </span>
                        <span class="date"><?php echo $this->Videos[$i]->recording_date != null ? Yii::app()->dateFormatter->formatDateTime($this->Videos[$i]->recording_date, 'long', null) : '-' ?></span>
                        
                    </div>
            </div><!-- end video-text -->
    </div><!-- end video-block -->
    <?php endfor; ?>
        
    
   
        
        
    </div>
