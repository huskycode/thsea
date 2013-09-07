<?php
/* @var $this VideoController */
/* @var $model Video */
/* @var $form CActiveForm */
?>
<script type="text/javascript">
    $(function(){
       $('#Video_posted_date').datepicker(); 
    });
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'video-create-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url'); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'posted_date'); ?>
		<?php echo $form->textField($model,'posted_date'); ?>
		<?php echo $form->error($model,'posted_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'posted_by'); ?>
		<?php echo $form->textField($model,'posted_by'); ?>
		<?php echo $form->error($model,'posted_by'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'recording_date'); ?>
		<?php echo $form->textField($model,'recording_date'); ?>
		<?php echo $form->error($model,'recording_date'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
                &nbsp;&nbsp;
                <?php echo CHtml::link('Cancel',array('index')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->