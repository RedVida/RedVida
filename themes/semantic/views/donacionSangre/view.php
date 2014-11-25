<?php
/* @var $this DonacionSangreController */
/* @var $model DonacionSangre */

$this->breadcrumbs=array(
	'Donación de Sangre'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Donación de Sangre', 'url'=>array('index')),
	array('label'=>'Actualizar Donación de Sangre', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Donación de Sangre', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Donación de Sangre', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Ver Donación de Sangre #<?php echo $model->id;; ?></h1>
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
		'created',
		'modified',
		'tipo_sangre',
		'cantidad',
	),
	'htmlOptions'=>array('class'=>'ui celled table segment autosize'),
)); ?>
	</div>
	
</div>
<hr class="style-two ">
