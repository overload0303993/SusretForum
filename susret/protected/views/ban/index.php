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
	
	<h1>Baniranje korisnika</h1>
	<?php $users = Korisnik::model()->findAll();?>
	<div class="view">
		<h2>Popis korisnika</h2>
		<table>
			<tr>
				<td>Korisničko ime</td>
				<td>Starost</td>
				<td>Broj postova</td>
				<td>Rang</td>
				<td>Rola</td>
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
						<?php
						$role = Role::model()->findByPk($user->rola);
						echo $role->ime;
						?>
					</td>
					<td>
						<?php echo CHtml::button("Baniraj", array(
							'submit' => array('/ban/inter'),
							'params' => array('id' => $user->id)));?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</html>
