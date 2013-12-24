<?php
/* @var $this PrivatnaporukaController */
/* @var $model Privatnaporuka */

$this->breadcrumbs=array(
	'Privatnaporukas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Privatnaporuka', 'url'=>array('index')),
	array('label'=>'Create Privatnaporuka', 'url'=>array('create')),
	array('label'=>'View Privatnaporuka', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Privatnaporuka', 'url'=>array('admin')),
);
?>

<h1>Update Privatnaporuka <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>