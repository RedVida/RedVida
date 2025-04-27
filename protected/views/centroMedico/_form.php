<?php
/* @var $this CentroMedicoController */
/* @var $model CentroMedico */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'centro-medico-form',
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
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contacto'); ?>
		<?php echo $form->textField($model,'contacto'); ?>
		<?php echo $form->error($model,'contacto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'director'); ?>
		<?php echo $form->textField($model,'director',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'director'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'especialidad'); ?>
		<?php echo $form->textField($model,'especialidad',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'especialidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gubernamental'); ?>
		<?php echo $form->textField($model,'gubernamental',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'gubernamental'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->