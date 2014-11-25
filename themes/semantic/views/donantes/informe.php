<?php  $this->layout="//layouts/index";?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/css/DateTimePicker.css">   
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/jquery-ui.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/ui-autocomplete.min.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/DateTimePicker.js" type="text/javascript"></script> 


<script type="text/javascript">
	$(function(){
        $('#busquedaAlergia').autocomplete({
       		 source : function( request, response ) {
       		 $.ajax({
                    url: '<?php echo $this->createUrl('Alergias/AlergiaList'); ?>',
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
		                    response($.map(data, function(item) {
				                    return {
					                    label: item.nombre,
					                    }
					                }))
                    		}
        			})
    		},
        });
    });
    $(function(){
        $('#busquedaEnfermedad').autocomplete({
       		 source : function( request, response ) {
       		 $.ajax({
                    url: '<?php echo $this->createUrl('Enfermedades/EnfermedadList'); ?>',
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
		                    response($.map(data, function(item) {
				                    return {
					                    label: item.nombre,
					                    }
					                }))
                    		}
        			})
    		    },
    	 });
    });
  	$(document).ready(function() {
			$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
  		});

   
     $(document).ready(function(){
              $("#dtBox").DateTimePicker({
              	dateTimeFormat:"yyyy-MM-dd HH:mm:ss",
              	shortDayNames: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
              	fullDayNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
              	fullMonthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
              	titleContentDateTime: "Seleccionar Hora y Fecha",
              	setButtonContent: "Agregar",
              	clearButtonContent: "Borrar",
              	
              });
          });
      function successModal(){                                                      // Button - Modal Success 
        $("#informe-form").submit();
    }
</script>

<br><br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Generar Informe - Donante </h1>
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
					<div class="ui small headerr"><b>* Fecha de ingreso</b></div>
					<div class="fields">
					<div class="three wide field">
						<?php echo $form->labelEx($model,'Desde:'); ?>
						<?php echo $form->textField($model,'fecha_ingreso',array('data-field'=>'datetime','placeholder'=>'Fecha de inicio')); ?>
					 </div>
					 <div class="three wide field">
						<?php echo $form->labelEx($model,'Hasta:'); ?>
						<?php echo $form->textField($model,'direccion',array('data-field'=>'datetime','placeholder'=>'Fecha termino')); ?>
					 </div>
 					<div id="dtBox"></div>
                    </div>
					<div class="four wide field">
					       <?php echo $form->labelEx($model,'Tipo De Sangre:'); ?>
					       <?php echo $form->dropDownList($model,'tipo_sangre',CHtml::listData(BancoSangre::model()->findAll(),'tipo', 'tipo'), array('empty' => 'Seleccione Tipo Sangre', 'class'=>'ui selection dropdown')); ?>
					
					</div>
				   	<div class="four wirde field">
				        <?php echo $form->labelEx($model,'Centro Medico:'); ?>
						<?php echo $form->dropDownList($model,'id_centro_medico', CHtml::listData(CentroMedico::model()->findAll(),'id', 'nombre'), array('empty' => 'Seleccione Centro Medico', 'class'=>'ui selection dropdown')); ?>
					</div>
					<div class="fields">
						<div class="four wide field">
								<?php echo $form->labelEx($model,'Alergia:'); ?>
								<?php echo $form->textField($model,'id',array('id'=>'busquedaAlergia','placeholder'=>'Ingrese la Alergia a buscar...')); ?>
						</div>
					</div>
					<div class="fields">
						 	<div class="four wide field">
								<?php echo $form->labelEx($model,'Enfermedad:'); ?>
								<?php echo $form->textField($model,'nombres',array('id'=>'busquedaEnfermedad','placeholder'=>'Ingrese la Enfermedad a buscar...')); ?>
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
<?php $this->endWidget(); ?>

	</div><!-- form -->