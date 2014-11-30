<?php
/* @var $this PacienteController */
/* @var $data Paciente */
$organo = Organo::model()->findAll(array('select'=>'nombreOrgano'));
?>

<div class="view">
<div class="ui celled list">
  <div class="item">
      <i class="user large icon"></i>
          <div class="content">

			<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
			<?php echo CHtml::encode($data->nombre); ?>

			<?php echo CHtml::encode($data->apellido); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('afiliacion')); ?>:</b>
			<?php echo CHtml::encode($data->afiliacion); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('grado_urgencia')); ?>:</b>
			<?php echo CHtml::encode($data->grado_urgencia); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('necesidad_transplante')); ?>:</b>
			<?php echo $organo[$data->necesidad_transplante-1]->nombreOrgano; ?>
			<br />
			
			<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_nacimiento')); ?>:</b>
			<?php echo CHtml::encode($data->fecha_nacimiento); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ingreso')); ?>:</b>
			<?php echo CHtml::encode($data->fecha_ingreso); ?>
			<br />

			<b><?php echo CHtml::encode($data->getAttributeLabel('edad')); ?>:</b>
			<?php echo CHtml::encode($data->edad); ?>
			<br />

			<?php echo CHtml::link(CHtml::encode("Más detalle"), array('view', 'id'=>$data->id)); ?>
			<br/>

			<br/>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_sangre')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_sangre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_centro_medico')); ?>:</b>
	<?php echo CHtml::encode($data->id_centro_medico); ?>
	<br />

	*/ ?>

</div>
</div>
</div>
</div>