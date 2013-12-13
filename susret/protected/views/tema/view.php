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

<h1><?php echo $model->naziv; 
	$posts = Post::model()->findAll('idTema=:id', array(':id'=>$model->id));?></h1>

<?php
if (empty($posts)) {
	?>  </br></br> <h2>Tema ne sadrži niti jedan post.</h2> <?php
	
} else {
	?>
	<?php
		foreach ($posts as $post) { ?>
	<div class="view" id='<?php echo $post->id; ?>'>
		<b><font size="4">
			<?php echo $post->tekst; ?>
			</font></b>
	</div> 
	
<?php } } ?>
