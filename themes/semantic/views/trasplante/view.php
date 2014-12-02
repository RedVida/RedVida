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

	<?php $tipo_trasplante=TipoTrasplante::model()->find('id='.$model->id_tipo_trasplante);?>
	<?php $centro_medico=CentroMedico::model()->find('id='.$model->id_centro_medico); ?>
	<?php 
				if($model->id_tipo_trasplante== 1){
				$donador=DonacionOrgano::model()->find('id='.$model->id_tipo_trasplante);
				}
				if($model->id_tipo_trasplante== 2){
				$donador=DonacionMedula::model()->find('id='.$model->id_tipo_trasplante);
				}
				if($model->id_tipo_trasplante== 3){
				$donador=DonacionSangre::model()->find('id='.$model->id_tipo_trasplante);
				}
				$donante=Donantes::model()->find('rut='."'$donador->rut_donante'");
 	?>
	<?php $paciente=Paciente::model()->find('id='.$model->id_paciente); ?>



	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'nombre'=> array('name'=>'Trasplante de','value' => $model->nombre),
			'id_tipo_trasplante'=> array('name'=>'Tipo','value' => $tipo_trasplante->nombre),
			'id_centro_medico'=> array('name'=>'Centro Medico','value' => $centro_medico->nombre),
			'created',
			'modified',
			'id_donacion'=> array('name'=>'Nombre Donante','value' => $donante['nombres'].' '.$donante['apellidos']),
			'id_paciente'=> array('name'=>'Nombre Paciente','value' => $paciente->nombre.' '.$paciente->apellido ),
			'detalle',
		),
		'htmlOptions'=>array('class'=>'ui celled table segment autosize'),
	)); ?>

	</div>
	
</div>
<hr class="style-two ">
