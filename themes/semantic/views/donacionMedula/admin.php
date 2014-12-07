<?php
$this->menu=array(
	array('label'=>'Listar Donación de Médula', 'url'=>array('index')),
	array('label'=>'Registrar Donación', 'url'=>array('donantes/donar')),
	array('label'=>'Generar Informe', 'url'=>array('informe')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#donacion-medula-grid').yiiGridView('update', {
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

 <div class="ui small modal">
        <i class="close icon"></i>
          <div class="header">
            Verificar Operación
          </div>
        <div class="content">
          <i class="large loading icon"></i>
           Esta seguro que desea eiminar estos datos?
        </div>
      <div class="actions">
        <div class="ui negative button" data-value="Cancel" name="Cancel">
          No
        </div>
        <div class="ui positive right labeled icon button"  date-value="Success" onclick="successModal();" name="Success">
          Si
          <i class="checkmark icon"></i>
        </div>
      </div>
  </div>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Administrar Donación de Médula </h1>
</div>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">
		
		<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div>
	
	</div>

</div>

<?php 

$centro_medico=CentroMedico::model()->find('id='.$this->getCM_user());
$donacion_medula=DonacionMedula::model()->findAll();
$values= array();
foreach ($donacion_medula as $r){
	if($this->getCM_Donador($r->id_donante))$values[]=$r->id;
} 
$criteria = new CDbCriteria();
$criteria->addInCondition('id',$values,'OR');
$dataProvider=new CActiveDataProvider($model, array('criteria'=>$criteria));

 if(!$values)$message="
						<div class ='ui warning message'>
							<i class='warning sign icon'></i>
							<i class='close icon'></i>
							<b>No se han encontrado Donaciones De Medula en este Centro Medico (".$centro_medico->nombre.").
						</div> ";

?>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'donacion-medula-grid',
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
		array( 
        	'id'=>'id',
            'class'=>'CCheckBoxColumn',            
        	),
		'id',
		'nombre',
		array(
			'name'=>'created',
			'value'=>'date("d/m/y",strtotime($data->created))',
		),
		array(	
			'value'=>'date("h:i",strtotime($data->created))',
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
