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
$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
?>

<h1>Podforumi</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'summaryText'=>'',
)); ?>
