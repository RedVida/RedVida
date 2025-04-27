<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Trasplante', 'url'=>array('index')),
	array('label'=>'Manage Trasplante', 'url'=>array('admin')),
);
?>

<h1>Create Trasplante</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>