<?php
/* @var $this TrasplantesController */
/* @var $model Trasplantes */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista Trasplantes', 'url'=>array('index')),
	array('label'=>'Menu Trasplantes', 'url'=>array('admin')),
);
?>

<h1>Registrar Trasplantes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>