<?php
/* @var $this DonantesController */
/* @var $model Donantes */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Donantes', 'url'=>array('index')),
	array('label'=>'Manage Donantes', 'url'=>array('admin')),
);
?>

<h1>Create Donantes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>