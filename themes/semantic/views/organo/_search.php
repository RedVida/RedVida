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
				<?php echo $form->label($model,'nombreOrgano'); ?>
				<?php echo $form->textField($model,'nombreOrgano',array('size'=>60,'maxlength'=>128)); ?>
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