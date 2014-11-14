<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('index')),
	array('label'=>'Registrar Trasplante', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trasplante-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1 class="ui huge header add icon"> &nbsp; &nbsp; &nbsp; Administrar Trasplantes</h1>
<hr class="style-two ">
<div class="ui grid"><!--start grid-->

	<div class="one wide column">
	</div>

	<div class="twelve wide column">
		<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->
	</div>
</div>
<hr class="style-two ">




<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">
	

		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'trasplante-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'id',
				'id_donante',
				'id_paciente',
				'tipo_donacion',
				'id_donacion',
				'compatibilidad',
				/*
				'detalle',
				'grado_urgencia',
				'centro_medico',
				'created',
				'modified',
				*/
				array(
					'class'=>'CButtonColumn',
				),
			),
			'htmlOptions' => array('class' => 'ui table responsive'),
		)); ?>
</div>
</div>