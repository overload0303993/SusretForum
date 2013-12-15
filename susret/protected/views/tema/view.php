<html>
	<head>
		<style type="text/css">
			td {
				width: 150px;
				border: solid 1px #000;
				text-align: center
			} 
		</style>
	</head> 
<?php
/* @var $this TemaController */
/* @var $model Tema */

$this->breadcrumbs = array(
	'Temas' => array('index'),
	$model->id,
);

$this->menu = array(
	array('label' => 'List Tema', 'url' => array('index')),
	array('label' => 'Create Tema', 'url' => array('create')),
	array('label' => 'Update Tema', 'url' => array('update', 'id' => $model->id)),
	array('label' => 'Delete Tema', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
	array('label' => 'Manage Tema', 'url' => array('admin')),
);?>

<h1><?php echo $model->naziv; ?></h1>

	<?php 
		$start = $pages->getCurrentPage();
		$end = $start + $pages->getPageSize();
		for ($i=$start; $i < count($posts) && $i < $end; $i++) { ?>
		<div class="view">
			<table>
				<tr>
					<td style="width: 20%;" >
						<?php
						$post = $posts[$i];
						$user = Korisnik::model()->findByPk($post->idAutor);
						echo $user->userName;
						if ($user->avatar) {
							$image = "/susret/userImages/" . $user->avatar;
							?><br>
							<img src="<?php echo $image ?>" alt="userimg"
								 width="120px" height="120px"></img>
								 <?php
							 }
							 $text = "";
							 if ($user->spol) {
								 $text = $user->spol;
							 } else {
								 $text = "--";
							 }
							 echo "</br>Spol: " . $text;
							 if ($user->starost) {
								 $text = $user->starost;
							 } else {
								 $text = "--";
							 }
							 echo "</br>Starost: " . $text;
							 $date = new DateTime($user->datumReg);
							 echo "</br>Datum registracije: " . $date->format('d.m.Y');
							 echo "</br>Broj postova: " . $user->brojPostova;
							 echo "</br>Rang: " . $user->brojPostova / 100.0;
							 ?>
					</td>
					<td style="vertical-align: top; text-align: left">
						<table>
							<tr>
						<td>Broj posta u sustavu: <?php echo $post->id . "\t"; ?></td>
						<td>Broj posta u temi: <?php echo ($i+1) . "\t"; ?></td>
						<td>Post napisan: <?php  $date = new DateTime($post->datumPost);
													echo $date->format('d.m.Y h:m') . "\t"; ?></td>
							</tr></table>
						<div class="view">
							<?php
							echo $post->tekst;
							?>
						</div>
					</td>
				</tr>
			</table>

		</div>
		<?php }	?>
<?php $this->widget('CLinkPager', array(
	'pages'=>$pages,
));
?>
</html>
