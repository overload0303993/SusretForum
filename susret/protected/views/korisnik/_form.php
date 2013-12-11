<?php
/* @var $this KorisnikController */
/* @var $model Korisnik */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'korisnik-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Polja označena <span class="required">*</span> su obvezna.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'userName'); ?>
		<?php echo $form->textField($model,'userName',array('size'=>30,'maxlength'=>30)); ?>
		<?php 
			$error = $form->error($model,'userName');
			if(!empty($error)) {
				echo 'Korisničko ime postoji!';
			}
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo CHtml::activeFileField($model,'avatar'); ?>
		<?php $error = $form->error($model,'avatar');
			if(!empty($error)) {
				echo 'Podržane ekstentzije su: .jpg, .png, .gif';
			}?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spol'); ?>
		<?php echo $form->dropDownList($model, 'spol', array('M' => 'Muško', 
			'Ž' => 'Žensko'), array('prompt'=>'Odaberi spol:'))?>
		<?php echo $form->error($model,'spol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'starost'); ?>
		<?php echo $form->textField($model,'starost'); ?>
		<?php echo $form->error($model,'starost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'potpis'); ?>
		<?php echo $form->textArea($model,'potpis',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'potpis'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->