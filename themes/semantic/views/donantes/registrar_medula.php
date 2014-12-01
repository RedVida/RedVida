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
");
$paciente=Paciente::model()->find('id='.$_GET['id']);
?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
 Asignar Transplante a Paciente - <?php echo $paciente->nombre.' '.$paciente->apellido; ?></h1>
</div>
<hr class="style-two ">

<?php echo CHtml::link('&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php

$id_p =(string) $_GET['id'];
$length = (string)($_GET['name']);
$results = DonacionOrgano::model()->findAll(array('select'=>'rut_donante','condition'=>'estado=1 AND nombre='."'$length'"));
$values = array();
foreach($results as $r) $values[] = $r->rut_donante;
$criteria = new CDbCriteria();
$criteria->addInCondition('rut',$values,'OR');
$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));

?>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<div class="ui grid">
	<div class="one wide column"></div>
	<div class="fourteen wide column">
		<?php $this->widget('zii.widgets.grid.CGridView',array(
			'id'=>'donante-grid',
			'dataProvider'=>$dataProvider,
			'filter'=>$model,
			'columns'=>array(
				'nombres',
				'apellidos',
				'rut',
				array('header' => 'Medula en donacion ', 'value' => $var="'$length'"),
		         array(
		            'class' => 'CButtonColumn',
		            'template'=>'{Registrar}', // botones a mostrar
		            'buttons'=>array(
					'Registrar' => array( //botón para la acción nueva
				    'label'=>'Registrar Trasplante', // titulo del enlace del botón nuevo
				    'url'=>'Yii::app()->createUrl("/trasplante/trasplanteorgano&id_d=$data->id&id_p='.$id_p.'&or='.$length.'")', //url de la acción nueva
				    //'visible'=>'($data->estado==="DISPONIBLE")?true:false;'
				    ),
					),
		          ),
			),
		)); ?>
	</div>
</div>		