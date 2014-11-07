<?php
/* @var $this DonacionMedulaController */
/* @var $model DonacionMedula */

$this->breadcrumbs=array(
	'Donacion Medulas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DonacionMedula', 'url'=>array('index')),
	array('label'=>'Manage DonacionMedula', 'url'=>array('admin')),
);
?>

<h1 class="ui huge header"> &nbsp; &nbsp; &nbsp; Registrar Donación de Medula</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>