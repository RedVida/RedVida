<?php
$this->menu=array(
	array('label'=>'Listar Transfusiones', 'url'=>array('index')),
	array('label'=>'Registrar Trasplante', 'url'=>array('/paciente/asignar')),
	array('label'=>'Actualizar Transfusión', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Transfusión', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea borrar este elemento?')),
	array('label'=>'Administrar Transfusiones', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Ver Transfusión #<?php echo $model->id;; ?></h1>
</div>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

<?php  $modelo_p = Paciente::model()->find('rut = '."'$model->rut_paciente'"); ?>


	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array('name'=>'nombre_p', 'value' => $modelo_p['nombre'].' '.$modelo_p['apellido']),
			array('name'=>'rut_p', 'value' => $modelo_p['rut']),
			'tipo_sangre',
			'cantidad',
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

