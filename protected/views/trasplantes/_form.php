<?php
/* @var $this TrasplantesController */
/* @var $model Trasplantes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trasplantes-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_paciente'); ?>
		<?php echo $form->textField($model,'rut_paciente',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'rut_paciente'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'urgencia_medica'); ?>
		<?php echo $form->dropDownlist($model,'urgencia_medica',array('1'=>'1','2'=>'2','3'=>'3')); ?>
		<?php echo $form->error($model,'urgencia_medica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'enfermedad'); ?>
		<?php echo $form->textField($model,'enfermedad',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'enfermedad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->