<?php
/* @var $this PodforumController */
/* @var $model Podforum */

$this->breadcrumbs=array(
	'Podforums'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Podforum', 'url'=>array('index')),
	array('label'=>'Create Podforum', 'url'=>array('create')),
	array('label'=>'Update Podforum', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Podforum', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Podforum', 'url'=>array('admin')),
);
?>

<h1>View Podforum #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'naziv',
		'slika',
	),
)); ?>
