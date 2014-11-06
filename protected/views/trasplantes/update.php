<?php
/* @var $this TrasplantesController */
/* @var $model Trasplantes */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	$model->id_transplante=>array('view','id'=>$model->id_transplante),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista Trasplantes', 'url'=>array('index')),
	array('label'=>'Crear Trasplantes', 'url'=>array('create')),
	array('label'=>'Ver Trasplantes', 'url'=>array('view', 'id'=>$model->id_transplante)),
	array('label'=>'Menu Trasplantes', 'url'=>array('admin')),
);
?>

<h1>Actualizar Trasplantes <?php echo $model->id_transplante; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>