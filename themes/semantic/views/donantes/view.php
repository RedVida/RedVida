<?php
/* @var $this DonantesController */
/* @var $model Donantes */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Donantes', 'url'=>array('index')),
	array('label'=>'Registrar Donantes', 'url'=>array('create')),
	array('label'=>'Actualizar Donantes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Donantes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Donantes', 'url'=>array('admin')),
);
?>

<h1>Donantes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombres',
		'apellidos',
		'rut',
		'tipo_sangre',
		'email',
		'direccion',
		'num_contacto',
		'centro_medico',
	),
)); ?>
