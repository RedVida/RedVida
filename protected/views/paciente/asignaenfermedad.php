<?php
/* @var $this TieneEnfermedadController */
/* @var $model TieneEnfermedad */
/* @var $form CActiveForm */
?>

<div class="form">

<h2>Asignar enfermedad</h2>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tiene-enfermedad-asignaenfermedad-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->dropDownList($model,'id', $model->getEnfermedades()); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->