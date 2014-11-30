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
			<?php echo $form->labelEx($model,'id'); ?>
			<?php echo $form->textField($model,'id'); ?>
		</div>
	</div>

   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'rut_paciente'); ?>
			<?php echo $form->textField($model,'rut_paciente'); ?>
		</div>
	</div>

   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'tipo_sangre'); ?>
			<?php echo $form->textField($model,'tipo_sangre'); ?>
		</div>
	</div>


   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'cantidad'); ?>
			<?php echo $form->textField($model,'cantidad'); ?>
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

