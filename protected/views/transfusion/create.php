<?php
/* @var $this TransfusionController */
/* @var $model Transfusion */

$this->breadcrumbs=array(
	'Transfusions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Transfusion', 'url'=>array('index')),
	array('label'=>'Manage Transfusion', 'url'=>array('admin')),
);
?>

<h1>Create Transfusion</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>