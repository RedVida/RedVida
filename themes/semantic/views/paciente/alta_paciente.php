<?php  $this->layout="//layouts/index";?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/jquery-ui.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/ui-autocomplete.min.js" type="text/javascript"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<?php $this->menu=array(
	array('label'=>'Listar paciente', 'url'=>array('index')),
	array('label'=>'Registrar paciente', 'url'=>array('create')),
); ?>

<script type="text/javascript">
	$(function(){
        $('#busquedaPaciente').autocomplete({
       		 source : function( request, response ) {
       		 $.ajax({
                    url: '<?php echo $this->createUrl('Paciente/PacienteLista'); ?>',
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
		                    response($.map(data, function(item) {
				                    
		                    		if(item.estado==1){
				                    return {				                    	
					                    label: item.nombre+" "+item.apellido,
					                    id: item.id,
					                }
									}
					                }))
                    		}
        			})
    		    },

			select: function(event, ui) {
                    $("#id_paciente").val(ui.item.id)
            }




    	 });
    });    
	$(document).ready(function() {
				$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
	  		});
	    function successModal(){                     									// Button - Modal Success 
	        $("#paciente-form").submit();
	    }
</script>


<br><br>
<div class="ui black ribbon label">
	<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Alta Paciente</h1>
</div>

<div class="paciente-form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'paciente-form',
		'enableAjaxValidation'=>false,
	)); ?>
	<?php Yii::app()->clientScript->registerScript(
				    'myHideEffect',
				    '$(".errors").animate({opacity: 1.0}, 5000).fadeOut("slow");',
				    CClientScript::POS_READY
				); ?>
	<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "ui warning message"));?>
	<div class="ui grid">
		<div class="one wide column"></div>
			<div class="twelve wide column">
				  <div class="ui form">
					 	<div class="fields">
						 	<div class="four wide field">
								<?php echo $form->labelEx($model,'nombre'); ?>
								<?php echo $form->textField($model,'nombre',array('id'=>'busquedaPaciente','placeholder'=>'Ingrese la Paciente a buscar...')); ?>
							</div>
						</div>
							<div class="fields">
							 	<div class="four wide field">
								<?php echo $form::hiddenField($model,'id',array('id'=>'id_paciente','readonly'=>true,'placeholder'=>'Id','class'=>'busquedaPaciente')); ?>
								</div>
							</div>
				

				</div>


						<br>
				     	<div class="row buttons">
					      	<div class="ui blue submit button" id="ModalFunction"> Registrar </div>
					 	</div>
					</div>
			</div>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->

	 <div class="ui small modal">
        <i class="close icon"></i>
          <div class="header">
            Verificar Operación
          </div>
        <div class="content">
          <i class="large loading icon"></i>
           Esta seguro que desea registrar estos datos?
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