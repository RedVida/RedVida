<?php
/* @var $this DonanteController */
/* @var $model Donante */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Registrar Enfermedad',
);

$this->menu=array(
	array('label'=>'Lista Donante', 'url'=>array('index')),
	array('label'=>'Registrar Donante', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#donante-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Registrando Enfermedad a Donante</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'donante-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'nombres',
		'rut',
         array(
            'class' => 'CButtonColumn',
            'template'=>'{Registrar}', // botones a mostrar
            'buttons'=>array(
			'Registrar' => array( //botón para la acción nueva
		    'label'=>'Registrar Enfermedad', // titulo del enlace del botón nuevo
		    'url'=>'Yii::app()->createUrl("/donantes/registrarenfermedad&id=$data->id")', //url de la acción nueva
		    //'visible'=>'($data->estado==="DISPONIBLE")?true:false;'
		    ),
			),
          ),
	),
)); ?>