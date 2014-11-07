<?php
/* @var $this DonantesController */
/* @var $data Donantes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
	<?php echo CHtml::encode($data->nombres); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apellidos')); ?>:</b>
	<?php echo CHtml::encode($data->apellidos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rut')); ?>:</b>
	<?php echo CHtml::encode($data->rut); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sangre')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_sangre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_centro_medico')); ?>:</b>
	<?php echo CHtml::encode($data->id_centro_medico); ?>
	<br />

	<b><?php echo 'Enfermedades'; ?>:</b>
	<?php 
    $enfermedad=TieneEnfermedad::model()->find('id='.$data->id);

    ?>


	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('num_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->num_contacto); ?>
	<br />

	*/ ?>

</div>