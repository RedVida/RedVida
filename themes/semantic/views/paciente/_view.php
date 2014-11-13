<?php
/* @var $this PacienteController */
/* @var $data Paciente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombrePaciente); ?>

	<?php echo CHtml::encode($data->apellidoPaciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Enfermedad')); ?>:</b>
	<?php echo CHtml::encode($data->enfermedadPaciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Grado urgencia')); ?>:</b>
	<?php echo CHtml::encode($data->gradoUrgenciaPaciente); ?>
	<br />

	<?php echo CHtml::link(CHtml::encode("Más detalle"), array('view', 'id'=>$data->id)); ?>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('necesidadTrasplantePaciente')); ?>:</b>
	<?php echo CHtml::encode($data->necesidadTrasplantePaciente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('centroMedicoPaciente')); ?>:</b>
	<?php echo CHtml::encode($data->centroMedicoPaciente); ?>
	<br />

	*/ ?>

</div>