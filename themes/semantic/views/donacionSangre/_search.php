
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
		  <?php echo $form->labelEx($model,'Tipo de Sangre'); ?>
		  <?php echo $form->dropDownList($model,'tipo_sangre',CHtml::listData(BancoSangre::model()->findAll(),'tipo', 'tipo'), array('empty' => 'Selecciona Tipo Sangre', 'class'=>'ui selection dropdown')); ?>

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

