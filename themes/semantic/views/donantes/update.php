<?php
/* @var $this DonantesController */
/* @var $model Donantes */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Donantes', 'url'=>array('index')),
	array('label'=>'Registrar Donantes', 'url'=>array('create')),
	array('label'=>'Ver Donantes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Donantes', 'url'=>array('admin')),
);
?>

<h1>Actualizar Donantes <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>