<?php
/* @var $this DonanteController */
/* @var $model Donante */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Registrar Alergia',
);
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Listar Donante', 'url'=>array('index')),
	array('label'=>'Registrar Donante', 'url'=>array('create')),
);
}
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
"); ?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
 Asignar Transplante a Paciente</h1>
</div>
<hr class="style-two ">

<?php echo CHtml::link('&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Busqueda Avanzada','#',array('class'=>'search-button')); ?>

<?php  

$results =Donantes::model()->findAll(array('select'=>'id,estado_vital','condition'=>'voluntario = 1'));

$values = array();
foreach($results as $r){
	$donacion_anterior =DonacionOrgano::model()->findAll(array('select'=>'id_donante,nombre','condition'=>'id_donante='.$r->id));

	if($donacion_anterior){
		
		if($r->estado_vital && count($donacion_anterior) < 1 )$values[] = $r->id;
		if(!$r->estado_vital && count($donacion_anterior) < 9 )$values[] = $r->id;

	}else{
		$values[] = $r->id;
	}
	
} 

$message='';
if(!$values) $message="
						<div class ='ui warning message'>
							<i class='warning sign icon'></i>
							<i class='close icon'></i>
							<b>No se han encontrado Donantes de Organo Aptos.<br><br>
							Para que un Donante pueda donar Organos, debe cumplir los siguientes requisitos:<br/>
							<ul class='list'>
							<li> Si es donante Voluntario, sólo podrá donar el organo Riñon</li>
							<li> Si el donante está en Desceso, se podran donar aquellos Organos que se estimen convenientes </li>
							</ul>
						</div> ";

$criteria = new CDbCriteria();
$criteria->addInCondition('id',$values,'OR');
$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));

?>
<div class="ui grid">
	<div class="one wide column"></div>
	<div class="fourteen wide column">


</div>
</div>
<div class="search-form" style="display:none">
?>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
<?php 

function organo_donado($val){
$donante=Donantes::model()->find('id='.$val);

if($donante->estado_vital) return 'Solo Riñon';
else return 'Ninguna';
}

function donaciones_anteriores($val){
$results =donacionOrgano::model()->findAll(array('select'=>'id_donante,nombre','condition'=>'id_donante='.$val));
$values = array();
foreach ($results as $re){
	$values[]=$re->nombre;
}
$organo_s=implode(" - ",$values);

if($values) return $organo_s;
else return 'Ninguna';
}

?>

</div><!-- search-form -->
<div class="ui grid">
	<div class="one wide column"></div>
	<div class="fourteen wide column">
		<div class="ui blue message"><h3><i class="doctor icon"></i><u>Donantes Aptos:</u> <i class="sort content descending icon"></i></h3></div>
		<?php $this->widget('zii.widgets.grid.CGridView',array(
			'id'=>'donante-grid',
			'dataProvider'=>$dataProvider,
			'filter'=>$model,
			'columns'=>array(
				'nombres',
				'apellidos',
				'rut',
				'tipo_sangre',
				'edad',
				'sexo',
				array('header' => 'Restriccion De Donacion ', 'value' => 'organo_donado($data->id)'),
				array('header' => 'Donaciones Anteriores ', 'value' => 'donaciones_anteriores($data->id)'),
		         array(
		            'class' => 'CButtonColumn',
		            'template'=>'{Registrar}', // botones a mostrar
		            'buttons'=>array(
					'Registrar' => array( //botón para la acción nueva
				    'label'=>'Registrar Donacion', // titulo del enlace del botón nuevo
				    'url'=>'Yii::app()->createUrl("/donacionOrgano/create&id_d=$data->id")', //url de la acción nueva
				    //'visible'=>'($data->estado==="DISPONIBLE")?true:false;'
				    ),
					),
		          ),
			),
			'emptyText' => $message,
		)); ?>
	</div>
</div>		