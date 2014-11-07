<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Lista Pacientes', 'url'=>array('index')),
	array('label'=>'Registrar Pacientes', 'url'=>array('create')),
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

<h1>Administrar paciente</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
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
		'id',
		'nombrePaciente',
		'apellidoPaciente',
		'rutPaciente',
		'afiliacionPaciente',
		'enfermedadPaciente',
		/*
		'gradoUrgenciaPaciente',
		'necesidadTrasplantePaciente',
		'centroMedicoPaciente',
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
		),
	),
)))); ?>
