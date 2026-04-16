<?php
/* @var $this AlergiasController */
/* @var $model Alergias */

$this->breadcrumbs=array(
	'Alergiases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Alergias', 'url'=>array('index')),
	array('label'=>'Manage Alergias', 'url'=>array('admin')),
);
?>

<h1>Create Alergias</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>