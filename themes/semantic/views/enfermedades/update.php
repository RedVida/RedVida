<?php
/* @var $this EnfermedadesController */
/* @var $model Enfermedades */

$this->breadcrumbs=array(
	'Enfermedadeses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar Enfermedades', 'url'=>array('admin')),
	array('label'=>'Listar Enfermedades', 'url'=>array('index')),
	array('label'=>'Registrar Enfermedades', 'url'=>array('create')),
	array('label'=>'Ver Enfermedades', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Actualizar Enfermedad - <?php echo $model->nombre; ?></h1>
</div>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>