<?php
/* @var $this DonantesController */
/* @var $model Donantes */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Donantes', 'url'=>array('index')),
	array('label'=>'Administrar Donantes', 'url'=>array('admin')),
);
?>

<h1 class="ui huge header"> &nbsp; &nbsp; &nbsp; Registrar Donante</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>