<?php
/* @var $this TemaController */
/* @var $model Tema */

$this->breadcrumbs=array(
	'Temas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tema', 'url'=>array('index')),
	array('label'=>'Create Tema', 'url'=>array('create')),
	array('label'=>'View Tema', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tema', 'url'=>array('admin')),
);
?>

<h1>Update Tema <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>