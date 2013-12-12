
<?php
/* @var $this PodforumController */
/* @var $data Podforum */
?>

<?php $name = CHtml::encode($data->naziv); ?>

<?php
if ($name === 'Rasprava') {
	if (Yii::app()->user->checkAccess('istrazivac')) {
		?>
		<div class="view">
			<b><font size="4">
				<img src="<?php echo CHtml::encode($data->slika); ?>" alt="image">
				<?php $podforum = Podforum::model()->find('naziv=:naziv', array(':naziv' => $data->naziv));?>
				<a href='<?php echo "/susret/podforum/view/" . $podforum->id; ?>'><?php echo $data->naziv;?></a>
				</font></b>
		</div>
	<?php }
	
	} else { ?>
		<div class="view">
			<b><font size="4">
				<img src="<?php echo CHtml::encode($data->slika); ?>" alt="image">
				<?php $podforum = Podforum::model()->find('naziv=:naziv', array(':naziv' => $data->naziv));?>
				<a href="<?php echo "/susret/podforum/view/" . $podforum->id; ?>"><?php echo $data->naziv;?></a>
		<?php }?></font></b>
		</div>
	<br />
