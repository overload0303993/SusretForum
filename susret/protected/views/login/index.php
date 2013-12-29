<?php
/* @var $this SiteController */
/* @var $model Login */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<?php if(Yii::app()->user->isGuest) { ?> 
<h1>Prijava </h1>

<p>Niste prijavljeni na forum. Za daljenje korištenje, prijavite se sa
	postojećim podacima ili se <a href="/susret/korisnik/create">registrirajte</a>.</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); 

?>

	<p class="note">Polja označena <span class="required">*</span> su obvezna.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<br> <font color="red"><?php echo $this->error; ?></font>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Prijava'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php } else { 
	 header("Location: /susret/podforum");
}
?>