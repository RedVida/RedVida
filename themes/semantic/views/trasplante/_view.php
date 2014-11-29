<?php
/* @var $this TrasplanteController */
/* @var $data Trasplante */
?>

<div class="view">
	<div class="ui celled list">
	  <div class="item">
	    <i class="add large icon"></i> 
	    <div class="content">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_pac')); ?>:</b>
	<?php $modelo_paciente = Paciente::model()->find('rut='."'$data->rut_paciente'");
	echo $modelo_paciente['nombre'].' '.$modelo_paciente['apellido']; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_don')); ?>:</b>
	<?php $modelo_donante = Donantes::model()->find('rut='."'$data->rut_donante'");
	echo $modelo_donante['nombres'].' '.$modelo_donante['apellidos']; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_donacion')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_donacion); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('compatibilidad')); ?>:</b>
	<?php echo CHtml::encode($data->compatibilidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_urgencia')); ?>:</b>
	<?php echo CHtml::encode($data->grado_urgencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('centro_medico')); ?>:</b>
	<?php echo CHtml::encode($data->centro_medico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<?php echo CHtml::link(CHtml::encode("Más Información"), array('view', 'id'=>$data->id)); ?>
	<br/>
  	
  		</div>
	</div>
</div>
</br>
</div>