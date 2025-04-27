<?php
/* @var $this EnfermedadesController */
/* @var $model Enfermedades */

$this->breadcrumbs=array(
	'Enfermedades'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Enfermedades', 'url'=>array('index')),
	array('label'=>'Manage Enfermedades', 'url'=>array('admin')),
);
?>

<h1>Create Enfermedades</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>