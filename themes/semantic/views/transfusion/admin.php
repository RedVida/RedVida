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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'transfusion-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
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
					'template'=>'{Ver}{Actualizar}{Eliminar}',
				    'buttons'=>array
				    (

 						'Ver' => arraY
 						(
					    	'label'=>'Ver',
					        'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/yii/view.png",
					        'url'=>'Yii::app()->createUrl("transfusion/view", array("id"=>$data->id))',
					    ),
					  
					   'Actualizar' => array
					   (
					        'label'=>'Actualizar',
					  		'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/yii/update.png",
					        'url'=>'Yii::app()->createUrl("transfusion/update", array("id"=>$data->id))', 
					    ),
				        'Eliminar' => array
				        (   
				        	'label'=>'Eliminar',
				            'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/yii/delete.png",
				          	'url'=>'"#"',
				            'click'=>"js: function(){   
							getId = $(this).parent().parent().children(':nth-child(1)').text();
							 			$('.small.modal')
										  .modal('setting', {
										    closable  : false,
										    onApprove : function() {
										            $.fn.yiiGridView.update('transfusion-grid', {
										                type:'POST',
										                success:function(data) {
														window.location.href = '".Yii::app()->request->baseUrl."' +'/index.php?r=/transfusion/delete&id=' + getId;									
									                    $.fn.yiiGridView.update('transfusion-grid');
										                }
											});
								  		  }
									  })
									  .modal('show')
						  	          ;

		  					}",

				        ),
				    ),
     		   ),
	),
)); ?>


</div>
</div>

<hr class="style-two ">