<?php
/* @var $this TrasplantesController */
/* @var $data Trasplantes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_transplante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_transplante), array('view', 'id'=>$data->id_transplante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut_paciente')); ?>:</b>
	<?php echo CHtml::encode($data->rut_paciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('urgencia_medica')); ?>:</b>
	<?php echo CHtml::encode($data->urgencia_medica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enfermedad')); ?>:</b>
	<?php echo CHtml::encode($data->enfermedad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />


</div>