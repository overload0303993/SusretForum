<?php
/* @var $this PodforumController */
/* @var $model Podforum */

$this->breadcrumbs = array(
	'Podforums' => array('index'),
	$model->id,
);

$this->menu = array(
	array('label' => 'List Podforum', 'url' => array('index')),
	array('label' => 'Create Podforum', 'url' => array('create')),
	array('label' => 'Update Podforum', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Podforum', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
	array('label' => 'Manage Podforum', 'url' => array('admin')),
);
?>

<h1><?php echo $model->naziv; ?></h1>

<?php echo CHtml::button('Nova tema', array('submit' => array('/tema/create', 
				'pdfId'=>$model->id))); ?>

<?php $teme = Tema::model()->findAll('idPodforum=:id', array(':id' => $model->id)); ?>

<?php
if (empty($teme)) {
	?>  </br></br> <h2>Na ovom podforumu nema otvorenih tema.</h2> <?php
	
} else {
	?>
	<?php
		foreach ($teme as $tema) { ?>
	<div class="view">
		<b><font size="4">
			<a href='<?php echo "/susret/tema/view/" . $tema->id; ?>'><?php echo $tema->naziv; ?></a>
			</font></b>
	</div> 
	
<?php } } ?>



<?php
//$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		'id',
//		'naziv',
//		'slika',
//	),
//)); 
?>
