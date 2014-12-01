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
Registrar Trasplante </h1>
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

<?php echo CHtml::beginForm(); ?>

<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'paciente-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'selectableRows' => 1,
    'columns'=>array(
        'nombre',
        'rut',
        'grado_urgencia',
        'necesidad_trasplante',
        'necesidad_medula',
      		array(
					'class'=>'CButtonColumn',
					'template'=>'{Sangre}',
				    'buttons'=>array
				    (

 						'Sangre' => array
 						(
					    	'label'=>'Transfusión de Sangre',
					        'url'=>'Yii::app()->createUrl("/transfusion/create", array("id"=>$data->necesidad_trasplante))',
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