<?php

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('index')),
	array('label'=>'Registrar Trasplante', 'url'=>array('create')),
	array('label'=>'Actualizar Trasplante', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Administrar Trasplantes', 'url'=>array('admin')),
);
?>

<h1 class="ui huge header add icon"> &nbsp; &nbsp; &nbsp; Ver Trasplante #<?php echo $model->id; ?></h1>
<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">
	</div>

	<div class="twelve wide column">

		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'id',
				'id_donante',
				'id_paciente',
				'tipo_donacion',
				'id_donacion',
				'compatibilidad',
				'detalle',
				'grado_urgencia',
				'centro_medico',
				'created',
				'modified',
			),
			'htmlOptions'=>array('class'=>'ui celled table segment'),


		)); ?>

</div>
</div>
