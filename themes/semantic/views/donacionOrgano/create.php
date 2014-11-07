<?php
/* @var $this DonacionOrganoController */
/* @var $model DonacionOrgano */

$this->breadcrumbs=array(
	'Donacion Organos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DonacionOrgano', 'url'=>array('index')),
	array('label'=>'Manage DonacionOrgano', 'url'=>array('admin')),
);
?>

<h1 class="ui huge header"> &nbsp; &nbsp; &nbsp; Registrar Donación de Organo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>