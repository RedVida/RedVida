<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */
/* @var $form CActiveForm */
?>
<div class="ui grid"><!--start grid-->

	<div class="one wide column">
	</div>

	<div class="twelve wide column">

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	
<div class="ui form">
   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'id'); ?>
			<?php echo $form->textField($model,'id'); ?>
		</div>
	</div>

	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar', array('class'=>'ui blue submit button')); ?>
	</div>

</div>



<?php $this->endWidget(); ?>

</div><!-- search-form -->

</div>
</div>