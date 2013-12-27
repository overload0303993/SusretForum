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
	<p>Klikom na pojedini link odlazite na temu u kojoj se nalazi odabrani post.</p>
	<p>(Ovo nije user friendly, ali ako hoću redirectat na zadnji post, moram radit poveći refactoring koda)</p>
	<div class="view">
		<table>
			<tr>
				<td>Tekst</td>
				<td>Tema</td>
				<td>Autor</td>
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
						$user = Korisnik::model()->findByPk($post->idAutor);
						echo $user->userName;
						?>
					</td>
					<td>
						<?php
						$date = new DateTime($post->datumPost);
						echo $date->format('d.m.Y. H:i'); ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</html>