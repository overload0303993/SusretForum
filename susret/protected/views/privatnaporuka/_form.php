<?php
/* @var $this PrivatnaporukaController */
/* @var $model Privatnaporuka */
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
	'id'=>'privatnaporuka-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); 
if(isset($_GET['idPrimatelj']) && isset($_GET['naslov'])) {
	$user = Korisnik::model()->findByPk($_GET['idPrimatelj']);
	$model->idPrimatelj = $user->userName;
	if(strpos($model->naslov, "RE") != 0) {
		$model->naslov = "RE:" . $_GET['naslov'];
	} else {
		$model->naslov = $_GET['naslov'];
	}
}

?>

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