<?php 
if(Yii::app()->user->isGuest) {
			$this->redirect('/susret/error/accessDenied');
		}
$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}
		?>
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
	<h1>Rezultati</h1>
	<p>Klikom na pojedini link otvara se odabrana tema.</p>
	<div class="view">
		<table>
			<tr>
				<td>Naslov teme</td>
				<td>Podforum</td>
				<td>Autor</td>
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
						<?php
						$user = Korisnik::model()->findByPk($thread->idAutor);
						echo $user->userName;
						?>
					</td>
					<td>
						<?php echo $thread->brojPregleda; ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</html>