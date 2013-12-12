<?php
/* @var $this PodforumController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Podforumi',
);

$this->menu=array(
	array('label'=>'Create Podforum', 'url'=>array('create')),
	array('label'=>'Manage Podforum', 'url'=>array('admin')),
);
?>

<h1>Podforumi</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'summaryText'=>'',
)); ?>
