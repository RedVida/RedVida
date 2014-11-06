<?php
/* @var $this TrasplantesController */
/* @var $model Trasplantes */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	$model->id_transplante,
);

$this->menu=array(
	array('label'=>'Lista Trasplantes', 'url'=>array('index')),
	array('label'=>'Crear Trasplantes', 'url'=>array('create')),
	array('label'=>'Actualizar Trasplantes', 'url'=>array('update', 'id'=>$model->id_transplante)),
	array('label'=>'Eliminar Trasplantes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_transplante),'confirm'=>'Estas seguro de eliminar este trasplante?')),
	array('label'=>'Menu Trasplantes', 'url'=>array('admin')),
);
?>

<h1>Ver Trasplantes #<?php echo $model->id_transplante; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_transplante',
		'rut_paciente',
		'urgencia_medica',
		'enfermedad',
		'detalle',
		'created',
		'modified',
	),
)); ?>
