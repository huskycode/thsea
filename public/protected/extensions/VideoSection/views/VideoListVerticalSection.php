<div class="vertical-list">
        <h2>#<?php 
        $url = Yii::app()->createUrl('site/list',array('tag'=>$this->HeaderName));
        echo '<a href="'.$url.'">'.$this->HeaderName.'('.VideoService::countAllVideoTag($this->HeaderName).')</a>';
        ?></h2>
    <?php
       for ($i = 0; $i < count($this->Videos); $i++):
           ?>

           <div class="video-block">
               <div class="video-thumbnail-smaller">
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

                       <a class="fb-comment-count" href="#fb-comment-<?php echo $this->Videos[$i]->id; ?>"
                          title="<?php echo $this->Videos[$i]->title; ?>">
                           <?php echo TextHelper::limitText($this->Videos[$i]->title,35); ?>
                       </a>

                   </div>
                   <div class="video-info">
                       <span class="view-counter">
                           <?php echo number_format($this->Videos[$i]->view_counter); ?> views
                       </span>
                       <span class="date"><?php echo DateTimeHelper::TimeAgo($this->Videos[$i]->recording_date) ?></span><br/>
                       
                   </div>
               </div>
           </div>
    <?php endfor;
    echo '<a href="'.$url.'" class="readmore">read more</a>';
    ?>
</div>