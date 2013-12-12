<?php
/* @var $this PostController */
/* @var $data Post */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tekst')); ?>:</b>
	<?php echo CHtml::encode($data->tekst); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTema')); ?>:</b>
	<?php echo CHtml::encode($data->idTema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idAutor')); ?>:</b>
	<?php echo CHtml::encode($data->idAutor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('datumPost')); ?>:</b>
	<?php echo CHtml::encode($data->datumPost); ?>
	<br />


</div>