<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('index')),
	array('label'=>'Administrar Trasplantes', 'url'=>array('admin')),
);
?>

<h1 class="ui huge header add icon"> &nbsp; &nbsp; &nbsp; Registrar Trasplante</h1>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>