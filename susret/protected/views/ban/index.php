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
	
	<div class="view">
		<h2>Popis baniranih korisnika</h2>
		<?php if(!$banned) { ?>
			<h4>Nema baniranih korisnika.</h4>
		<?php } else { ?>
		<table>
			<tr>
				<td>Korisničko ime</td>
				<td>Starost</td>
				<td>Broj postova</td>
				<td>Rang</td>
				<td>Rola</td>
				<td>Datum isteka bana</td>
			</tr>
			<?php foreach ($banned as $ban) { 
					$banUser = Korisnik::model()->find('id=:id', array(':id'=>$ban->idKorisnik));?>
				<tr>
					<td>
						<?php echo $banUser->userName;?></td>
					<td>
					<?php
						$text = "";
						if ($banUser->datumRodjenja) {
							$text = floor((time() - strtotime($banUser->datumRodjenja) + 7500) / 31556926);
						} else {
							$text = "--";
						}
						echo $text;
					?>
					</td>
					<td>
						<?php echo $banUser->brojPostova;?>
					</td>
					<td>
						<?php echo $banUser->brojPostova / 100.0;?>
					</td>
					<td>
						<?php
						$role = Role::model()->findByPk($banUser->rola);
						echo $role->ime;
						?>
					</td>
					<td>
						<?php
						echo $ban->datumIsteka;
						?>
					</td>
				</tr>
		<?php } }?>
		</table>
	</div>
	
	
	
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
			<?php foreach ($users as $user) { 
				$criteria = new CDbCriteria();
				$criteria->addCondition('DATE(datumIsteka) > CURDATE()');
				$criteria->addCondition('idKorisnik = ' . $user->id);
				if(!Ban::model()->find($criteria)) {?>
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
			<?php } }?>
		</table>
	</div>
</html>
