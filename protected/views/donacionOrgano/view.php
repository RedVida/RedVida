<?php
/* @var $this DonacionOrganoController */
/* @var $model DonacionOrgano */

$this->breadcrumbs=array(
	'Donacion Organos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DonacionOrgano', 'url'=>array('index')),
	array('label'=>'Create DonacionOrgano', 'url'=>array('create')),
	array('label'=>'Update DonacionOrgano', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DonacionOrgano', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DonacionOrgano', 'url'=>array('admin')),
);
?>

<h1>View DonacionOrgano #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rut_donante',
		'created',
		'modified',
		'nombre',
		'estado',
	),
)); ?>
