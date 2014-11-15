<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'trasplante-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_donante'); ?>
		<?php echo $form->textField($model,'id_donante',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'id_donante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_paciente'); ?>
		<?php echo $form->textField($model,'id_paciente',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'id_paciente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_donacion'); ?>
		<?php echo $form->textField($model,'tipo_donacion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tipo_donacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_donacion'); ?>
		<?php echo $form->textField($model,'id_donacion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'id_donacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'compatibilidad'); ?>
		<?php echo $form->textField($model,'compatibilidad',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'compatibilidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'detalle'); ?>
		<?php echo $form->textArea($model,'detalle',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'detalle'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grado_urgencia'); ?>
		<?php echo $form->textField($model,'grado_urgencia',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'grado_urgencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'centro_medico'); ?>
		<?php echo $form->textField($model,'centro_medico',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'centro_medico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->