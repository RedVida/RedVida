<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Trasplante', 'url'=>array('index')),
	array('label'=>'Create Trasplante', 'url'=>array('create')),
	array('label'=>'View Trasplante', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Trasplante', 'url'=>array('admin')),
);
?>

<h1>Update Trasplante <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>