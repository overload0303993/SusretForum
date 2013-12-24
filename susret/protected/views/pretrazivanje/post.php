<h1>Pretraživanje posta</h1>
<p>Unesite dio ili cijeli tekst posta kojeg želite tražiti.</p>

<?php echo CHtml::form(Yii::app()->createUrl('pretrazivanje/postRez')) ?>
            <?php echo CHtml::textField('query','',array('placeholder' => 'Pretraga...')); ?>
            <?php echo CHtml::submitButton('Traži'); ?>
<?php echo CHtml::endForm() ?>