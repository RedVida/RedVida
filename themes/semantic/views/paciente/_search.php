<?php
/* @var $this PacienteController */
/* @var $model Paciente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombrePaciente'); ?>
		<?php echo $form->textField($model,'nombrePaciente',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apellidoPaciente'); ?>
		<?php echo $form->textField($model,'apellidoPaciente',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rutPaciente'); ?>
		<?php echo $form->textField($model,'rutPaciente',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'afiliacionPaciente'); ?>
		<?php echo $form->textField($model,'afiliacionPaciente',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'enfermedadPaciente'); ?>
		<?php echo $form->textField($model,'enfermedadPaciente',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gradoUrgenciaPaciente'); ?>
		<?php echo $form->textField($model,'gradoUrgenciaPaciente',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'necesidadTrasplantePaciente'); ?>
		<?php echo $form->textField($model,'necesidadTrasplantePaciente',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'centroMedicoPaciente'); ?>
		<?php echo $form->textField($model,'centroMedicoPaciente',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->