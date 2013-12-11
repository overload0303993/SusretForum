
<?php
/* @var $this PodforumController */
/* @var $data Podforum */
?>

<div class="view">

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />-->

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('naziv')); ?>:</b>-->
	
	
	<img src="<?php echo CHtml::encode($data->slika); ?>" alt="image">
	<?php $name = CHtml::encode($data->naziv); ?>
	<b><font size="4"><?php echo $name ?></font></b>
	<br />

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('slika')); ?>:</b>
	<?php echo CHtml::encode($data->slika); ?>
	<br />-->


</div>
