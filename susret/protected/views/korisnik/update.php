<?php
/* @var $this KorisnikController */
/* @var $model Korisnik */

//$this->breadcrumbs=array(
//	'Korisniks'=>array('index'),
//	$model->id=>array('view','id'=>$model->id),
//	'Update',
//);

$this->menu=array(
	array('label'=>'List Korisnik', 'url'=>array('index')),
	array('label'=>'Create Korisnik', 'url'=>array('create')),
	array('label'=>'View Korisnik', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Korisnik', 'url'=>array('admin')),
);

if(Yii::app()->user->isGuest()) {
			$this->redirect('/susret/error/accessDenied');
		}
?>

<?php if(Yii::app()->user->id != $model->id) {
	//header("Location: /susret/login/error");
	$this->redirect('/susret/error/accessDenied');
	
} else {
?>
<h1>Promijeni podatke</h1>

	<?php $this->renderPartial('edit', array('model'=>$model)); } ?>