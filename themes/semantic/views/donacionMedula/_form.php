<?php  $this->layout="//layouts/index";?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/jquery-ui.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/ui-autocomplete.min.js" type="text/javascript"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<?php $val = $_GET['id']; ?>
<script type="text/javascript">
	$(function(){
        $('#busquedaPaciente').autocomplete({
       		 source : function( request, response ) {
       		 $.ajax({
                    url: "<?php echo Yii::app()->createUrl("Paciente/PacienteList",array('id'=>$_GET['id'])); ?>",
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
		                    response($.map(data, function(item) {
				                    return {
					                    label: item.nombre,
					                    rut: item.rut,
					                    sangre : item.sangre,
					                    }
					                }))
                   }

        		})
    		},
    		select: function(event, ui) {
                    $("#rut_paciente").val(ui.item.rut),
                    $("#sangre_paciente").val(ui.item.sangre)
            }

    	 });
    }); 

      $(document).ready(function() {
			$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
  		});

    function successModal(){                                                      // Button - Modal Success 
        $("#donacion-medula-form").submit();
    }
      

</script>

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

	<div class="form">



<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'donacion-medula-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".errors").animate({opacity: 1.0}, 5000).fadeOut("slow");',
    CClientScript::POS_READY
); ?>
     
	<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "ui warning message"));?>
	<?php $donante=Donantes::model()->find('id='.$_GET['id']); ?>

<div class="ui definition table  ui green message">
<div>Atención! el <b>"Tipo de Sangre"</b> del <b>Paciente</b> debe ser la misma del <b>Donante</b>.</div>
</div>


<div class="ui form">
	 <div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'Nombre Donante'); ?>
		<?php echo Chtml::textField('DonacionMedula[nombre_donante]',$donante->nombres.' '.$donante->apellidos, array('readonly'=>true, 'id'=>'rut', 'maxLength'=>12)); ?>
		<div class="errors">
			<?php echo $form->error($model,'rut_donante',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>
    <div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'rut_donante'); ?>
		<?php echo Chtml::textField('DonacionMedula[rut_donante]',$donante->rut, array('readonly'=>true, 'id'=>'rut', 'maxLength'=>12)); ?>
		<div class="errors">
			<?php echo $form->error($model,'rut_donante',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>
	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'tipo_sangre'); ?>
		<?php echo $form->textField($model,'tipo_sangre', array('value'=>$donante->tipo_sangre, 'readonly'=>true, 'id'=>'rut', 'maxLength'=>12)); ?>
		<?php echo $form->error($model,'tipo_sangre'); ?>
	</div>
</div>

 	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'tipo_medula'); ?>
        <?php echo $form->textfield($model,'tipo_medula', array('value'=>'Osea', 'readonly'=>true)); ?>
		<div class="errors">
			<?php echo $form->error($model,'tipo_medula',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'Cantidad / (mls)'); ?>
		<?php echo $form->numberField($model,'cantidad', array('integerOnly'=>true, 'min'=>1,'max'=>100, 'allowNegative'=>false, 'allowBlank'=>false, 'placeholder'=>0)); ?>
		<div class="errors">
			<?php echo $form->error($model,'cantidad',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>
	<div class="ui divider"></div>
			<div class="fields">
						 	<div class="four wide field">
								<?php echo $form->labelEx($model,'nombre Paciente:'); ?>
								<?php echo $form->textField($model,'nombre',array('id'=>'busquedaPaciente','placeholder'=>'Ingrese nombre completo...')); ?>
								</div>
							</div>

			<div class="fields">
						 	<div class="four wide field">
								<?php echo $form->labelEx($model,'Rut:'); ?>
								<?php echo Chtml::textField('DonacionMedula[rut_paciente]','',array('id'=>'rut_paciente','readonly'=>true,'placeholder'=>'Rut','class'=>'busquedaPaciente')); ?>
								</div>
							</div>
							<div class="fields">
						 	<div class="four wide field">
								<?php echo $form->labelEx($model,'Tipo De Sangre:'); ?>
								<?php echo Chtml::textField('DonacionMedula[sangre_paciente]','',array('id'=>'sangre_paciente','readonly'=>true,'placeholder'=>'Tipo de sangre')); ?>
								</div>
					</div>
			</div>

</div>







	<br><br>
	<div class="ui blue submit button" id="ModalFunction"> <!-- Main.PHP -->
	Registrar
</div>

</div>

<?php $this->endWidget(); ?>
</div><!-- grid -->
</div><!-- form -->