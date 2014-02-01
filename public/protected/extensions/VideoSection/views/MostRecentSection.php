    <div class="seven columns" >
        
        <div  style="border-right: #cccccc solid 1px;padding-right: 20px">
            <div class="video-block" >
                    <div class="video-thumbnail-large">
                        <a class="fb-comment-count" href="#fb-comment-<?php echo $this->Videos[0]->id; ?>">
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
                                    <a class="fb-comment-count" href="#fb-comment-<?php echo $this->Videos[0]->id; ?>">
                                        <?php echo $this->Videos[0]->title; ?>
                                    </a>
                            </div>
                            <div class="video-info">
                                #<span class="tags">
                                    <?php echo WebHelper::renderTags($this->Videos[0]->videoTags); ?>
                                </span><br />
                                <span class="view-counter">
                                    <?php echo number_format($this->Videos[0]->view_counter); ?> views
                                </span>
                                <span class="date"><?php echo DateTimeHelper::TimeAgo($this->Videos[0]->recording_date) ?></span><br/>
                                <span class="description" title="<?php echo TextHelper::htmlEncode($this->Videos[0]->description); ?>"><?php echo TextHelper::limitText($this->Videos[0]->description); ?></span>
                            </div>  
                    </div>
            </div>
        </div>
    </div>

    <div class="nine columns column-last" >
    
    <?php
       $displayVideoCount = 3;
       $totalVideo = count($this->Videos);
       if($totalVideo < $displayVideoCount){
           $displayVideoCount = $totalVideo;
       }
       for($i=1; $i<=$displayVideoCount; $i++):
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
                                <?php echo $this->Videos[$i]->title; ?>
                            </a>
                        
                    </div>
                    <div class="video-info">
                        #<span class="tags">
                            <?php echo WebHelper::renderTags($this->Videos[$i]->videoTags); ?>
                        </span><br />
                            <span class="view-counter">
                                <?php echo number_format($this->Videos[$i]->view_counter); ?> views
                            </span>
                        <span class="date"><?php echo DateTimeHelper::TimeAgo($this->Videos[$i]->recording_date) ?></span><br/>
                        <span class="description" title="<?php echo TextHelper::htmlEncode($this->Videos[$i]->description); ?>"><?php echo TextHelper::limitText($this->Videos[$i]->description); ?></span>
                    </div>
            </div>
    </div>
    <?php endfor; ?>
        
    
   
        
        
    </div>
