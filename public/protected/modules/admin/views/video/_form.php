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
            var videoUrlElement = jQuery(this);
            renderVideo(videoUrlElement);
            loadYoutubeInfo(videoUrlElement);
            createPermalink();
        });
    
        jQuery('#Video_title').on('blur change', function(){
           createPermalink();
        });

        if (jQuery('#Video_url').val() !== '') {
            var videoUrlElement = jQuery('#Video_url');
            renderVideo(videoUrlElement);

            if (jQuery('#Video_thumbnail_url').val() === '') {
                loadYoutubeInfo(videoUrlElement);
            }
        }

        jQuery('form').submit(function() {
            var textTags = jQuery('#tags').textext()[0].hiddenInput().val();
            var tags = JSON.parse(textTags);
            //jQuery('#tags').val(tags.join());
            //jQuery('#tags_text').val(tags.join());
            //jQuery('#tags').html('test,aaaa,bbbb')
            //alert(jQuery('#tags_text').val());
        });

        var tags = JSON.parse('<?php echo $jsonTags; ?>');

        jQuery('#tags').textext({
            plugins: 'tags focus autocomplete arrow',
        }).bind('getSuggestions', function(e, data){
            textext = jQuery(e.target).textext()[0],
                    query = (data ? data.query : '') || '';

            jQuery(this).trigger(
                    'setSuggestions',
                    {result: textext.itemManager().filter(tags, query)}
            );
        });

        bindTags();
    });
    
    function createPermalink(){
         var title =  jQuery('#Video_title').val();
         
            jQuery.ajax({
                url: '<?php echo Yii::app()->createUrl('/api/permalize') ?>',
                type: "POST",
                dataType: 'json',
                data: {title: title},
                async: true,
                success: function(data) {
                    var urlName = jQuery('#Video_url_name');
                    
                    if(urlName.val()==''){
                        urlName.val(data);
                    }
                }
            });
    }

    function bindTags() {
<?php
if ($model) {
    $tags = array();

    foreach ($model->videoTags as $tag) {
        $tags[] = $tag->tag;
    }

    $json = CJSON::encode($tags);

    echo "jQuery('#tags').textext()[0].tags().addTags(" . $json . ");";
}
?>
    }

    function renderVideo(videoUrlElement) {
        var videoId = getVideoId(videoUrlElement.val());
        var frameVideo = '<iframe width="200" height="150" src="//www.youtube.com/embed/' + videoId + '" frameborder="0"></iframe>';
        jQuery("#youtube-player-container").html(frameVideo);
    }

    function getVideoId(url) {
        var videoId = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);

        if (videoId && videoId.length === 2) {
            return videoId[1];
        } else {
            return null;
        }
    }

    function loadYoutubeInfo(videoUrlElement) {
        var videoId = getVideoId(videoUrlElement.val());

        if (videoId === null) {
            alert('The video url does not correct format');
            videoUrlElement.val('');
            return false;
        }

        var videoInfo = application.utility.getVideoInfo(videoId);

        if (videoInfo === null) {
            alert('This video does not exist.');
            videoUrlElement.val('');
            return false;
        }

        var thumbnailUrl = getThumbnailUrl(videoInfo);
        jQuery('#Video_thumbnail_url').val(thumbnailUrl);

        jQuery('#Video_title').val(videoInfo.snippet.title);
        jQuery('#Video_description').val(videoInfo.snippet.description);
    }

    function getThumbnailUrl(videoInfo) {
        var thumbnailUrl = null;
        var thumbnails = videoInfo.snippet.thumbnails;

        if (thumbnails) {
            if (thumbnails.high) {
                thumbnailUrl = thumbnails.high.url;

            } else if (thumbnails.default) {
                thumbnailUrl = thumbnails.default.url;

            } else if (thumbnails.medium) {
                thumbnailUrl = thumbnails.medium.url;

            } else {
                jQuery.each(thumbnails, function(propName, propObj) {
                    if (propObj.url) {
                        thumbnailUrl = propObj.url;
                        return false;
                    }
                });
            }
        }

        return thumbnailUrl;
    }

    function openThumbnail() {
        var thumbnailUrl = jQuery('#Video_thumbnail_url').val();

        window.open(thumbnailUrl);
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

    <?php //echo $form->errorSummary($model);   ?>


    <div class="row">
        <?php echo $form->labelEx($model, 'url'); ?>
        <?php echo $form->textField($model, 'url', array('style' => 'width:400px;')); ?>
        <?php echo $form->error($model, 'url'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('style' => 'width: 400px;')); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>    
    
    <div class="row" >        
        <strong style="color:#6a6a6a">Permalink</strong><br />
        <?php echo Yii::app()->request->hostInfo; ?>/video/<?php echo $form->textField($model, 'url_name', array('style' => 'display:inline;width:210px')); ?>
        <?php echo $form->error($model, 'url_name'); ?>
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

    <div id='youtube-player-container'> </div>
    <a href="javascript:openThumbnail();">View Thumbnail</a>
    
    <div class="row">
        <?php echo $form->labelEx($model, 'slideshare_url'); ?>
        <?php echo $form->textField($model, 'slideshare_url', array('style' => 'width: 400px;')); ?>
        <?php echo $form->error($model, 'slideshare_url'); ?>
    </div>   
    
    <div class="row">
        <?php echo $form->labelEx($model, 'sync_time_slide'); ?>
        <?php echo $form->textArea($model, 'sync_time_slide', array('style'=>'width: 400px;',
                                                                       'maxlength' => 5000, 
                                                                       'rows' => 6, 
                                                                       'cols' => 100)); ?>
        <?php echo $form->error($model, 'sync_time_slide'); ?>
    </div> 
    
    <div class="row">
        <?php echo $form->labelEx($model, 'additional_content'); ?>
        <?php echo $form->textArea($model, 'additional_content', array('style'=>'width: 400px;',
                                                                       'maxlength' => 10000, 
                                                                       'rows' => 6, 
                                                                       'cols' => 100)); ?>
        <?php echo $form->error($model, 'additional_content'); ?>
    </div>   

    <div class="row">
        <?php echo $form->labelEx($model, 'recording_date'); ?>
        <?php
        echo $form->textField($model, 'recording_date', array('style' => 'width:80px;',
            'maxlength' => 10));
        ?>   
        <?php echo $form->error($model, 'recording_date'); ?>
    </div>

    <div class="row">
        Tags
        <textarea id="tags" name="tags" rows="3" cols="60" style="min-width:400px;"></textarea>
        <input type="hidden" name="tags_text" id="tags_text" />



        <div class="row buttons">
            <?php echo CHtml::submitButton('Submit'); ?>
            &nbsp;&nbsp;
            <?php echo CHtml::link('Cancel', array('index')); ?>
        </div>

        <?php echo $form->hiddenField($model, 'thumbnail_url') ?>
        <?php $this->endWidget(); ?>

    </div><!-- form -->