<?php
/* @var $this InfoController */
?>

<h1>Statistika</h1>
<div class="view">
	<b>Broj članova na forumu:</b> <?php echo $users;?>
</div>
<div class="view">
	<b>Ukupan broj tema na forumu:</b> <?php echo $threads;?>
</div>
<div class="view">
	<b>Ukupan broj postova na forumu:</b> <?php echo $posts;?>
</div>
<div class="view">
	<b>Korisnici koji danas slave rođendan:</b></br> 
	<?php foreach($birth as $user) {?>
	<a href='/susret/korisnik/view/<?php echo $user->id?>'><?php echo $user->userName;?></a></br>
	<?php }?>
</div>

<div class="view">
	<b>Korisnici aktivni u zadnja 24 sata:</b></br> 
	<?php foreach($active as $user) {?>
	<a href='/susret/korisnik/view/<?php echo $user->id?>'><?php echo $user->userName;?></a></br>
	<?php }?>
</div>

<div class="view">
	<b><font style="color: red">Mjesečna statistika</font></b></br></br>
	<b>Broj prijavljenih članova zadnjih mjesec dana: </b><?php echo $stats;?></br>
	<b>Prijava po danu u zadnjih mjesec dana: </b><?php echo round($stats / 30.0, 2);?></br> 
</div>