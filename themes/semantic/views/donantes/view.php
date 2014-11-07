<?php
/* @var $this DonantesController */
/* @var $model Donantes */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Donantes', 'url'=>array('index')),
	array('label'=>'Create Donantes', 'url'=>array('create')),
	array('label'=>'Update Donantes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Donantes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Donantes', 'url'=>array('admin')),
);
?>
<h1> Donante: <?php echo $model->nombres.' '.$model->apellidos ; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rut',
		'tipo_sangre',
		'email',
		'direccion',
		'num_contacto',
		'centro_medico',
	),
)); ?>
