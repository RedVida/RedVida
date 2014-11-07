<?php
/* @var $this DonacionSangreController */
/* @var $model DonacionSangre */

$this->breadcrumbs=array(
	'Donacion Sangres'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DonacionSangre', 'url'=>array('index')),
	array('label'=>'Manage DonacionSangre', 'url'=>array('admin')),
);
?>

<h1 class="ui huge header"> &nbsp; &nbsp; &nbsp; Registrar Donación de Sangre</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>