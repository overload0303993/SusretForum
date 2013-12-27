<html>
	<head>
		<style type="text/css">
			td {
				width: 150px;
				border: solid 2px #000;
				text-align: center;
			}
		</style>
	</head>

	<?php
	/* @var $this PodforumController */
	
	
	/* @var $model Podforum */

	
	if(!Yii::app()->user->isGuest()) {
			$this->redirect('/susret/error/accessDenied');
		}
	
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
	
	if(!Yii::app()->user->checkAccess('istrazivac') && $model->id == 11) {
		//header('Location: /susret/errors/accessDenied');
		$this->redirect('/susret/error/accessDenied');
			
	} else {
	?>

	<h1><?php echo $model->naziv; ?></h1>

	<?php echo CHtml::button('Nova tema', array('submit' => array('/tema/create',
			'pdfId' => $model->id)));
	?>

	<?php
	$teme = Tema::model()->findAll('idPodforum=:id', array(':id' => $model->id));
	$params = Parametri::model()->findByPk('1');
	?>

	<?php
	
	if (empty($teme)) {
		?>  </br></br> <h2>Na ovom podforumu nema otvorenih tema.</h2> <?php
	} else {
		?>
		
		<?php foreach ($teme as $tema) { ?>
			<div class="view">
				<table style="border: 5px #000; border-collapse: collapse" >
					<tr>
						<td>Tema</td>
						<td>Broj stranica</td>
						<td>Broj postova</td>
						<td>Autor</td>
						<td>Broj pregleda</td>
						<td>Zadnji post</td>
					</tr>
					<tr><br><font size="4">
					<td><a href="<?php echo "/susret/tema/view/" . $tema->id; ?>"><?php echo $tema->naziv; ?></a></td>
					<td>
						<?php
						$posts = Post::model()->findAll('idTema=:id', array(':id' => $tema->id));
						echo ceil(count($posts) / $params->vrijednost);
						?>
					</td>
					<td><?php echo count($posts); ?></td>
					<td><?php
						$author = Korisnik::model()->findByPk($tema->idAutor);
						echo $author->userName;
						?></td>
					<?php
					$sql = Yii::app()->db->createCommand()
									->select('post.*')
									->from('post')
									->join('tema', $tema->id . '=post.idTema')
									->order('datumPost desc')->limit('1');
					$post = $sql->queryRow();
					?>
					<td><?php echo $tema->brojPregleda; ?></td>
					<td><?php
						$cntPost = count($posts);
						$page = ceil($cntPost / $params->vrijednost);
						$address = "/susret/tema/" . $tema->id . "?page=" . $page . "#" . $cntPost;
						?><a href="<?php echo $address; ?>">Zadnji post</a><br><?php
						$date = "";
						if (!empty($post)) {
							$date = new DateTime($post['datumPost']);
							$today = new DateTime(date('d.m.Y.'));
							$yesterday = new DateTime(date('d.m.Y.', time() - (24 * 60 * 60)));
							if ($date->format('d.m.Y.') == $today->format('d.m.Y.')) {
								echo "danas u " . $date->format('H:i');
							} else if ($date->format('d.m.Y.') == $yesterday->format('d.m.Y.')) {
								echo "jučer u " . $date->format('H:i');
							} else {
								echo $date->format('d.m.Y.') . " u " . $date->format('H:i');
							}
						}
						?></td></font></b></tr></table></div> 
	<?php } }?>
		

<?php } ?>

</html>

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
