<?php
/* @var $this PodforumController */
/* @var $model Podforum */

$this->breadcrumbs=array(
	'Podforums'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Podforum', 'url'=>array('index')),
	array('label'=>'Manage Podforum', 'url'=>array('admin')),
);
?>

<h1>Create Podforum</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>