<?php
/* @var $this AlergiasController */
/* @var $model Alergias */

$this->breadcrumbs=array(
	'Alergiases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar Alergias', 'url'=>array('admin')),
	array('label'=>'Listar Alergias', 'url'=>array('index')),
	array('label'=>'Registrar Alergias', 'url'=>array('create')),
	array('label'=>'Ver Alergias', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>
<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Actualizar Alergia - <?php echo $model->nombre; ?></h1>
</div>
<hr class="style-two ">


<?php $this->renderPartial('_form', array('model'=>$model)); ?>