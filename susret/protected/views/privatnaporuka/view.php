<?php
/* @var $this PrivatnaporukaController */
/* @var $model Privatnaporuka */

if(Yii::app()->user->isGuest()) {
			$this->redirect('/susret/error/accessDenied');
		}


$this->breadcrumbs=array(
	'Privatnaporukas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Privatnaporuka', 'url'=>array('index')),
	array('label'=>'Create Privatnaporuka', 'url'=>array('create')),
	array('label'=>'Update Privatnaporuka', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Privatnaporuka', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Privatnaporuka', 'url'=>array('admin')),
);

Korisnik::model()->updateByPk(Yii::app()->user->id, array('vrijemeOdjave' => new CDbExpression('NOW()')));
$user1 = Korisnik::model()->findByPk($model->idPosiljatelj);
$user2 = Korisnik::model()->findByPk($model->idPrimatelj);
?>

<h1>Privatna poruka od <?php echo "<i>".$user1->userName."</i> za <i>" . $user2->userName . "</i>"; ?></h1>

<div class="view">
<?php echo "<h3>".$model->naslov."</h3>";
		$date = new DateTime($model->datumPoslano);
		echo $date->format('d.m.Y. H:i');		
?>
	<div class="view">
		<?php echo $model->tekst;?>
	</div>
	<?php echo CHtml::button('Odgovori', array('submit' => array('/privatnaporuka/create', 'idPrimatelj' => $model->idPosiljatelj, 'naslov' => $model->naslov))); ?>
</div>