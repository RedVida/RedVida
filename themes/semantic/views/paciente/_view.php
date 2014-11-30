<?php
/* @var $this PacienteController */
/* @var $data Paciente */
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
			<?php 
			$organo=Organo::model()->find('idOrgano='.$data->necesidad_transplante);
			echo $organo->nombreOrgano; ?>
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