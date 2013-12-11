<?php
/* @var $this KorisnikController */
/* @var $model Korisnik */
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
		<?php echo $form->label($model,'userName'); ?>
		<?php echo $form->textField($model,'userName',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avatar'); ?>
		<?php echo $form->textField($model,'avatar',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spol'); ?>
		<?php echo $form->textField($model,'spol',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'starost'); ?>
		<?php echo $form->textField($model,'starost'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'datumReg'); ?>
		<?php echo $form->textField($model,'datumReg'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rang'); ?>
		<?php echo $form->textField($model,'rang'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'potpis'); ?>
		<?php echo $form->textArea($model,'potpis',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->