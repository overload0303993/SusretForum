<?php
/* @var $this TemaController */
/* @var $model Tema */

$this->breadcrumbs=array(
	'Temas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tema', 'url'=>array('index')),
	array('label'=>'Manage Tema', 'url'=>array('admin')),
);
?>

<h1>Otvori temu</h1>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>