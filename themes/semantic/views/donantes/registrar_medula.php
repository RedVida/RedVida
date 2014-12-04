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
 Asignar Transplante a Paciente</h1>
</div>
<hr class="style-two ">

<?php echo CHtml::link('&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;Busqueda Avanzada','#',array('class'=>'search-button')); ?>

<?php   $values = array();
		$donante=DonacionMedula::model()->find('id_paciente='.$_GET['id'].' AND estado=1');
		$paciente=Paciente::model()->find('id='.$_GET['id']);

	    if($donante)$values[]=$donante->id_donante; 
	     if(!$values){ $message="
										<div class ='ui warning message'>
											<i class='warning sign icon'></i>
											<i class='close icon'></i>
											<b>No se han encontrado Donante.
									    </div> ";
			
		}else{
							  $message="<div class ='ui warning message'>
											<i class='warning sign icon'></i>
											<i class='close icon'></i>
											<b>No se han encontrado resultados.<br/> 
											Este error puede deberse a que el paciente no necesita de un Trasplante. 
										</div>";
		}

$criteria = new CDbCriteria();
$criteria->addInCondition('id',$values,'OR');
$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));
?>
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
        <td>Medula:</td>
        <td><?php echo 'Se requiere trasplante de Medula M.Osea' ?> </td>
      </tr>
    </tbody>
  </table>
			     <div class="ui divider"></div>

</div>
</div>
<div class="search-form" style="display:none">
?>

<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>

<?php
 function organo_donado($val){
 		$array_organo = array();
	    $Criteria = new CDbCriteria();
	    $Criteria->condition = "id_donante =".$val; 
	    $organo= DonacionOrgano::model()->findAll($Criteria);
	    foreach ($organo as $valor) 
	    	{   if($valor->estado==1){
			    	$array_valor[]=ucfirst($valor->nombre);
				}
	    	}     
	    $array_organo = implode(" - ", $array_valor);
  		return $array_organo;
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
				array('header' => 'Organo en donacion ', 'value' => 'organo_donado($data->id)'),
		         array(
		            'class' => 'CButtonColumn',
		            'template'=>'{Registrar}', // botones a mostrar
		            'buttons'=>array(
					'Registrar' => array( //botón para la acción nueva
				    'label'=>'Registrar Trasplante', // titulo del enlace del botón nuevo
				    'url'=>'Yii::app()->createUrl("/trasplante/trasplantemedula&id_d=$data->id&id_p='.$_GET['id'].'")', //url de la acción nueva
				    //'visible'=>'($data->estado==="DISPONIBLE")?true:false;'
				    ),
					),
		          ),
			),
			'emptyText' => $message,
		)); ?>
	</div>
</div>		