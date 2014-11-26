<?php
$this->menu=array(
	array('label'=>'Listar Órganos', 'url'=>array('index')),
	array('label'=>'Registrar Órgano', 'url'=>array('create')),
	array('label'=>'Actualizar Órgano', 'url'=>array('update', 'id'=>$model->idOrgano)),
	array('label'=>'Eliminae Órgano', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idOrgano),'confirm'=>'¿Está seguro que desea borrar este elemento?')),
	array('label'=>'Administrar Órganos', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Ver Órganos #<?php echo $model->idOrgano; ?></h1>
</div>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'nombreOrgano',
		),
		'htmlOptions'=>array('class'=>'ui celled table segment autosize'),
	)); ?>
	
	</div>
	
</div>

<hr class="style-two ">
