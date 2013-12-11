<?php
/* @var $this KorisnikController */
/* @var $model Korisnik */

$this->breadcrumbs=array(
	'Korisniks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Korisnik', 'url'=>array('index')),
	array('label'=>'Manage Korisnik', 'url'=>array('admin')),
);
?>

<h1>Create Korisnik</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>