<?php
/* @var $this CentroMedicoController */
/* @var $model CentroMedico */

$this->breadcrumbs=array(
	'Centro Medicos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar C.Medicos', 'url'=>array('index')),
	array('label'=>'Registrar C.Medico', 'url'=>array('create')),
	array('label'=>'Generar Informe', 'url'=>array('informe')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#centro-medico-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Administrar Centros Medicos </h1>
</div>
<hr class="style-two ">

<?php echo CHtml::link('&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'centro-medico-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'direccion',
		'contacto',
		'director',
		'especialidad',
		'gubernamental',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
