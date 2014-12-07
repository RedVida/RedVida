<?php  $this->layout="//layouts/index";?>
<?php

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
 function name_centro_medico($val){
		$centro_medico=CentroMedico::model()->find('id='.$val);
		return $centro_medico->nombre;
 }
$centro_medico=CentroMedico::model()->find('id='.$this->getCM_user());
$pacientes=Paciente::model()->findAll('id_centro_medico!='.$this->getCM_user());
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
							<b>No se han encontrado Pacientes en otros Centros Medicos.
						</div> ";
?>

<div class="ui grid">
	<div class="one wide column"></div>
	<div class="fourteen wide column">
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'paciente-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		'nombre',
		'apellido',
		'rut',
		'afiliacion',
		'fecha_nacimiento',
		'edad',
		'id_centro_medico'=>array('header'=>'Centro Medico','name'=>'id_centro_medico', 'value'=>'name_centro_medico($data->id_centro_medico)'),
				array(
					'class'=>'CButtonColumn',
					'buttons'=>array(
        						'delete' => array('visible' => 'false'),
        						'update' => array('visible' => 'false'),
				      ),
			    ),
	),
	'emptyText' => $message,
)); ?>
</div>
</div>
<hr class="style-two ">