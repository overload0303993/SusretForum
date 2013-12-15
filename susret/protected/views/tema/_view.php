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
	/* @var $data Post */
	/* @var $model Tema */
	?>
	<?php
	?>
	<h1><?php echo $model->naziv; ?></h1>
		
		<?php if ($data->idTema == $model->id) { ?>
		<div class="view">

			<table>
				<tr>
					<td style="width: 20%;" >
						<?php
						$user = Korisnik::model()->findByPk($data->idAutor);
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
							 if ($user->starost) {
								 $text = $user->starost;
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
					<td style="vertical-align: top; text-align: left">Info o postu
						<div class="view">
							<?php
								echo $data->tekst;
							?>
					</div>
				</td>
			</tr>
		</table>

	</div>
	<?php }?>