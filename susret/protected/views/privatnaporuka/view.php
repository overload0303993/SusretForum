<?php
/* @var $this PrivatnaporukaController */
/* @var $model Privatnaporuka */

$this->breadcrumbs=array(
	'Privatnaporukas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Privatnaporuka', 'url'=>array('index')),
	array('label'=>'Create Privatnaporuka', 'url'=>array('create')),
	array('label'=>'Update Privatnaporuka', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Privatnaporuka', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Privatnaporuka', 'url'=>array('admin')),
);

Korisnik::model()->updateByPk(Yii::app()->user->id, array('vrijemeOdjave' => new CDbExpression('NOW()')));
?>

<h1>View Privatnaporuka #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tekst',
		'idPosiljatelj',
		'idPrimatelj',
		'datumPoslano',
	),
)); ?>
