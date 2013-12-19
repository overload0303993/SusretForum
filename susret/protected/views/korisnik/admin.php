<?php
/* @var $this KorisnikController */
/* @var $model Korisnik */

$this->breadcrumbs=array(
	'Korisniks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Korisnik', 'url'=>array('index')),
	array('label'=>'Create Korisnik', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#korisnik-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Traži korisnika</h1>


<?php echo CHtml::link('Pretraga','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'korisnik-grid',
	'dataProvider'=>$model->search(),
	'summaryText'=>'',
	//'filter'=>$model,
	'columns'=>array(
		//'id',
		'userName',
		'spol',
		'starost',
		/*
		'datumReg',
		'rang',
		'potpis',
		*/
//		array(
//			'class'=>'CButtonColumn',
//		),
	),
)); ?>
