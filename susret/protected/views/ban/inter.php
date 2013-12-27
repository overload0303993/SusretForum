<h1>Dodjela bana</h1>

<p>Ako želite dodjeliti ban korisniku <b><i><?php echo $user->userName;?></i></b>
odaberite datum do kojeg želite da ban traje.</br></br>
Ako ste odabrali pogrešnog korisnika, <a href='/susret/ban'>vratite se</a> na prethodnu stranicu.</p>

<form method="post">
	<input type="date" name="banDate">
<form>
<?php 
echo CHtml::button("Baniraj", array(
	'submit' => array('/ban/banned'),
	'params' => array('id' => $user->id)));
?>