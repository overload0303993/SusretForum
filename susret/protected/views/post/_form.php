<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tekst'); ?>
		<?php echo $form->textArea($model,'tekst',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'tekst'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idTema'); ?>
		<?php echo $form->textField($model,'idTema'); ?>
		<?php echo $form->error($model,'idTema'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idAutor'); ?>
		<?php echo $form->textField($model,'idAutor'); ?>
		<?php echo $form->error($model,'idAutor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'datumPost'); ?>
		<?php echo $form->textField($model,'datumPost'); ?>
		<?php echo $form->error($model,'datumPost'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->