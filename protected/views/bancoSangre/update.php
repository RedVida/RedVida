<?php
/* @var $this BancoSangreController */
/* @var $model BancoSangre */

$this->breadcrumbs=array(
	'Banco Sangres'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List BancoSangre', 'url'=>array('index')),
	array('label'=>'Create BancoSangre', 'url'=>array('create')),
	array('label'=>'View BancoSangre', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage BancoSangre', 'url'=>array('admin')),
);
?>

<h1>Update BancoSangre <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>