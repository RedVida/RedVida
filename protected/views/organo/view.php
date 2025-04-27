<?php
/* @var $this OrganoController */
/* @var $model Organo */

$this->breadcrumbs=array(
	'Organos'=>array('index'),
	$model->idOrgano,
);

$this->menu=array(
	array('label'=>'List Organo', 'url'=>array('index')),
	array('label'=>'Create Organo', 'url'=>array('create')),
	array('label'=>'Update Organo', 'url'=>array('update', 'id'=>$model->idOrgano)),
	array('label'=>'Delete Organo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrgano),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Organo', 'url'=>array('admin')),
);
?>

<h1>View Organo #<?php echo $model->idOrgano; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idOrgano',
		'nombreOrgano',
	),
)); ?>
