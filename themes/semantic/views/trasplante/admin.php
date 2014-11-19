<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */
$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	'Menu',
);

$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('index')),
	array('label'=>'Registrar Trasplante', 'url'=>array('create')),
	array('label'=>'Asignar Trasplante', 'url'=>array('paciente/asignar')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trasplante-grid').yiiGridView('update', {
		data: $(this).serialize()


	});
	return false;
});
");
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Administrar Trasplantes </h1>
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


<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'trasplante-form',
		'enableAjaxValidation'=>false,
	)); ?>





		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'trasplante-grid',
			'dataProvider'=>$model->search(),
		    'filter'=>$model,
			'columns'=>array(
				array( 
        	  	'id'=>'id',
              	'class'=>'CCheckBoxColumn',            
        		),
				'id',
				'id_donante',
				'id_paciente',
				'tipo_donacion',
				'id_donacion',
				'compatibilidad',
				/*
				'detalle',
				'grado_urgencia',
				'centro_medico',
				'created',
				'modified',
				*/

				array(
					'class'=>'CButtonColumn',
					'template'=>'{Ver}{Actualizar}{Eliminar}',
				    'buttons'=>array
				    (

 						'Ver' => arraY
 						(
					        'label'=>'Ver',
					        'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/24px/eye.png",
					        'url'=>'Yii::app()->createUrl("trasplante/view", array("id"=>$data->id))',
					    ),
					  
					   'Actualizar' => array
					   (
					        'label'=>'Actualizar',
					  		'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/24px/edit.png",
					        'url'=>'Yii::app()->createUrl("trasplante/update", array("id"=>$data->id))', 
					    ),
				        'Eliminar' => array
				        (   
				        	'label'=>'Eliminar',
				            'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/24px/delete.png",
				          	'url'=>'"#"',
				            'click'=>"js: function(){   





getId = $(this).parent().parent().children(':nth-child(2)').text();





										$('.small.modal')
										  .modal('setting', {
										    closable  : false,
										    onApprove : function() {





										            $.fn.yiiGridView.update('trasplante-grid', {
										                type:'POST',
										                
										                success:function(data) {

 
window.location.href = '".Yii::app()->request->baseUrl."' +'/index.php?r=/trasplante/delete&id=' + getId;									


									                    $.fn.yiiGridView.update('trasplante-grid');
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
			'selectionChanged'=>'userClicks',
			'afterAjaxUpdate'=>'userClicks',
			
			)); ?>


<div class="ui blue submit button disabled blockear" id="btn_1">Ver
<input type="hidden" name="Ver" value="Ver" method="POST" ></input>
</div>
<div class="ui blue submit button disabled blockear" id="btn_2">Actualizar
<input type="hidden" name="Actualizar" value="Actualizar" method="POST" ></input>
</div>
<div class="ui blue submit button disabled blockear" id="btn_3">Eliminar
<input type="hidden" name="Eliminar" value="Eliminar" method="POST" ></input>
</div>



<?php $this->endWidget(); ?>
</div>

<style type="text/css">
	
.blockear{

      pointer-events: none;
}

</style>



<script>



if (typeof target_id === 'undefined') {

$('input:checkbox').removeAttr('checked');

}


function userClicks(target_id){


var id_select = $('#trasplante-grid').yiiGridView.getSelection(target_id);

if(id_select>0){





			$('#btn_1').removeClass('blockear');
            $('#btn_1').removeClass('disabled');
            $('#btn_2').removeClass('blockear');
            $('#btn_2').removeClass('disabled');
    		$('#btn_3').removeClass('blockear');
            $('#btn_3').removeClass('disabled');





 $('#btn_1').click(function() {




window.location.href = '/redvida/index.php?r=/trasplante/view&id=' + id_select[0];									




 });





 $('#btn_2').click(function() {



window.location.href = '/redvida/index.php?r=/trasplante/update&id=' + id_select[0];									




 });



 $('#btn_3').click(function() {






										$('.small.modal')
										  .modal('setting', {
										    closable  : false,
										    onApprove : function() {





										            $.fn.yiiGridView.update('trasplante-grid', {
										                type:'POST',
										                
										                success:function(data) {

									                    $.fn.yiiGridView.update('trasplante-grid');
 
window.location.href = '/redvida/index.php?r=/trasplante/delete&id=' + id_select[0];									


										                }
											});
								  		  }
									  })
									  .modal('show')
						  	          ;




 });









}else{



			$('#btn_1').addClass('blockear');
            $('#btn_1').addClass('disabled');
			$('#btn_2').addClass('blockear');
            $('#btn_2').addClass('disabled');
    		$('#btn_3').addClass('blockear');
            $('#btn_3').addClass('disabled');


        
}

}








</script>


</div>
</div>

<hr class="style-two ">