<?php
/* @var $this AlergiasController */
/* @var $model Alergias */

$this->breadcrumbs=array(
	'Alergiases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Alergias', 'url'=>array('index')),
	array('label'=>'Create Alergias', 'url'=>array('create')),
	array('label'=>'Update Alergias', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Alergias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Alergias', 'url'=>array('admin')),
);
?>

<h1>View Alergias #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombres',
	),
)); ?>
