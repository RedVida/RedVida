<?php
/* @var $this BancoSangreController */
/* @var $model BancoSangre */

$this->breadcrumbs=array(
	'Banco Sangres'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BancoSangre', 'url'=>array('index')),
	array('label'=>'Create BancoSangre', 'url'=>array('create')),
	array('label'=>'Update BancoSangre', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BancoSangre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BancoSangre', 'url'=>array('admin')),
);
?>

<h1>Ver BancoSangre #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'tipo',
		'cantidad',
	),
)); ?>
