<?php
$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('/trasplante/index')),
	array('label'=>'Administrar Trasplante', 'url'=>array('/trasplante/admin')),
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

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Lista de pacientes - Registrar Trasplante </h1>
</div>
<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

		<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div>

	</div>

</div>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="fourteen wide column">
<?php function necesidad_medula($val){
 return $val <= 0 ? 'No necesita' : $val;
}?>



<?php
 function necesidad_trasplante_organo($val){

		$array_organo = array();

	    $Criteria = new CDbCriteria();
	    $Criteria->condition = "id_paciente = $val"; 
	    $organo = NecesidadOrgano::model()->findAll($Criteria);

	    if(!$organo)return 'No Presenta';

	    foreach ($organo as $valor) 
	    	{
			    $or=Organo::model()->find('idOrgano='.$valor->id_organo);
			    $array_organo[]=$or->nombreOrgano;
	    	}     
	    $results = implode("- ", $array_organo); 

  return $results;
}

 function necesidad_trasplante_medula($val){

		$array_organo = array();

	    $Criteria = new CDbCriteria();
	    $Criteria->condition = "id_paciente = $val"; 
	    $medula = NecesidadMedula::model()->findAll($Criteria);

	    if(!$medula)return 'No Presenta';

	    foreach ($medula as $valor) 
	    	{
			    $me=Medula::model()->find('idMedula='.$valor->id_medula);
			    $array_medula[]='M.'.$me->nombreMedula;
	    	}     
	    $results = implode("- ", $array_medula); 

  return $results;
}
?>


<?php echo CHtml::beginForm();
	$values = array();
	$pacientes=Paciente::model()->findAll('id_centro_medico='.$this->getCM_user());
	foreach($pacientes as $r)$values[]=$r->id;
	$criteria = new CDbCriteria();
	$criteria->addInCondition('id',$values,'OR');
	$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));
 ?>
   
<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'paciente-grid',
    'dataProvider'=>$dataProvider,
    'filter'=>$model,
    'selectableRows' => 1,
    'columns'=>array(
        'nombre',
        'apellido',
        'rut',
        'tipo_sangre',
        array('header'=> 'Necesidad Trasplante (Organo)','name' =>'sexo', 'value'=> 'necesidad_trasplante_organo($data->id)'),
        array('header'=> 'Necesidad Trasplante (Medula)','name' =>'sexo', 'value'=> 'necesidad_trasplante_medula($data->id)'),
      		array(
					'class'=>'CButtonColumn',
					'template'=>'{Sangre}',
				    'buttons'=>array
				    (

 						'Sangre' => array
 						(
					    	'label'=>'Transfusión de Sangre',
					        'url'=>'Yii::app()->createUrl("/bancoSangre/Transfusion_sanguinea&id=$data->id")',
					    ),	
					),
				),
      		    array(
					'class'=>'CButtonColumn',
					'template'=>'{Organo}',
				    'buttons'=>array
				    (
				
						'Organo' => array
					   (
					        'label'=>'Trasplante de Órgano',
					        'url'=>'Yii::app()->createUrl("/donantes/registrar_organo&id=$data->id")', 
					    ),


					
					),
				),
				array(
					'class'=>'CButtonColumn',
					'template'=>'{Medula}',
				    'buttons'=>array
				    (
				
						'Medula' => array
					   (
					        'label'=>'Trasplante de Medula',
					        'url'=>'Yii::app()->createUrl("/donantes/registrar_medula&id=$data->id")', 
					    ),


					
					),
				),


	),
          
)); ?>

	</div>
</div>
	
<hr class="style-two ">

<script type="text/javascript">
	



</script>