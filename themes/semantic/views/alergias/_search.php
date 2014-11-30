<?php
/* @var $this AlergiasController */
/* @var $model Alergias */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<br>
<div class="ui grid">
	<div class="one wide column"></div>
		<div class="twelve wide column">
		    <div class="ui form">
	<div class="fields">     
		        <div class="four wide field">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>128)); ?>
	</div>
</div>
	<div class="row buttons">
			    <?php echo CHtml::submitButton(CrugeTranslator::t('login', "Buscar"),array("class"=>"ui blue submit button")); ?>
			</div>
</div>
</div>
</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->