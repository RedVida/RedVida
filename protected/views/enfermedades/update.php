<?php
/* @var $this EnfermedadesController */
/* @var $model Enfermedades */

$this->breadcrumbs=array(
	'Enfermedades'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Enfermedades', 'url'=>array('index')),
	array('label'=>'Create Enfermedades', 'url'=>array('create')),
	array('label'=>'View Enfermedades', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Enfermedades', 'url'=>array('admin')),
);
?>

<h1>Update Enfermedades <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>