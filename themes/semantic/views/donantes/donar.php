<?php
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Administrar Donaciones de Sangre', 'url'=>array('/donacionSangre/admin')),
	array('label'=>'Administrar Donaciones de Médula', 'url'=>array('/donacionMedula/admin')),
	array('label'=>'Administrar Donaciones de Órgano', 'url'=>array('/donacionOrgano/admin')),
);
}
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#donantes-grid').yiiGridView('update', {
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
Registrar Donación </h1>
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

<hr class="style-two ">

<div class="ui grid">



	<div class="one wide column">

	</div>

	<div class="twelve wide column">

	<div class="ui icon purple message">
	  <i class="close icon"></i>
	  <div class="header">
	  Registrar un Donación
	  </div>
	  <p>Para registrar una donación, debes seleccionar un donante de la siguiente tabla y presionar el botón correspondiente a la donación</p>
	</div>

<div class="form">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'donantes-form',
					'enableAjaxValidation'=>false,
				)); ?>
				<?php Yii::app()->clientScript->registerScript(
				    'myHideEffect',
				    '$(".errors").animate({opacity: 1.0}, 5000).fadeOut("slow");',
				    CClientScript::POS_READY
				); ?>
				<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "ui negative message"));?>

				
	</div>
	<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'donantes-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'selectableRows' => 1,
	    'columns'=>array(
	        array( 
	        	  'id'=>'id',
	              'class'=>'CCheckBoxColumn',            
	        ),
	        'nombres',
	        'apellidos',
	        'rut',
	    	'tipo_sangre',
			'email',
			'direccion',
	        ),
	        'selectionChanged'=>'userClicks',
			'afterAjaxUpdate'=>'userClicks',

	)); ?>
<?php $this->endWidget(); ?>

	<div class="ui blue submit button disabled blockear" id="btn_1">Donar Sangre
	<input type="hidden" name="Sangre" value="Sange" method="POST" ></input>
	</div>
	<div class="ui blue submit button disabled blockear" id="btn_2">Donar Médula
	<input type="hidden" name="Medula" value="Medula" method="POST" ></input>
	</div>
	<div class="ui blue submit button disabled blockear" id="btn_3">Donar Órgano
	<input type="hidden" name="Organo" value="Organo" method="POST" ></input>
	</div>

	</div>
</div>

<style type="text/css">

.blockear{ pointer-events: none; }

</style>

<script>

	if (typeof target_id === 'undefined') {

	$('input:checkbox').removeAttr('checked');

	}


function userClicks(target_id){

var id_select = $('#donantes-grid').yiiGridView.getSelection(target_id);


if(id_select>0){

        $('#btn_1').removeClass('disabled blockear');
        $('#btn_2').removeClass('disabled blockear');
        $('#btn_3').removeClass('disabled blockear');


		$('#btn_1').click(function() {
		window.location.href = yii.urls.base + '/index.php?r=/donantes/donacionSangre&id=' + id_select[0];									
		});
		$('#btn_2').click(function() {
		window.location.href = yii.urls.base + '/index.php?r=/donacionMedula/create&id=' + id_select[0];									
		});
		$('#btn_3').click(function() {
		window.location.href = yii.urls.base + '/index.php?r=/donacionOrgano/create&id=' + id_select[0];									
		});


}else{
            
        $('#btn_1').addClass('disabled blockear');
        $('#btn_2').addClass('disabled blockear');
        $('#btn_3').addClass('disabled blockear');
}

}

	$('.message .close').on('click', function() {
	   $(this).closest('.message').fadeOut();
	});

</script>

	
<hr class="style-two ">
