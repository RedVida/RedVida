<?php

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Transfusiones', 'url'=>array('index')),
	array('label'=>'Registrar Trasplante', 'url'=>array('/paciente/asignar')),
	array('label'=>'Ver Transfusión', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Transfusiones', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Actualizar Transfusión #<?php echo $model->id; ?></h1>
</div>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>  
<hr class="style-two ">
