<?php
/* @var $this TemaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Temas',
);

$this->menu=array(
	array('label'=>'Create Tema', 'url'=>array('create')),
	array('label'=>'Manage Tema', 'url'=>array('admin')),
);
if(Yii::app()->user->isGuest) {
			$this->redirect('/susret/error/accessDenied');
		}
$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
?>

<h1>Temas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
