<?php
/* @var $this PodforumController */
/* @var $model Podforum */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'podforum-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'naziv');?>
		<?php echo $form->textField($model,'naziv',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'naziv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'slika');?>
		<?php echo $form->textField($model,'slika',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'slika'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->