<?php
/* @var $this TemaController */
/* @var $model Tema */
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
	'id'=>'tema-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Polja označena <span class="required">*</span> su obvezna.</p>

	<?php 
		$post = new Post();
		if(isset($_POST["Post"])) {
			$post->attributes = $_POST["Post"];
		}
	?>

	<div class="row">
		<?php echo $form->labelEx($model,'naziv'); ?>
		<?php echo $form->textField($model,'naziv',array('size'=>50,'maxlength'=>50)); ?>
		<br> <font color="red"><?php
			echo $this->greskaTema; ?></font>
	</div>

	<div class="row">
		<?php echo $form->labelEx($post,'tekst'); ?>
		<?php echo $form->textArea($post, 'tekst', array('maxlength' => 3000000, 'rows' => 6, 'cols' => 50)); ?>
		<br> <font color="red">
			<?php echo $this->greskaPost; ?></font>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');?>
    
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->