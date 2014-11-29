<?php
/* @var $this CentroMedicoController */
/* @var $model CentroMedico */

$this->breadcrumbs=array(
	'Centro Medicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar C.Medico', 'url'=>array('admin')),
	array('label'=>'Listar C.Medico', 'url'=>array('index')),
);
?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Registrar Centro Medico </h1>
</div>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<hr class="style-two ">