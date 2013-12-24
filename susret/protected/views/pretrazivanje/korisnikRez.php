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
	<p>Klikom na pojedini link možete vidjeti detalje korisnika.</p>
	<div class="view">
		<table>
			<tr>
				<td>Korisničko ime</td>
				<td>Starost</td>
				<td>Spol</td>
				<td>Broj postova</td>
				<td>Rang</td>
			</tr>
			<?php foreach ($users as $user) { ?>
				<tr>
					<td><a href="/susret/korisnik/view/<?php echo $user->id; ?>"><?php echo $user->userName; ?></a></td>
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
						<?php
						$spol = "";
						if($user->spol) {
							$spol = $user->spol;
						}
						echo $spol;
						?>
					</td>
					<td>
						<?php echo $user->brojPostova;?>
					</td>
					<td>
						<?php echo $user->brojPostova / 100.0;?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</html>