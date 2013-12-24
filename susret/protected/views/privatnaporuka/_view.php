<?php
/* @var $this PrivatnaporukaController */
/* @var $data Privatnaporuka */
?>

<?php 
	$ppRecived = Privatnaporuka::model()->findAll('idPrimatelj=:id', array(':id'=>Yii::app()->user->id));
	$ppSent = Privatnaporuka::model()->findAll('idPosiljatelj=:id', array(':id'=>Yii::app()->user->id));
?>

<div class="view">

</div>