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
	if ($threads) {
	?>
		<div class="view">
			<h2>Popis tema</h2>
			<table>
				<tr>
					<td>Naslov teme</td>
					<td>Podforum</td>
					<td>Broj pregleda</td>
				</tr>
				<?php foreach ($threads as $thread) { ?>
					<tr>
						<td><?php echo $thread->naziv; ?></a></td>
						<td>
						<?php
							$pdf = Podforum::model()->findByPk($thread->idPodforum);
							echo $pdf->naziv;
						?>
						</td>
						<td>
							<?php echo $thread->brojPregleda; ?>
						</td>
						<td>
							<?php 
								echo CHtml::button('Briši postove', array('submit' => array('/moderiraj/post', 'id' => $thread->id)));
							?>
						</td>
						<td>
							<?php 
								echo CHtml::button('Izbriši temu', array('submit' => array('/moderiraj/deleteTema', 'idTema' => $thread->id)));
							?>
						</td>
					</tr>
	<?php } ?>
		</table>
	</div>
	<?php } else { ?>
		<div class="view">
			<h2>Popis tema</h2>
			<h4>Nema tema na podforumu za koji ste zaduženi!</h4>
		</div>
	<?php } ?>
</html>