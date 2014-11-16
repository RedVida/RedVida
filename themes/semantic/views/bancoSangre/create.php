<?php
/* @var $this BancoSangreController */
/* @var $model BancoSangre */

$this->breadcrumbs=array(
	'Banco Sangres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BancoSangre', 'url'=>array('index')),
	array('label'=>'Manage BancoSangre', 'url'=>array('admin')),
);
?>

<h1>Create BancoSangre</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>