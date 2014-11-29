<div class="ui grid">

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
			<?php echo $form->labelEx($model,'rut_donante'); ?>
			<?php echo $form->textField($model,'rut_donante'); ?>
		</div>
	</div>

   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'tipo_sangre'); ?>
			<?php echo $form->textField($model,'tipo_sangre'); ?>
		</div>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar', array('class'=>'ui blue submit button')); ?>
	</div>

</div>
			
	
<?php $this->endWidget(); ?>

</div>

</div>
</div>

