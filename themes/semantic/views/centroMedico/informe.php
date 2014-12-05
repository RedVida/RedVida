<?php  $this->layout="//layouts/index";?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/DateTimePicker.css">   
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/jquery-ui.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/ui-autocomplete.min.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/DateTimePicker.js" type="text/javascript"></script> 


<script type="text/javascript">
  	$(document).ready(function() {
			$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
  		});
      function successModal(){                                                      // Button - Modal Success 
        $("#informe-form").submit();
    }
</script>

<br><br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Generar Informe - Centros Medicos </h1>
</div>
<hr class="style-two ">
<div class="ui grid">
	<div class="one wide column"></div>
		<div class="twelve wide column">
	 		<div class="form">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'informe-form',
					'enableAjaxValidation'=>false,
				)); ?>
				<?php Yii::app()->clientScript->registerScript(
				    'myHideEffect',
				    '$(".errors").animate({opacity: 1.0}, 5000).fadeOut("slow");',
				    CClientScript::POS_READY
				); ?>
				<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "ui warning message"));?>
				<div class="ui form">
					<div class="fields">
						<div class="three wide field">
							<?php echo $form->labelEx($model,'Especialidad:'); ?>
							<?php echo $form->dropDownList($model,'especialidad',array('Cirugía'=>'Cirugía','Medicina General'=>'Medicina General','Salud Pública'=>'Salud Pública'), array('empty' => 'Seleccione Opcion', 'class'=>'ui selection dropdown')); ?>
						 </div>
                    </div>
                    <div class="fields">
	 					<div class="four wide field">
							<?php echo $form->labelEx($model,'gubernamental'); ?>
							<?php echo $form->dropDownList($model,'gubernamental',array('Si'=>'Si','No'=>'No'), array('empty' => 'Seleccione Opcion', 'class'=>'ui selection dropdown')); ?>
						</div>
					</div>
				</div>
		    </div>
		    <br>
						<div class="ui blue submit button" id="ModalFunction"> <!-- Main.PHP -->
							Filtrar
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