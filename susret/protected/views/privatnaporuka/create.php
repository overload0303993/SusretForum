<?php
/* @var $this PrivatnaporukaController */
/* @var $model Privatnaporuka */

$this->breadcrumbs=array(
	'Privatnaporukas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Privatnaporuka', 'url'=>array('index')),
	array('label'=>'Manage Privatnaporuka', 'url'=>array('admin')),
);
?>

<h1>Napiši poruku</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>