<?php
/* @var $this PostController */
/* @var $model Post */
/* @var $form CActiveForm */
$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
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

	<p class="note">Polja označena <span class="required">*</span> su obvezna.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'tekst'); ?>
		<?php echo $form->textArea($model,'tekst',array('rows'=>6, 'cols'=>50)); ?>
		<?php 
			if($this->greskaPostTekst) { ?>
				</br> <font color="red"><?php
					echo $this->greskaPostTekst; ?></font>
			<?php }?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->