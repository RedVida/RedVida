<?php
/* @var $this EnfermedadesController */
/* @var $model Enfermedades */

$this->breadcrumbs=array(
	'Enfermedadeses'=>array('index'),
	$model->id,
);
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Actualizar Enfermedades', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Administrar Enfermedades', 'url'=>array('admin')),
	array('label'=>'Eliminar Enfermedad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Seguro que deseas eliminar este Item?')),
	array('label'=>'Listar Enfermedades', 'url'=>array('index')),
	array('label'=>'Registrar Enfermedades', 'url'=>array('create')),
);
}
?>
<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Ver Alergia #<?php echo $model->id; ?> </h1>
</div>
<hr class="style-two ">
<br>

<div class="ui grid">
	<div class="one wide column"></div>
	<div class="twelve wide column">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre',
		'fecha_ingreso',
		'descripcion',
	),
	'htmlOptions'=>array('class'=>'ui celled table segment'),
)); ?>
</div>
</div>
<br>
<hr class="style-two ">