<?php
/* @var $this CentroMedicoController */
/* @var $model CentroMedico */

$this->breadcrumbs=array(
	'Centro Medicos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Actualizar C.Medicos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Administrar C.Medicos', 'url'=>array('admin')),
	array('label'=>'Eliminar C.Medico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que deseas eliminar este Item?')),
	array('label'=>'Listar C.Medicos', 'url'=>array('index')),
	array('label'=>'Registrar C.Medico', 'url'=>array('create')),
);
?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Ver Centro Medico #<?php echo $model->id; ?> </h1>
</div>
<hr class="style-two ">
<br>

<div class="ui grid">
	<div class="one wide column"></div>
	<div class="twelve wide column">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'direccion',
		'contacto',
		'director',
		'especialidad',
		'gubernamental',
	),
	'htmlOptions'=>array('class'=>'ui celled table segment'),
)); ?>
</div>
</div>
<br>
<hr class="style-two ">