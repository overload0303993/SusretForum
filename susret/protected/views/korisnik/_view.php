<?php
/* @var $this KorisnikController */
/* @var $data Korisnik */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userName')); ?>:</b>
	<?php echo CHtml::encode($data->userName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar')); ?>:</b>
	<?php echo CHtml::encode($data->avatar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spol')); ?>:</b>
	<?php echo CHtml::encode($data->spol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('starost')); ?>:</b>
	<?php echo CHtml::encode($data->starost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datumReg')); ?>:</b>
	<?php echo CHtml::encode($data->datumReg); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('rang')); ?>:</b>
	<?php echo CHtml::encode($data->rang); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('potpis')); ?>:</b>
	<?php echo CHtml::encode($data->potpis); ?>
	<br />

	*/ ?>

</div>