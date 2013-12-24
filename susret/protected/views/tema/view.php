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
	);
	?>

	<h1><?php
		echo $model->naziv;
		Tema::model()->updateByPk($model->id, array('brojPregleda' => $model->brojPregleda + 1));
		?></h1>

	<?php
	//yeah...it works...why? well...yeah...I don't know
	$start = $pages->getCurrentPage() * $pages->getPageSize();
	$end = ($pages->getCurrentPage() + 1) * $pages->getPageSize();
	for ($i = $start; $i < count($posts) && $i < $end; $i++) {
		?>
		<div class="view">
			<table>
				<tr>
					<td style="width: 20%;" >
						<?php
						$post = $posts[$i];
						$user = Korisnik::model()->findByPk($post->idAutor);
						?><a id="<?php echo ($i + 1); ?>"></a><?php
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
							 if ($user->datumRodjenja) {
								 $text = floor((time() - strtotime($user->datumRodjenja) + 7500) / 31556926);
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
								<td>Broj posta u temi: <?php echo ($i + 1) . "\t"; ?></td>
								<td>Post napisan: <?php
									$date = new DateTime($post->datumPost);
									echo $date->format('d.m.Y H:i') . "\t";
									?></td>
							</tr></table>
						<div style="padding: 5px">
							<?php
							$qoute = Post::model()->find('id=:idCitiran', array(':idCitiran' => $post->idCitiran));
							if (!empty($qoute)) {
								?>
								<div style="background-color: #FFF6BF; padding: 5px; border: 1px solid #FFA0A2; margin: 10px">
									<?php echo $qoute->tekst; ?>
								</div>
								<?php
							}
							//regex stolen from good guy on stack overflow
							//have no idea WHY does it work, but it's works and it makes me happy
							//of course, I know WHAT it does
							$link = preg_replace('/(?<!http:\/\/)(www.[-a-zA-Z0-9@:%_\+.~#?&\/=]+)/i', '<a href="http://\1">\1</a>', $post->tekst);
							echo $link;
							if (!empty($user->potpis)) {
								?>
								<div style="background-color: #FFFFFF; border: 1px solid #000000; height: min-content; margin: 10px 0; width: 100%;"> </div>
								<?php
								echo $user->potpis;
							}
							?>
						</div>
					</td>
				</tr>
			</table>
				
				<div style="text-align: right">
					<?php
					echo CHtml::button('Citiraj', array('submit' => array('/post/create',
							'postId' => $post->id, 'idTema' => $model->id)));
					$post = Yii::app()->db->createCommand()
									->select('post.*')
									->from('post')
									->where($model->id . '=post.idTema')
									->order('datumPost desc')->limit('1')->queryRow();
					if ($post['idAutor'] == Yii::app()->user->id && ($i == count($posts) - 1 || $i == $end - 1)) {
						echo CHtml::button('Uredi', array('submit' => array('/post/update/' . $post['id'])));
					}
					?>	
				</div>
			</div>
		<?php } ?>
		<div style="text-align: right">
			<?php
			echo CHtml::button('Odgovori', array('submit' => array('/post/create',
					'idTema' => $model->id)));
			?>	
		</div>
		<?php
		$this->widget('CLinkPager', array(
			'pages' => $pages,
		));
		?>
</html>
