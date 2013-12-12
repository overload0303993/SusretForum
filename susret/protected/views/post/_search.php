<?php
/* @var $this PostController */
/* @var $model Post */
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
		<?php echo $form->label($model,'tekst'); ?>
		<?php echo $form->textArea($model,'tekst',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTema'); ?>
		<?php echo $form->textField($model,'idTema'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idAutor'); ?>
		<?php echo $form->textField($model,'idAutor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datumPost'); ?>
		<?php echo $form->textField($model,'datumPost'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->