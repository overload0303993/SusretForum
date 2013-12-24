<?php
/* @var $this PrivatnaporukaController */
/* @var $model Privatnaporuka */
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
		<?php echo $form->label($model,'idPosiljatelj'); ?>
		<?php echo $form->textField($model,'idPosiljatelj'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPrimatelj'); ?>
		<?php echo $form->textField($model,'idPrimatelj'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datumPoslano'); ?>
		<?php echo $form->textField($model,'datumPoslano'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->