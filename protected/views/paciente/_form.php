<?php
/* @var $this PacienteController */
/* @var $model Paciente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paciente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombrePaciente'); ?>
		<?php echo $form->textField($model,'nombrePaciente',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nombrePaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellidoPaciente'); ?>
		<?php echo $form->textField($model,'apellidoPaciente',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'apellidoPaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rutPaciente'); ?>
		<?php echo $form->textField($model,'rutPaciente',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'rutPaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'afiliacionPaciente'); ?>
		<?php echo $form->textField($model,'afiliacionPaciente',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'afiliacionPaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enfermedadPaciente'); ?>
		<?php echo $form->textField($model,'enfermedadPaciente',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'enfermedadPaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gradoUrgenciaPaciente'); ?>
		<?php echo $form->textField($model,'gradoUrgenciaPaciente',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'gradoUrgenciaPaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'necesidadTrasplantePaciente'); ?>
		<?php echo $form->textField($model,'necesidadTrasplantePaciente',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'necesidadTrasplantePaciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'centroMedicoPaciente'); ?>
		<?php echo $form->textField($model,'centroMedicoPaciente',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'centroMedicoPaciente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->