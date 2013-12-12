<?php
/* @var $this TemaController */
/* @var $data Tema */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('naziv')); ?>:</b>
	<?php echo CHtml::encode($data->naziv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPodforum')); ?>:</b>
	<?php echo CHtml::encode($data->idPodforum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAutor')); ?>:</b>
	<?php echo CHtml::encode($data->idAutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brojPregleda')); ?>:</b>
	<?php echo CHtml::encode($data->brojPregleda); ?>
	<br />


</div>