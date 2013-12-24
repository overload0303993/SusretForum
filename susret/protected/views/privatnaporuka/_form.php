<?php
/* @var $this PrivatnaporukaController */
/* @var $model Privatnaporuka */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'privatnaporuka-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Polja označena <span class="required">*</span> su obavezna.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'idPrimatelj'); ?>
		<?php echo $form->textField($model,'idPrimatelj'); ?>
		</br><font color="red"><?php
			echo $this->greskaUser; ?></font>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'naslov'); ?>
		<?php echo $form->textField($model,'naslov',array('size'=>50,'maxlength'=>50)); ?>
		</br> <font color="red"><?php
			echo $this->greskaNaslov; ?></font>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'tekst'); ?>
		<?php echo $form->textArea($model,'tekst',array('rows'=>6, 'cols'=>50)); ?>
		</br><font color="red"><?php
			echo $this->greskaPoruka; ?></font>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton("Pošalji"); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->