<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('index')),
	array('label'=>'Actualizar Trasplante', 'url'=>array('create')),
	array('label'=>'Ver Trasplante', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Trasplantes', 'url'=>array('admin')),
);
?>

<h1 class="ui huge header add icon"> &nbsp; &nbsp; &nbsp; Actualizar Trasplante #<?php echo $model->id; ?></h1>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>