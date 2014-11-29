<?php
$this->menu=array(
	array('label'=>'Listar Donación de Médula', 'url'=>array('index')),
	array('label'=>'Registrar Donación', 'url'=>array('/donantes/donar')),
	array('label'=>'Ver Donación de Médula', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Donación de Médula', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Actualizar Donación Médula #<?php echo $model->id; ?></h1>
</div>

<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>  

<hr class="style-two ">
