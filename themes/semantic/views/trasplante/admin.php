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
function donante($val,$tipo){
	if($tipo=='Organo')$donacion=DonacionOrgano::model()->find('id='.$val);
	else $donacion=DonacionMedula::model()->find('id='.$val);
	$donante=Donantes::model()->find('id='.$donacion->id_donante);

	return $donante->nombres.' '.$donante->apellidos;
}
function paciente($val){
	$paciente=Paciente::model()->find('id='.$val);
return $paciente->nombre.' '.$paciente->apellido;
}
function user_centro_medico($val){
		$centro_medico_user =TieneCentroMedico::model()->find('id_user='.Yii::app()->user->id);	
		if($centro_medico_user->id_centro_medico == $val)return true;
		else return false;
 }
?>
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'trasplante-grid',
			'dataProvider'=>$model->search(),
		    'filter'=>$model,
			'columns'=>array(
				array(
     			'name'=>'estado',
    	        'type'=>'image',
	            'value'=>'$data->estado=="0"? Yii::app()->baseUrl."/images/off.ico":Yii::app()->baseUrl."/images/on.ico"',

				),
				'nombre' => array('header'=> 'Trasplante','name' =>'nombre'),
				'tipo',
				'id_centro_medico' => array('header'=> 'Centro Medico','name' =>'id_centro_medico', 'value'=> 'centro_medico($data->id_centro_medico)'),
				'id_donacion' => array('header'=> 'Donante','name' =>'id_donacion', 'value'=> 'donante($data->id_donacion,$data->tipo)'),
				'id_paciente'=> array('header'=> 'Paciente','name' =>'id_paciente', 'value'=> 'paciente($data->id_paciente)'),
				'created',
				'modified',
				array(
					'class'=>'CButtonColumn',
					 'buttons'=>array(
        						'delete' => array('visible' => 'user_centro_medico($data->id_centro_medico)'),
        						'update' => array('visible' => 'user_centro_medico($data->id_centro_medico)'),
				      ),
			    ),
			))); 
			?>


</div>
</div>

<hr class="style-two ">