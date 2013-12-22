<?php
/* @var $this KorisnikController */
/* @var $model Korisnik */
/* @var $form CActiveForm */
?>

<?php if (!empty($this->greskaFatal)) {
	?> <h1><font color="red">Greška</font></h1></br></br>
	<h3><?php echo $this->greskaFatal; ?></h3> <?php } else {
	?>

	<div class="form">

		<?php
		$form = $this->beginWidget('CActiveForm', array(
			'id' => 'korisnik-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
			'enableAjaxValidation' => false,
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
		));
		?>

		<p class="note">Polja označena <span class="required">*</span> su obvezna.</p>

		<div class="row">
			<?php echo $form->labelEx($model, 'userName'); ?>
			<?php echo $form->textField($model, 'userName', array('size' => 30, 'maxlength' => 30)); ?>
			<?php
			if (!empty($this->greskaUser)) {
				?> </br> <font color="red"><?php echo $this->greskaUser; ?></font><?php
			}
			?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'password'); ?>
			<?php echo $form->passwordField($model, 'password', array('size' => 32, 'maxlength' => 32)); ?>
			<?php echo $form->error($model, 'password'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'drugaLozinka'); ?>
			<?php echo $form->passwordField($model, 'drugaLozinka', array('size' => 32, 'maxlength' => 32)); ?>
			<?php if (!empty($this->passGreska)) {
				?> </br> <font color="red"><?php echo $this->passGreska; ?></font><?php }
			?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'avatar'); ?>
			<?php echo CHtml::activeFileField($model, 'avatar'); ?>
			<?php
			$error = $form->error($model, 'avatar');
			if (!empty($error)) {
				?><font color="red"><?php echo 'Podržane ekstentzije su: .jpg, .png, .gif';
				?></font><?php }
			?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'spol'); ?>
			<?php echo $form->dropDownList($model, 'spol', array('M' => 'Muško',
				'Ž' => 'Žensko'), array('prompt' => 'Odaberi spol:'))
			?>
	<?php echo $form->error($model, 'spol'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'datumRodjenja'); ?>
			<?php
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'attribute' => "datumRodjenja", // the name of the field
			'model' => $model,
			'value' => $model->datumRodjenja, // pre-fill the value
			// additional javascript options for the date picker plugin
			'options' => array(
			'showAnim' => 'fold',
			'dateFormat' => 'yy-mm-dd', // optional Date formatting
			'debug' => true,),));?>
			<?php echo $form->error($model, 'datumRodjenja'); ?>
		</div>

		<div class="row">
	<?php echo $form->labelEx($model, 'potpis'); ?>
	<?php echo $form->textArea($model, 'potpis', array('rows' => 6, 'cols' => 50)); ?>
			<?php echo $form->error($model, 'potpis'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model, 'rola'); ?>
			<?php echo $form->dropDownList($model, 'rola', array(1 => 'Običan korisnik',
				2 => 'Moderator', 3 => 'Istrazivac'), array('prompt' => 'Odaberi rolu:'))
			?>
			<?php
			if (!empty($this->greskaRola)) {
				?> </br> <font color="red"><?php echo $this->greskaRola; ?></font><?php
			}
			?>
		</div>

		<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Stvori' : 'Spremi'); ?>
		</div>

	<?php $this->endWidget(); ?>

	</div><!-- form -->
<?php } ?>