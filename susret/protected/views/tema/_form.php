<?php
/* @var $this TemaController */
/* @var $model Tema */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tema-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Polja označena <span class="required">*</span> su obvezna.</p>

	<?php echo $form->errorSummary($model); 
		$post = new Post();
		
	?>

	<div class="row">
		<?php echo $form->labelEx($model,'naziv'); ?>
		<?php echo $form->textField($model,'naziv',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'naziv'); ?>
	</div>

<!--	<div class="row">
		<?php echo $form->labelEx($model,'idPodforum'); ?>
		<?php echo $form->textField($model,'idPodforum'); ?>
		<?php echo $form->error($model,'idPodforum'); ?>
	</div>-->
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'idAutor'); ?>
		<?php echo $form->textField($model,'idAutor'); ?>
		<?php echo $form->error($model,'idAutor'); ?>
		<?php echo $_GET["pdfId"]; ?>
		<?php echo Yii::app()->user->id; ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($post,'tekst'); ?>
		<?php echo $form->textArea($post, 'tekst', array('maxlength' => 300, 'rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($post,'tekst'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');?>
    
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->