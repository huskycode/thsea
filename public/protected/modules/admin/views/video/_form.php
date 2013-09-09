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
            renderVideo();
        });

        if (jQuery('#Video_url').val() != '') {
            renderVideo();
        }
    });

    function renderVideo() {
        var url = jQuery('#Video_url').val();
        var videoid = url.match(/(?:https?:\/{2})?(?:w{3}\.)?youtu(?:be)?\.(?:com|be)(?:\/watch\?v=|\/)([^\s&]+)/);

        if (videoid != null) {
            var frameVideo = '<iframe width="200" height="150" src="//www.youtube.com/embed/' + videoid[1] + '" frameborder="0"></iframe>';
            jQuery("#youtube-player-container").html(frameVideo);
        }
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

    <?php $this->endWidget(); ?>

</div><!-- form -->