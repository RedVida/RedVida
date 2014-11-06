<?php
/* @var $this TrasplantesController */
/* @var $model Trasplantes */

$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	'Menu',
);

$this->menu=array(
	array('label'=>'Lista Trasplantes', 'url'=>array('index')),
	array('label'=>'Crear Trasplantes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('Buscar', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trasplantes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Menu Trasplantes</h1>


<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'trasplantes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_transplante',
		'rut_paciente',
		'urgencia_medica',
		'enfermedad',
		'detalle',
		'created',
		
		'modified',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
