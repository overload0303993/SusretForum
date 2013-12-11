<?php
/* @var $this KorisnikController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Korisniks',
);

$this->menu=array(
	array('label'=>'Create Korisnik', 'url'=>array('create')),
	array('label'=>'Manage Korisnik', 'url'=>array('admin')),
);
?>

<h1>Korisniks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
