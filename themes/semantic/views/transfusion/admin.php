	<?php
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Listar Transfusiones', 'url'=>array('index')),
	array('label'=>'Registrar Trasplante', 'url'=>array('/paciente/asignar')),
);
}
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#transfusion-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

     Yii::app()->clientScript->registerScript('helpers', '                                                           
          yii = {                                                                                                     
              urls: {                                                                                                 
                  saveEdits: '.CJSON::encode(Yii::app()->createUrl('edit/save')).',                                   
                  base: '.CJSON::encode(Yii::app()->baseUrl).'                                                        
              }                                                                                                       
          };                                                                                                          
      ');          


?>


<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Administrar Transfusiones </h1>
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
		$values = array();
		$centro_medico=CentroMedico::model()->find('id='.$this->getCM_user());
		$transfusion=Transfusion::model()->findAll();
        foreach($transfusion as $r){
        	if($donante=Donantes::model()->find('rut='."'$r->rut_paciente'")){
        		if($donante->id_centro_medico==$this->getCM_user())$values[]=$r->id;
        	}

        }

	     if(!$values)$message="
							<div class ='ui warning message'>
							<i class='warning sign icon'></i>
							<i class='close icon'></i>
							<b>No se han encontrado Transfusiones de Sangre en este Centro Medico (".$centro_medico->nombre.")<b/>
							</div> ";
			

$criteria = new CDbCriteria();
$criteria->addInCondition('id',$values,'OR');
$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'transfusion-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		'rut_paciente',
		'tipo_sangre',
		'cantidad',
		array(
				'name'=>'created',
				'value'=>'date("d/m/Y",strtotime($data->created))',
		),
		array(	
				'value'=>'date("H:m",strtotime($data->created))',
		),
        array(
					'class'=>'CButtonColumn',
			    ),
	   ),
	'emptyText'=>$message,
)); ?>


</div>
</div>

<hr class="style-two ">