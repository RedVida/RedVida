<?php
$this->menu=array(
	array('label'=>'Listar Banco de Sangre', 'url'=>array('index')),
	array('label'=>'Registrar Banco de Sangre', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#banco-sangre-grid').yiiGridView('update', {
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
Administrar Banco de Sangre </h1>
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
		</div><!-- search-form -->
	
	</div>

</div>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'banco-sangre-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
			array( 
        	'id'=>'id',
            'class'=>'CCheckBoxColumn',            
        	),
			'id',
			'tipo',
			'cantidad',
			array(
					'class'=>'CButtonColumn',
					'template'=>'{Ver}{Actualizar}{Eliminar}',
				    'buttons'=>array
				    (

 						'Ver' => array
 						(
					    	'label'=>'Ver',
					        'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/yii/view.png",
					        'url'=>'Yii::app()->createUrl("bancosangre/view", array("id"=>$data->id))',
					    ),
						
						'Actualizar' => array
					   (
					        'label'=>'Actualizar',
					  		'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/yii/update.png",
					        'url'=>'Yii::app()->createUrl("bancosangre/update", array("id"=>$data->id))', 
					    ),
				
					    'Eliminar' => array
				        (   
				        	'label'=>'Eliminar',
				            'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/yii/delete.png",
				          	'url'=>'"#"',
				            'click'=>"js: function(){   
							getId = $(this).parent().parent().children(':nth-child(2)').text();
							 			$('.small.modal')
										  .modal('setting', {
										    closable  : false,
										    onApprove : function() {
										            $.fn.yiiGridView.update('banco-sangre-grid', {
										                type:'POST',
										                success:function(data) {
														window.location.href = '".Yii::app()->request->baseUrl."' +'/index.php?r=/bancosangre/delete&id=' + getId;									
									                    $.fn.yiiGridView.update('banco-sangre-grid');
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