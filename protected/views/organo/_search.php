<?php
/* @var $this OrganoController */
/* @var $model Organo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idOrgano'); ?>
		<?php echo $form->textField($model,'idOrgano'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreOrgano'); ?>
		<?php echo $form->textField($model,'nombreOrgano',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->