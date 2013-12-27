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
/* @var $this ModerirajController */
?>

<h1>Moderiranje podforuma</h1>

<?php 
	if ($posts) {
	?>
		<div class="view">
			<h2>Popis postova</h2>
			<table>
				<tr>
					<td>Tekst</td>
					<td>Autor</td>
					<td>Datum posta</td>
				</tr>
						<?php foreach ($posts as $post) { ?>
					<tr>
						<td>
						<?php echo substr($post->tekst, 0, 20) . "..."; ?></td>
						<td>
						<?php
							$user = Korisnik::model()->findByPk($post->idAutor);
							echo $user->userName;
						?>
						</td>
						<td>
						<?php
							$date = new DateTime($post->datumPost);
							echo $date->format('d.m.Y. H:i');
						?>
						</td>
						<td>
							<?php 
								echo CHtml::button('Izbriši post', array(
									'submit' => array('/moderiraj/deletePost'), 
									'params' => array('idPost' => $post->id, 'id' => $curThread)));
							?>
						</td>
					</tr>
	<?php }?>
		</table>
	</div>
	<?php } else { ?>
		<div class="view">
			<h2>Popis postova</h2>
			<h4>Nema postova na odabranoj temi!</h4>
		</div>
	<?php } ?>
</html>