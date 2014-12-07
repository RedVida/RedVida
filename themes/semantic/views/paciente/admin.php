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



<?php echo CHtml::link('&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$centro_medico=CentroMedico::model()->find('id='.$this->getCM_user());
$pacientes=Paciente::model()->findAll('id_centro_medico='.$this->getCM_user());
$values= array();
foreach ($pacientes as $r) $values[]=$r->id;
$criteria = new CDbCriteria();
$criteria->addInCondition('id',$values,'OR');
$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));
$message='';
 if(!$values)$message="
						<div class ='ui warning message'>
							<i class='warning sign icon'></i>
							<i class='close icon'></i>
							<b>No se han encontrado Pacientes en este Centro Medico (".$centro_medico->nombre.").
						</div> ";
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'paciente-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array(
     		'name'=>'estado',
            'type'=>'image',
            'value'=>'$data->estado=="0"? Yii::app()->baseUrl."/images/on.ico":Yii::app()->baseUrl."/images/off.ico"',

		),
		'nombre',
		'apellido',
		'rut',
		'afiliacion',
		'fecha_nacimiento',
		'edad',
		/*
		'necesidad_transplante',
		'tipo_sangre',
		'id_centro_medico',
		*/
		array(
            'class' => 'CButtonColumn',
            'template'=>'{Registrar}', // botones a mostrar
            'buttons'=>array(
			'Registrar' => array( //botón para la acción nueva
		    'label'=>'Registrar Enfermedad', // titulo del enlace del botón nuevo
		    'url'=>'Yii::app()->createUrl("/paciente/registrarenfermedad&id=$data->id")', //url de la acción nueva
		))),
		array(
            'class' => 'CButtonColumn',
            'template'=>'{Registrar}', // botones a mostrar
            'buttons'=>array(
			'Registrar' => array( //botón para la acción nueva
		    'label'=>'Registrar Alergia', // titulo del enlace del botón nuevo
		    'url'=>'Yii::app()->createUrl("/paciente/registraralergia&id=$data->id")', //url de la acción nueva
		))),
	),
	'emptyText' => $message,
)); ?>

<hr class="style-two ">
