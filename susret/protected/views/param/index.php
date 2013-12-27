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

<h1>Promjena parametara i moderatura</h1>

<p>Na ovoj stranici moguće je promijeniti neke parametre foruma te dodijeliti moderaturu korisnicima 
	koji nisu moderatori ili istraživači.</p>

<p><b><i><?php echo empty($note) ? "" : $note; ?></i></b></p>

<form method="post">
	Broj postova po stranici teme: <select name="tema">
		<option value="-1">Odaberi vrijednost</option>
		<option value="10">10</option>
		<option value="20">20</option>
		<option value="30">30</option>
		<option value="50">50</option>
		<option value="100">100</option>
	</select></br>
	Maksimalni broj znakova potpisa: <select name="potpis">
		<option value="-1">Odaberi vrijednost</option>
		<option value="100">100</option>
		<option value="200">200</option>
		<option value="300">300</option>
		<option value="500">500</option>
		<option value="1000">1000</option>
	</select><br><br>
	<?php echo CHtml::button("Promijeni!", array(
	'submit' => array('/param/change')));
?>
</form><br><br>
	<h2>Dodjela moderature</h2>
	<div class="view">
		<h2>Popis korisnika</h2>
		<?php if(!$users) { ?>
			<h4>Nema korisnika koji mogu biti moderatori(obični korisnici).</h4>
			<p>Na popisu nema korisnika koji trenutnu imaju ban.</p>
		<?php } else { ?>
		<p>Na popisu nema korisnika koji trenutnu imaju ban.</p>
		<table>
			<tr>
				<td>Korisničko ime</td>
				<td>Starost</td>
				<td>Broj postova</td>
				<td>Rang</td>
			</tr>
			<?php foreach ($users as $user) { ?>
				<tr>
					<td>
						<?php echo $user->userName;?></td>
					<td>
					<?php
						$text = "";
						if ($user->datumRodjenja) {
							$text = floor((time() - strtotime($user->datumRodjenja) + 7500) / 31556926);
						} else {
							$text = "--";
						}
						echo $text;
					?>
					</td>
					<td>
						<?php echo $user->brojPostova;?>
					</td>
					<td>
						<?php echo $user->brojPostova / 100.0;?>
					</td>
					<td>
						<?php echo CHtml::button("Postavi kao moderatora", array(
							'submit' => array('/param/mod'),
							'params' => array('id' => $user->id)));?>
					</td>
				</tr>
		<?php } } ?>
		</table>
	</div>
</html>


