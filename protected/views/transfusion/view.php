<?php
/* @var $this TransfusionController */
/* @var $model Transfusion */

$this->breadcrumbs=array(
	'Transfusions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Transfusion', 'url'=>array('index')),
	array('label'=>'Create Transfusion', 'url'=>array('create')),
	array('label'=>'Update Transfusion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Transfusion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Transfusion', 'url'=>array('admin')),
);
?>

<h1>View Transfusion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rut_paciente',
		'tipo_sangre',
		'cantidad',
		'created',
		'modified',
	),
)); ?>
