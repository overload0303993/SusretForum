<?php
/* @var $this TemaController */
/* @var $model Tema */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'naziv'); ?>
		<?php echo $form->textField($model,'naziv',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPodforum'); ?>
		<?php echo $form->textField($model,'idPodforum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idAutor'); ?>
		<?php echo $form->textField($model,'idAutor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'brojPregleda'); ?>
		<?php echo $form->textField($model,'brojPregleda'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->