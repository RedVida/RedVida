<?php
/* @var $this DonantesController */
/* @var $data Donantes */
?>

<div class="view">

<div class="ui celled list">
  <div class="item">
    <i class="user large icon"></i> 
    <div class="content">
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('centro_medico')); ?>:</b>
	<?php 
    $centro_medico=CentroMedico::model()->find('id='.$data->id_centro_medico);
	echo $centro_medico->nombre; ?>
	<br />

	<b><?php echo 'Enfermedades'; ?>:</b>
	<?php 
    $enfermedad=TieneEnfermedad::model()->find('id='.$data->id);

    ?>
    </div>
  </div>
</div>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('num_contacto')); ?>:</b>
	<?php echo CHtml::encode($data->num_contacto); ?>
	<br />

	*/ ?>

</div>