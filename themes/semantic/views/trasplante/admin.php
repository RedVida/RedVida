<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */

$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('index')),
	array('label'=>'Registrar Trasplante', 'url'=>array('paciente/asignar')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trasplante-grid').yiiGridView('update', {
		data: $(this).serialize()});
	return false;
});
");       

?>
<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Administrar Trasplantes </h1>
</div>
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
<?php 
function tipo_trasplante($val){
	$tipo_trasplante=TipoTrasplante::model()->find('id='.$val);
return $tipo_trasplante->nombre;
}
function centro_medico($val){
	$centro_medico=CentroMedico::model()->find('id='.$val);
return $centro_medico->nombre;
}
function donador($val,$tipo){
	if($tipo== 1){
	$donador=DonacionOrgano::model()->find('id='.$val);
	}
	if($tipo== 2){
	$donador=DonacionMedula::model()->find('id='.$val);
	}
	if($tipo== 3){
	$donador=DonacionSangre::model()->find('id='.$val);
	}
	$donante=Donantes::model()->find('rut='."'$donador->rut_donante'");	
	return $donante['nombres'].' '.$donante['apellidos'];
}
function paciente($val){
	$paciente=Paciente::model()->find('id='.$val);
return $paciente->nombre.' '.$paciente->apellido;
}  
?>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'trasplante-grid',
			'dataProvider'=>$model->search(),
		    'filter'=>$model,
			'columns'=>array(
				'id_tipo_trasplante'=> array('header'=> 'Tipo de trasplante','name' =>'id_tipo_trasplante', 'value'=> 'tipo_trasplante($data->id_tipo_trasplante)'),
				'id_centro_medico' => array('header'=> 'Centro Medico','name' =>'id_centro_medico', 'value'=> 'centro_medico($data->id_centro_medico)'),
				'id_donacion' => array('header'=> 'Donandor','name' =>'id_donacion', 'value'=> 'donador($data->id_donacion,$data->id_tipo_trasplante)'),
				'id_paciente'=> array('header'=> 'Paciente','name' =>'id_donacion', 'value'=> 'paciente($data->id_paciente)'),
				'created',
				'modified',
				array(
					'class'=>'CButtonColumn',
				),
			))); 
			?>


</div>
</div>

<hr class="style-two ">