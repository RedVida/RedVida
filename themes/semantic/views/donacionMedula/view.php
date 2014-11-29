<?php
$this->menu=array(
	array('label'=>'Listar Donación de Médula', 'url'=>array('index')),
	array('label'=>'Registrar Donación', 'url'=>array('/donantes/donar')),
	array('label'=>'Actualizar Donación de Médula', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Donación de Médula', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea borrar este elemento?')),
	array('label'=>'Administrar Donación de Médula', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Ver Donación Médula #<?php echo $model->id; ?></h1>
</div>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'id',
			'rut_donante',
			'tipo_medula',
			'created',
			'modified',
		),
				'htmlOptions'=>array('class'=>'ui celled table segment autosize'),

	)); ?>

	</div>
	
</div>

<hr class="style-two ">

