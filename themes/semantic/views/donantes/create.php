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
	array('label'=>'Generar Informe', 'url'=>array('informe')),
);
?>
<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Registrar Donante </h1>
</div>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<hr class="style-two ">