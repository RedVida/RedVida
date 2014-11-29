<?php
/* @var $this CentroMedicoController */
/* @var $model CentroMedico */

$this->breadcrumbs=array(
	'Centro Medicos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Administrar C.Medicos', 'url'=>array('admin')),
	array('label'=>'Listar C.Medicos', 'url'=>array('index')),
	array('label'=>'Registrar C.Medico', 'url'=>array('create')),
	array('label'=>'Ver C.Medicos', 'url'=>array('view', 'id'=>$model->id)),
);
?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Actualizar Centro Medico - <?php echo $model->nombre; ?></h1>
</div>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>