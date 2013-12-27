
<html>
	<head>
		<style type="text/css">
			td {
				width: 150px;
				border: solid 1px #000;
				text-align: center;
			}
		</style>
	</head>
	<?php
	/* @var $this KorisnikController */
	/* @var $model Korisnik */

	if(Yii::app()->user->isGuest()) {
			$this->redirect('/susret/error/accessDenied');
		}
		
	$this->breadcrumbs = array(
		'Korisniks' => array('index'),
		$model->id,
	);

	$this->menu = array(
		array('label' => 'List Korisnik', 'url' => array('index')),
		array('label' => 'Create Korisnik', 'url' => array('create')),
		array('label' => 'Update Korisnik', 'url' => array('update', 'id' => $model->id)),
		array('label' => 'Delete Korisnik', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
		array('label' => 'Manage Korisnik', 'url' => array('admin')),
	);
	?>

	<h1>Pregled profila</h1>

	<div class="view">
		<h2>Podaci o korisniku</h2>
		<table>
			<tr>
				<td>Koriničko ime</td>
				<td>Avatar</td>
				<td>Spol</td>
				<td>Starost</td>
				<td>Datum registracije</td>
				<td>Broj postova</td>
				<td>Rang</td>
				<td>Potpis</td>
				<td>Zadnja aktivnost</td>
			</tr>
			<tr>
				<td><?php echo $model->userName; ?></td>
				<td>
					<?php
					if ($model->avatar) {
						$image = "/susret/userImages/" . $model->avatar;
						?><br>
						<img src="<?php echo $image ?>" alt="userimg"
							 width="120px" height="120px"></img>
							 <?php }
						 ?>
				</td>
				<td>
					<?php echo $model->spol; ?>
				</td>
				<td>
					<?php
					$text = "";
					if ($model->datumRodjenja) {
						$text = floor((time() - strtotime($model->datumRodjenja) + 7500) / 31556926);
					} else {
						$text = "--";
					}
					echo $text;
					?>
				</td>
				<td>
					<?php $date = new DateTime($model->datumReg);
					echo $date->format('d.m.Y');
					?>
				</td>
				<td>
					<?php echo $model->brojPostova; ?>
				</td>
				<td>
					<?php echo $model->brojPostova / 100.0; ?>
				</td>
				<td>
					<?php echo $model->potpis; ?>
				</td>
				<td>
				<?php $date = new DateTime($model->datumReg);
					echo $date->format('d.m.Y H:i');
				?>
				</td>
			</tr>
		</table>
	<?php
	if (Yii::app()->user->id == $model->id) {
		echo CHtml::button('Uredi profil', array('submit' => array('/korisnik/update/' . $model->id)));
	}
	?>
	</div>

<?php
$threads = Tema::model()->findAll('idAutor=:id', array(':id' => $model->id));
if ($threads) {
	?>
		<div class="view">
			<h2>Otvorene teme</h2>
			<table>
				<tr>
					<td>Naslov teme</td>
					<td>Podforum</td>
					<td>Broj pregleda</td>
				</tr>
	<?php foreach ($threads as $thread) { ?>
					<tr>
						<td><a href="/susret/tema/view/<?php echo $thread->id; ?>"><?php echo $thread->naziv; ?></a></td>
						<td>
					<?php
					$pdf = Podforum::model()->findByPk($thread->idPodforum);
					echo $pdf->naziv;
					?>
						</td>
						<td>
		<?php echo $thread->brojPregleda; ?>
						</td>
					</tr>
	<?php } ?>
		</table>
	</div>
	<?php } else { ?>
		<div class="view">
			<h2>Otvorene teme</h2>
			<h4>Niste otvorili niti jednu temu!</h4>
		</div>
	<?php } ?>
			<?php $posts = Post::model()->findAll('idAutor=:id ORDER BY datumPost desc LIMIT 10', array(':id' => $model->id));
			if ($posts) {
				?>
		<div class="view">
			<h2>Zadnjih 10 postova</h2>
			<table>
				<tr>
					<td>Tekst</td>
					<td>Tema</td>
					<td>Datum posta</td>
				</tr>
						<?php foreach ($posts as $post) { ?>
					<tr>
						<td>
							<?php
							$address = "/susret/tema/" . $post->idTema;
							?>
							<a href="<?php echo $address; ?>"><?php echo substr($post->tekst, 0, 20) . "..."; ?></a></td>
						<td>
		<?php
		$thread = Tema::model()->findByPk($post->idTema);
		echo $thread->naziv;
		?>
						</td>
						<td>
		<?php
		$date = new DateTime($post->datumPost);
		echo $date->format('d.m.Y. H:i');
		?>
						</td>
					</tr>
	<?php }?>
		</table>
	</div>
	<?php } else { ?>
		<div class="view">
			<h2>Zadnjih 10 postova</h2>
			<h4>Niste napisali niti jedan post!</h4>
		</div>
	<?php } ?>
</html>