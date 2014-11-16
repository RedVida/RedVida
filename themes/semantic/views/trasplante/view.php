<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('index')),
	array('label'=>'Registrar Trasplante', 'url'=>array('create')),
	array('label'=>'Actualizar Trasplante', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Trasplante', 'url'=>'#', 'linkOptions'=>array('submit'=>array('trasplante/delete','id'=>$model->id),'confirm'=>'Estas seguro de eliminar este Trasplante?')),
	array('label'=>'Administrar Trasplantes', 'url'=>array('admin')),
);
?>


<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Ver Trasplante #<?php echo $model->id; ?></h1>
</div>
<hr class="style-two ">


<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

	<?php 
	$modelo_paciente = Paciente::model()->find('id='.$model->id_paciente);
	$modelo_donante = Donantes::model()->find('id='.$model->id_donante);  
	 ?>

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			//'id',
			//'id_donante',
			//'id_paciente',
			array('name'=>'nombre_pac', 'value' => $modelo_paciente['nombre']),
			array('name'=>'rut_pac', 'value' => $modelo_paciente['rut']),
			array('name'=>'nombre_don', 'value' => $modelo_donante['nombres']),
			array('name'=>'rut_don', 'value' => $modelo_donante['rut']),	
			'tipo_donacion',
			//'id_donacion',
			'compatibilidad',
			'grado_urgencia',
			'centro_medico',
			'detalle',
			'created',
			'modified',
		),
		'htmlOptions'=>array('class'=>'ui celled table segment'),
	)); ?>

	</div>
	
</div>
<hr class="style-two ">