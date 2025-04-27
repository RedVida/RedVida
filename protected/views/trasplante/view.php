<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Trasplante', 'url'=>array('index')),
	array('label'=>'Create Trasplante', 'url'=>array('create')),
	array('label'=>'Update Trasplante', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Trasplante', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Trasplante', 'url'=>array('admin')),
);
?>

<h1>View Trasplante #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_donante',
		'id_paciente',
		'tipo_donacion',
		'id_donacion',
		'compatibilidad',
		'detalle',
		'grado_urgencia',
		'centro_medico',
		'created',
		'modified',
	),
)); ?>
