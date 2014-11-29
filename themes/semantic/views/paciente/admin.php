<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista Paciente', 'url'=>array('index')),
	array('label'=>'Registrar Paciente', 'url'=>array('create')),
	array('label'=>'Urgencias Nacionales', 'url'=>array('urgenciasnacionales')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#paciente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<br/>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Administrar Pacientes </h1>
</div>
<hr class="style-two ">

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'paciente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'apellido',
		'rut',
		'afiliacion',
		'grado_urgencia',
		/*
		'necesidad_transplante',
		'tipo_sangre',
		'id_centro_medico',
		*/
		array(
			'class'=>'CButtonColumn',
		),
		array(
            'class' => 'CButtonColumn',
            'template'=>'{Registrar}', // botones a mostrar
            'buttons'=>array(
			'Registrar' => array( //botón para la acción nueva
		    'label'=>'Registrar Enfermedad', // titulo del enlace del botón nuevo
		    'url'=>'Yii::app()->createUrl("/paciente/registrarenfermedad&id=$data->id")', //url de la acción nueva
		))),
	),
)); ?>

<hr class="style-two ">
