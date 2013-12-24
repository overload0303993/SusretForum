<h1>Pretraživanje korisnika</h1>
<p>Unesite dio ili cijelo korisničko ime korisnka kojeg želite tražiti.</p>

<?php echo CHtml::form(Yii::app()->createUrl('pretrazivanje/korisnikRez')) ?>
            <?php echo CHtml::textField('query','',array('placeholder' => 'Pretraga...')); ?>
            <?php echo CHtml::submitButton('Traži'); ?>
<?php echo CHtml::endForm() ?>
