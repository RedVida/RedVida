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
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rut'); ?>
		<?php echo $form->textField($model,'rut',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'rut'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'afiliacion'); ?>
		<?php echo $form->textField($model,'afiliacion',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'afiliacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grado_urgencia'); ?>
		<?php echo $form->textField($model,'grado_urgencia',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'grado_urgencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'necesidad_transplante'); ?>
		<?php echo $form->textField($model,'necesidad_transplante',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'necesidad_transplante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_sangre'); ?>
		<?php echo $form->textField($model,'tipo_sangre',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'tipo_sangre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_centro_medico'); ?>
		<?php echo $form->textField($model,'id_centro_medico'); ?>
		<?php echo $form->error($model,'id_centro_medico'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->