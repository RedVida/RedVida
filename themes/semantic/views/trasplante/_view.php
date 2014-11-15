<?php
/* @var $this TrasplanteController */
/* @var $data Trasplante */
?>

<div class="view">

<div class="ui celled list">
  <div class="item">
    <i class="add large icon"></i> 
    <div class="content">
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_donante')); ?>:</b>
	<?php echo CHtml::encode($data->id_donante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_paciente')); ?>:</b>
	<?php echo CHtml::encode($data->id_paciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_donacion')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_donacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_donacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_donacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compatibilidad')); ?>:</b>
	<?php echo CHtml::encode($data->compatibilidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	</br>
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_urgencia')); ?>:</b>
	<?php echo CHtml::encode($data->grado_urgencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('centro_medico')); ?>:</b>
	<?php echo CHtml::encode($data->centro_medico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('modified')); ?>:</b>
	<?php echo CHtml::encode($data->modified); ?>
	<br />

	*/ ?>
   	</div>
  	</div>
	</div>
	</br>
</div>
