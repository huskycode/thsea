<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
    jQuery(function() {

        jQuery('#Video_recording_date').datepicker({
            dateFormat: 'yy-mm-dd',
        });

        jQuery('#Video_url').change(function() {
            var videoUrl = jQuery(this).val();
            renderVideo(videoUrl);
            setThumbnailUrl(videoUrl);
        });

        if (jQuery('#Video_url').val() != '') {
            var videoUrl = jQuery('#Video_url').val();
            renderVideo(videoUrl);
            setThumbnailUrl(videoUrl);
        }
    });

    function renderVideo(url) {
        var videoId = getVideoId(url);        
        var frameVideo = '<iframe width="200" height="150" src="//www.youtube.com/embed/' + videoId + '" frameborder="0"></iframe>';
        jQuery("#youtube-player-container").html(frameVideo);       
    }
    
    function getVideoId(url){
        var videoId = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);
        
        return videoId[1];
    }
    
    function setThumbnailUrl(url){
        var thumbnailUrl = getThumbnailUrl(url);
        
        jQuery('#Video_thumbnail_url').val(thumbnailUrl);
    }
    
    function openThumbnail(){   
        var thumbnailUrl = jQuery('#Video_thumbnail_url').val();
        
        window.open(thumbnailUrl);
    }
    
    function getThumbnailUrl(url){
        var videoId = getVideoId(url);
        var thumbnailUrl = null;

        if (videoId===null){
            alert('The video url does not correct format');
            return false;
        }
       
       var videoInfo = application.utility.getVideoInfo(videoId); 
       
       if (videoInfo===null){
           alert('This video does not exist.');
           return false;
       }
       
       var thumbnails = videoInfo.snippet.thumbnails;
       
       if (thumbnails){    
           if(thumbnails.high){
               thumbnailUrl = thumbnails.high.url;
               
           } else if(thumbnails.default){
               thumbnailUrl = thumbnails.default.url;
               
           } else if(thumbnails.medium){
               thumbnailUrl = thumbnails.medium.url;
               
           } else {
               jQuery.each(thumbnails, function(propName, propObj){
                   if (propObj.url){
                       thumbnailUrl = propObj.url;
                       return false;
                   }
               });
           }   
       }
       
       return thumbnailUrl;
    }
</script>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'video-create-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php //echo $form->errorSummary($model);  ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('style' => 'width: 400px;')); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row" style="white-space:nowrap">
        <?php echo $form->labelEx($model, 'description'); ?>
        <?php
        echo $form->textArea($model, 'description', array('style' => 'width:400px;',
            'cols' => 80,
            'rows' => 6));
        ?>
        <?php echo $form->error($model, 'description'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'url'); ?>
        <?php echo $form->textField($model, 'url', array('style' => 'width:400px;')); ?>
        <?php echo $form->error($model, 'url'); ?>
    </div>

    <div id='youtube-player-container'> </div>
    <a href="javascript:openThumbnail();">View Thumbnail</a>

    <div class="row">
        <?php echo $form->labelEx($model, 'recording_date'); ?>
        <?php echo $form->textField($model, 'recording_date', array('style' => 'width:70px;', 
                                                        'maxlength' => 10)); ?>   
        <?php echo $form->error($model, 'recording_date'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
        &nbsp;&nbsp;
        <?php echo CHtml::link('Cancel', array('index')); ?>
    </div>

    <?php echo $form->hiddenField($model, 'thumbnail_url')?>
    <?php $this->endWidget(); ?>

</div><!-- form -->