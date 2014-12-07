<?php
$this->menu=array(
	array('label'=>'Listar Donación de Órgano', 'url'=>array('index')),
	array('label'=>'Registrar Donación', 'url'=>array('/donantes/donar')),
	array('label'=>'Actualizar Donación de Órgano', 'url'=>array('update', 'id'=>$model->id),'visible'=>($this->getCM_donador($model->id_donante))),
	array('label'=>'Eliminar Donación de Órgano', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Está seguro que desea borrar este elemento?'),'visible'=>($this->getCM_donador($model->id_donante))),
	array('label'=>'Administrar Donación de Órgano', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Ver Donación de Órgano #<?php echo $model->id; ?></h1>
</div>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

	<?php  $modelo_d = Donantes::model()->find('id = '."'$model->id_donante'"); ?>


	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			array(
				'name'=>'Nombre',
				'value'=>$modelo_d['nombres'],

			),
			array(
				'name'=>'Apellido',
				'value'=>$modelo_d['apellidos'],
			),
			array(
				'name'=>'Rut',
				'value'=>$modelo_d->rut,
			),
			array(
				'name'=>'Organo',
				'value'=> $model->nombre,
			),
			array(
				'name'=>'Fecha de Ingreso',
				'value'=> CHtml::encode(Yii::app()->locale->dateFormatter->formatDateTime($model->created,'long',null)),
			),
			array(
				'name'=>'Hora',
				'value'=>Yii::app()->dateFormatter->format('HH:mm',$model->modified),
			),
			
			//'estado',
		),
				'htmlOptions'=>array('class'=>'ui celled table segment autosize'),

	)); ?>

	
	</div>
	
</div>

<hr class="style-two ">
