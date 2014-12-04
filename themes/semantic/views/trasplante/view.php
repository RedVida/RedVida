<?php
$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('index')),
	array('label'=>'Asignar Trasplante', 'url'=>array('paciente/asignar')),
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
	<?php $centro_medico=CentroMedico::model()->find('id='.$model->id_centro_medico); ?>

	<?php $paciente=Paciente::model()->find('id='.$model->id_paciente); ?>

	<?php if($model->tipo=='Organo')$donacion=DonacionOrgano::model()->find('id='.$model->id_donacion);
	else $donacion=DonacionMedula::model()->find('id='.$model->id_donacion);
	$donante=Donantes::model()->find('id='.$donacion->id_donante);

	$nombre_donante=  $donante->nombres.' '.$donante->apellidos;
?>


	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'nombre'=> array('name'=>'Trasplante de','value' => $model->nombre),
			'tipo'=> array('name'=>'Tipo','value' => $model->tipo),
			'id_centro_medico'=> array('name'=>'Centro Medico','value' => $centro_medico->nombre),
			'created',
			'modified',
			'id_donacion'=> array('name'=>'Nombre Donante','value' => $nombre_donante),
			'id_paciente'=> array('name'=>'Nombre Paciente','value' => $paciente->nombre.' '.$paciente->apellido ),
			'detalle',
		),
		'htmlOptions'=>array('class'=>'ui celled table segment autosize'),
	)); ?>

	</div>
	
</div>
<hr class="style-two ">
