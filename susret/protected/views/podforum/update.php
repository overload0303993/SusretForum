<?php
/* @var $this PodforumController */
/* @var $model Podforum */

$this->breadcrumbs=array(
	'Podforums'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Podforum', 'url'=>array('index')),
	array('label'=>'Create Podforum', 'url'=>array('create')),
	array('label'=>'View Podforum', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Podforum', 'url'=>array('admin')),
);
?>

<h1>Update Podforum <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>