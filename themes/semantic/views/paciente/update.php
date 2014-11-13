<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Pacientes', 'url'=>array('index')),
	array('label'=>'Registrar Paciente', 'url'=>array('create')),
	array('label'=>'Ver Paciente', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Paciente', 'url'=>array('admin')),
);
?>

<h1>Actualizar Paciente <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>