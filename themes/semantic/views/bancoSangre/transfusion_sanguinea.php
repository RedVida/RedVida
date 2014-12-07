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
");
$paciente=Paciente::model()->find('id='.$_GET['id']);
$necesidad_s=NecesidadSangre::model()->find('id_paciente='.$paciente->id);

?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
 Asignar Transfusion a Paciente </h1>
</div>
<hr class="style-two ">

<?php echo CHtml::link('&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Busqueda Avanzada','#',array('class'=>'search-button')); ?>


<div class="ui grid">
	<div class="one wide column"></div>
	<div class="fourteen wide column">
<table class="ui definition table  ui green message">
    <tbody>
      <tr>
        <td class="one wide column ">Paciente:</td>
        <td><?php echo ucfirst($paciente->nombre).' '.ucfirst($paciente->apellido); ?></td>
      </tr>
       <tr>
        <td>Rut:</td>
        <td><?php echo $paciente->rut ?></td>
      </tr>
      <tr>	
        <td>T.Sangre:</td>
        <td><?php echo $paciente->tipo_sangre; ?></td>
      </tr>
      <tr>	
        <td>Cantidad:</td>
        <td><?php echo 'Se necesita <b>'.$necesidad_s->cantidad.'</b> unidades de transfusion aanguinea'; ?></td>
      </tr>

    </tbody>
  </table>
			    <div class="ui divider"></div>


</div>
</div>
<div class="search-form" style="display:none">


<?php

$id_p =(string) $_GET['id'];
$results =BancoSangre::model()->findAll(array('select'=>'id','condition'=>'cantidad >= 1 AND tipo='."'$paciente->tipo_sangre'"));
$values = array();
if($donante=NecesidadSangre::model()->find('id_paciente='.$paciente->id)){
	foreach($results as $r){
		$values[] = $r->id;
	} 
}
$criteria = new CDbCriteria();
$criteria->addInCondition('id',$values,'OR');

$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));

?>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

<?php $message='';if(!$results)
			 $message="
			<div class ='ui warning message'>
			<i class='warning sign icon'></i>
			<i class='close icon'></i>
			<b>No se han encontrado donaciones con este tipo de sangre = $paciente->tipo_sangre.
		    </div> ";?>
</div><!-- search-form -->

<div class="ui grid">
	<div class="one wide column"></div>
	<div class="fourteen wide column">
<div class="ui blue message"><h3><i class="doctor icon"></i><u>Banco De Sangre:</u> <i class="sort content descending icon"></i></h3></div>
		<?php $this->widget('zii.widgets.grid.CGridView',array(
			'id'=>'donante-grid',
			'dataProvider'=>$dataProvider,
			'filter'=>$model,
			'columns'=>array(
				'tipo'=> array('header'=>'Tipo De Sangre','name'=>'tipo'),
				'cantidad'=>array('header'=>'Cantidad / (unidad)','name'=>'cantidad'), 
		         array(
		            'class' => 'CButtonColumn',
		            'template'=>'{Registrar}', // botones a mostrar
		            'buttons'=>array(
					'Registrar' => array( //botón para la acción nueva
				    'label'=>'Registrar Transfusion', // titulo del enlace del botón nuevo
				    'url'=>'Yii::app()->createUrl("/transfusion/transfusionSangre&id=$data->id&id_p='.$id_p.'")', //url de la acción nueva
				    //'visible'=>'($data->estado==="DISPONIBLE")?true:false;'
				    ),
				 ),
		       ),
			),
			'emptyText' => $message,
		)); ?>
	</div>
</div>		