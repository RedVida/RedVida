<?php
/* @var $this DonantesController */
/* @var $model Donantes */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Menu',
);

$this->menu=array(
	array('label'=>'Listar Donantes', 'url'=>array('index')),
	array('label'=>'Registrar Donantes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#donantes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Menu Donar</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'donantes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',,
		'nombres',
		'apellidos',
		'rut',
		/*
		'tipo_sangre',
		'email',
		'centro_medico',
		'direccion',
		'enfermedades',
		'alergias',
		'num_contacto',
		*/
		'link'=>array(
            'header'=>'',
            'type'=>'raw',
            'value'=> 'CHtml::button("Sangre",array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("donacionSangre/create",array("id"=>$data->id))."\'"))',
        ),   
	
		'link-2'=>array(
            'header'=>'',
            'type'=>'raw',
            'value'=> 'CHtml::button("Medula",array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("donacionMedula/create",array("id"=>$data->id))."\'"))',
        ),   
	
		'link-3'=>array(
            'header'=>'',
            'type'=>'raw',
            'value'=> 'CHtml::button("Organo",array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("donacionOrgano/create",array("id"=>$data->id))."\'"))',
        ),   
	
	/*

		array(
			'class'=>'CButtonColumn',
			'template'=>'{Sangre}', // botones a mostrar
            'buttons'=>array(
			'Sangre' => array( //botón para la acción nueva
		    'label'=>'Sangre', // titulo del enlace del botón nuevo
		    'url'=>'Yii::app()->createUrl("/donacionSangre/create&id=$data->id")', //url de la acción nueva
		    //'visible'=>'($data->estado==="DISPONIBLE")?true:false;'
		    ),
			),
		),

		array(
			'class'=>'CButtonColumn',
			'template'=>'{Medula}', // botones a mostrar
            'buttons'=>array(
			'Medula' => array( //botón para la acción nueva
		    'label'=>'Medula', // titulo del enlace del botón nuevo
		    'url'=>'Yii::app()->createUrl("/donacionMedula/create&id=$data->id")', //url de la acción nueva
		    //'visible'=>'($data->estado==="DISPONIBLE")?true:false;'
		    ),
			),
		),

		array(
			'class'=>'CButtonColumn',
			'template'=>'{Organo}', // botones a mostrar
            'buttons'=>array(
			'Organo' => array( //botón para la acción nueva
		    'label'=>'Organo', // titulo del enlace del botón nuevo
		    'url'=>'Yii::app()->createUrl("/donacionOrgano/create&id=$data->id")', //url de la acción nueva
		    //'visible'=>'($data->estado==="DISPONIBLE")?true:false;'
		    ),
			),
		),

		*/
	),
//	'htmlOptions'=>array('class'=>'ui table segment'),

)); ?>
