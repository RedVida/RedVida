<?php
/* @var $this DonanteController */
/* @var $model Donante */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Registrar Alergia',
);

$this->menu=array(
	array('label'=>'Listar Donante', 'url'=>array('index')),
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
"); ?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
 Asignar Transplante a Paciente</h1>
</div>
<hr class="style-two ">

<?php echo CHtml::link('&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Busqueda Avanzada','#',array('class'=>'search-button')); ?>

<?php  

$results =Donantes::model()->findAll(array('select'=>'id,sexo','condition'=>'voluntario = 1 AND estado_vital = 1'));
$values = array();
foreach($results as $r){

	if(!$alergia=TieneAlergia::model()->find('id_donante='.$r->id)){
		
		if($donacion_sangre =DonacionSangre::model()->find('id_donante='.$r->id.' order by id DESC')){

			$date1 = new DateTime(date('Y-m-d'));
			$date2 = new DateTime($donacion_sangre->created);
			$interval = $date1->diff($date2);
			$month = $interval->m;
			if($r->sexo == 'F' && $month >= 4 )$values[] = $r->id;
			if($r->sexo == 'M' && $month >= 3 )$values[] = $r->id;	

		}else{
	 		$values[] = $r->id;
		}
    }		
}
$message='';
if(!$values) $message="
						<div class ='ui warning message'>
							<i class='warning sign icon'></i>
							<i class='close icon'></i>
							<b>No se han encontrado Donantes de Sangre Aptos.<br><br>
							Para que un Donante pueda donar Sangre, debe cumplir los siguientes requisitos:<br/>
							<ul class='list'>
							<li> Tiene que ser donador Voluntario.</li>
							<li> El donador, no debe estar en Desceso.</li>
							<li> Si es Hombre, podrá donar cada 3 meses. </li>
							<li> Si es Mujer, podrá donar cada 4 meses. </li>
							<li> No debe poseer una alergia activa. </li>
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
		         array(
		            'class' => 'CButtonColumn',
		            'template'=>'{Registrar}', // botones a mostrar
		            'buttons'=>array(
					'Registrar' => array( //botón para la acción nueva
				    'label'=>'Registrar Donacion', // titulo del enlace del botón nuevo
				    'url'=>'Yii::app()->createUrl("/donacionSangre/create&id_d=$data->id")', //url de la acción nueva
				    //'visible'=>'($data->estado==="DISPONIBLE")?true:false;'
				    ),
					),
		          ),
			),
			'emptyText' => $message,
		)); ?>
	</div>
</div>		