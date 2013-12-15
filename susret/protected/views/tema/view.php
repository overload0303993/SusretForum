<?php
/* @var $this TemaController */
/* @var $model Tema */

$this->breadcrumbs=array(
	'Temas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Tema', 'url'=>array('index')),
	array('label'=>'Create Tema', 'url'=>array('create')),
	array('label'=>'Update Tema', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tema', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tema', 'url'=>array('admin')),
);
?>
<html></html>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'viewData'=>array('model'=>$model), 
	'itemView'=>'_view',
	'summaryText'=>'',
));?>

