<?php
$this->menu=array(
	array('label'=>'Listar Banco de Sangre', 'url'=>array('index')),
	array('label'=>'Registrar Banco de Sangre', 'url'=>array('create')),
	array('label'=>'Ver Banco de Sangre', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Banco de Sangre', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Actualizar Banco de Sangre #<?php echo $model->id; ?></h1>
</div>

<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>  

<hr class="style-two ">
