<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Paciente', 'url'=>array('index')),
	array('label'=>'Registrar Paciente', 'url'=>array('create')),
	array('label'=>'View Paciente', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Paciente', 'url'=>array('admin')),
);
?>

<h1 class="ui huge header add icon"> &nbsp; &nbsp; &nbsp; Actualizar Paciente: <?php echo $model->nombre; ?></h1>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>