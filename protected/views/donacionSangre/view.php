<?php
/* @var $this DonacionSangreController */
/* @var $model DonacionSangre */

$this->breadcrumbs=array(
	'Donacion Sangres'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DonacionSangre', 'url'=>array('index')),
	array('label'=>'Create DonacionSangre', 'url'=>array('create')),
	array('label'=>'Update DonacionSangre', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DonacionSangre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DonacionSangre', 'url'=>array('admin')),
);
?>

<h1>View DonacionSangre #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rut_donante',
		'created',
		'modified',
		'tipo_sangre',
		'cantidad',
	),
)); ?>
