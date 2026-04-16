<?php
/* @var $this DonacionMedulaController */
/* @var $model DonacionMedula */

$this->breadcrumbs=array(
	'Donacion Medulas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List DonacionMedula', 'url'=>array('index')),
	array('label'=>'Create DonacionMedula', 'url'=>array('create')),
	array('label'=>'Update DonacionMedula', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DonacionMedula', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DonacionMedula', 'url'=>array('admin')),
);
?>

<h1>View DonacionMedula #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'rut_donante',
		'created',
		'modified',
		'tipo_medula',
	),
)); ?>
