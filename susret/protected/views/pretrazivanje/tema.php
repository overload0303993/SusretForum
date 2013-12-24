<h1>Pretraživanje tema</h1>
<p>Unesite dio ili cijeli naslov teme koju želite tražiti.</p>

<?php echo CHtml::form(Yii::app()->createUrl('pretrazivanje/temaRez')) ?>
            <?php echo CHtml::textField('query','',array('placeholder' => 'Pretraga...')); ?>
            <?php echo CHtml::submitButton('Traži'); ?>
<?php echo CHtml::endForm() ?>
