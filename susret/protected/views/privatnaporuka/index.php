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
<?php
/* @var $this PrivatnaporukaController */
/* @var $dataProvider CActiveDataProvider */

if(Yii::app()->user->isGuest) {
			$this->redirect('/susret/error/accessDenied');
		}
		$criteriaA = new CDbCriteria();
		$criteriaA->addCondition('DATE(datumIsteka) > CURDATE()');
		$criteriaA->addCondition('idKorisnik = ' . Yii::app()->user->id);
		if(Ban::model()->find($criteriaA)) {
			$this->redirect('/susret/error/banned');
		}

$this->breadcrumbs=array(
	'Privatnaporukas',
);

$this->menu=array(
	array('label'=>'Create Privatnaporuka', 'url'=>array('create')),
	array('label'=>'Manage Privatnaporuka', 'url'=>array('admin')),
);
?>

<h1>Privatne poruke</h1>

<?php $ppRecived = Privatnaporuka::model()->findAll('idPrimatelj=:id', array(':id'=>Yii::app()->user->id));
	$ppSent = Privatnaporuka::model()->findAll('idPosiljatelj=:id', array(':id'=>Yii::app()->user->id));?>

<?php
	
	echo CHtml::button('Napiši privatnu poruku', array('submit' => array('/privatnaporuka/create')));

	?>

<div class="view">
		<h2>Primljenje poruke</h2>
		<?php if($ppRecived) { ?>
		<table>
			<tr>
				<td>Naslov</td>
				<td>Pošiljatelj</td>
				<td>Datum slanja</td>
			</tr>
			<?php foreach($ppRecived as $pp) { ?>
			<tr>
				<td><a href="/susret/privatnaporuka/view/<?php echo $pp->id;?>"><?php echo $pp->naslov; ?></a></td>
				<td>
					<?php
					$user = Korisnik::model()->findByPk($pp->idPosiljatelj);?>
					<a href='/susret/korisnik/view/<?php echo $user->id ?>'><?php echo $user->userName;?></a>
				</td>
				<td>	
					<?php $date = new DateTime($pp->datumPoslano);
					echo $date->format('d.m.Y. H:i'); ?>
				</td>
			</tr><?php } ?>
		</table>
	<?php
		} else { ?>
		<h4>Nemate primljenih poruka!</h4>
		<?php }
	?>
	</div>

<div class="view">
		<h2>Poslane poruke</h2>
		<?php if($ppSent) { ?>
		<table>
			<tr>
				<td>Naslov</td>
				<td>Primatelj</td>
				<td>Datum slanja</td>
			</tr>
			<?php foreach($ppSent as $pp) { ?>
			<tr>
				<td><a href="/susret/privatnaporuka/view/<?php echo $pp->id;?>"><?php echo $pp->naslov; ?></a></td>
				<td>
					<?php
					$user = Korisnik::model()->findByPk($pp->idPrimatelj);?>
					<a href='/susret/korisnik/view/<?php echo $user->id ?>'><?php echo $user->userName;?></a>
				</td>
				<td>	
					<?php $date = new DateTime($pp->datumPoslano);
					echo $date->format('d.m.Y. H:i'); ?>
				</td>
			</tr><?php } ?>
		</table>
	<?php
		} else { ?>
		<h4>Nemate poslanih poruka!</h4>
		<?php }
	?>
	</div>

</html>