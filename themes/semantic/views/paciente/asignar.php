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

	<div class="twelve wide column">
<?php function necesidad_medula($val){
 return $val <= 0 ? 'No necesita' : $val;
}?>

<?php function necesidad_trasplante($val){
 return $val == '' ? 'No necesita' : $val;
}?>
<?php echo CHtml::beginForm(); ?>

<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'paciente-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'selectableRows' => 1,
    'columns'=>array(
        'nombre',
        'apellido',
        'rut',
        'grado_urgencia',
        'tipo_sangre',
        'necesidad_trasplante' => array('header'=> 'Necesidad Trasplante','name' =>'necesidad_trasplante', 'value'=> 'necesidad_trasplante($data->necesidad_trasplante)'),
        'necesidad_medula' => array('header'=> 'Necesidad Medula (ml)','name' =>'necesidad_medula', 'value'=> 'necesidad_medula($data->necesidad_medula)'),
      		array(
					'class'=>'CButtonColumn',
					'template'=>'{Sangre}',
				    'buttons'=>array
				    (

 						'Sangre' => array
 						(
					    	'label'=>'Transfusión de Sangre',
					        'url'=>'Yii::app()->createUrl("/bancosangre/Transfusion_sanguinea&id=$data->id")',
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
					        'label'=>'Trasplante de Médula',
					        'url'=>'Yii::app()->createUrl("/donantes/registrar_medula&id=$data->id&name=$data->necesidad_medula")', 
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
					        'url'=>'Yii::app()->createUrl("/donantes/registrar_organo&id=$data->id&name=$data->necesidad_trasplante")', 
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