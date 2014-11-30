<?php
$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('index')),
	array('label'=>'Registrar Trasplante', 'url'=>array('create')),
	array('label'=>'Actualizar Trasplante', 'url'=>array('update', 'id'=>$model->id)),
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


if($model->tipo_donacion == "Órgano"){
$model_getDon = DonacionOrgano::model()->find('id ='."'$model->id_donacion'");
$var = $model_getDon['rut_donante'];
	$modelo_paciente = Paciente::model()->find('rut ='."'$model->rut_paciente'");
	$modelo_donante = Donantes::model()->find('rut ='."'$var'");  
	 
}


if($model->tipo_donacion == "Médula"){
$model_getDon = DonacionMedula::model()->find('id ='."'$model->id_donacion'");
$var = $model_getDon['rut_donante'];
	$modelo_paciente = Paciente::model()->find('rut ='."'$model->rut_paciente'");
	$modelo_donante = Donantes::model()->find('rut ='."'$var'");  
	 
}


	 ?>

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			//'id',
			//'id_donante',
			//'id_paciente',
			array('name'=>'nombre_pac', 'value' => $modelo_paciente['nombre'].' '.$modelo_paciente['apellido']),
			array('name'=>'rut_pac', 'value' => $modelo_paciente['rut']),
			array('name'=>'nombre_don', 'value' => $modelo_donante['nombres'].' '.$modelo_donante['apellidos']),
			array('name'=>'rut_don', 'value' => $modelo_donante['rut']),	
			'tipo_donacion',
			'id_donacion',
			'compatible',
			'grado_urgencia',
			'centro_medico',
			//'detalle',
			array(
			'name'=>'detalle',
			'type'=>'ntext',
			'htmlOptions'=>array('style' => 'width: 100; position: relative;'),
			),
			array(
				'name'=>'Fecha de Ingreso',
				'value'=> CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($model->created,'long',null)),
			),
			array(
				'name'=>'Hora',
				'value'=>Yii::app()->dateFormatter->format('HH:mm',$model->created),
			),
		),
		'htmlOptions'=>array('class'=>'ui celled table segment autosize'),
	)); ?>

	</div>
	
</div>
<hr class="style-two ">
