<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Pacientes', 'url'=>array('index')),
	array('label'=>'Registrar Paciente', 'url'=>array('create')),
	array('label'=>'Actualizar Paciente', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Paciente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Pacientes', 'url'=>array('admin')),
);
?>

<h1>Paciente: <?php echo $model->nombrePaciente," ",$model->apellidoPaciente?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rutPaciente',
		'afiliacionPaciente',
		'enfermedadPaciente',
		'gradoUrgenciaPaciente',
		'necesidadTrasplantePaciente',
		'centroMedicoPaciente',
	),
)); ?>
