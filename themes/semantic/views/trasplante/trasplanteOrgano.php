<script>
$(document).ready(function() {
			$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
  		});

    function successModal(){                                                      // Button - Modal Success 
        $("#trasplante-form").submit();
    }
</script>
<br>
<div class="ui black ribbon label">
				<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Registrar Trasplante De Organo</h1>
				</div>
				<hr class="style-two ">
<div class="ui grid">
	<div class="one wide column"></div>
	<div class="twelve wide column">
	 	<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'trasplante-form',
				'enableAjaxValidation'=>false,
			)); ?>
			<?php Yii::app()->clientScript->registerScript(
			    'myHideEffect',
			    '$(".errors").animate({opacity: 1.0}, 5000).fadeOut("slow");',
			    CClientScript::POS_READY
			); ?>
		        
			<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "ui warning message"));?>
			<?php $paciente=Paciente::model()->find('id='.$_GET['id_p']); ?>
			<?php $donante=Donantes::model()->find('id='.$_GET['id_d']); ?>
			<table class="ui definition table  ui green message">
			    <tbody>
			      <tr>
			        <td class="one wide column ">Paciente:</td>
			        <td><?php echo ucfirst($paciente->nombre).' '.ucfirst($paciente->apellido); ?></td>
			      </tr>
			       <tr>
			        <td>Rut:</td>
			        <td><?php echo $paciente->rut ?></td>
			      </tr>
			      <tr>	
			        <td>T.Sangre:</td>
			        <td><?php echo $paciente->tipo_sangre; ?></td>
			      </tr>
			    </tbody>
			 </table>
			  <div class="ui divider"></div>

			  <table class="ui definition table  ui blue message">
			    <tbody>
			      <tr>
			        <td class="one wide column ">Donante:</td>
			        <td><?php echo ucfirst($donante->nombres).' '.ucfirst($donante->apellidos); ?></td>
			      </tr>
			       <tr>
			        <td>Rut:</td>
			        <td><?php echo $donante->rut ?></td>
			      </tr>
			      <tr>	
			        <td>T.Sangre:</td>
			        <td><?php echo $donante->tipo_sangre; ?></td>
			      </tr>
			    </tbody>
			 </table>
			  <div class="ui divider"></div>
        
			<div class="ui form">
			<?php echo $form->hiddenField($model,'id_paciente',array('type'=>"hidden",'value'=> $_GET['id_p'])); ?>
       		<div class="four wirde field">
				    <?php echo $form->labelEx($model,'Organo Trasplantado'); ?>
					<?php echo $form->dropDownList($model,'id_donacion', CHtml::listData(DonacionOrgano::model()->findAll(array('condition'=>'estado=1 AND id_donante='.$_GET['id_d'])), 'id', 'nombre'), array('class'=>'ui selection dropdown','empty' => 'Seleccione Organo')) ?>
			</div>
		    <div class="fields">
			 	<div class="field">
					<?php echo $form->labelEx($model,'detalle del trasplante:'); ?>
					<?php echo $form->textArea($model,'detalle',array('maxlength'=>150,'rows'=>50,'cols'=>100, 'style'=>'resize:none; width: 300px; line-height: 10pt;' )); ?>
					<div class="errors">
					<?php echo $form->error($model,'detalle',array('class' => 'ui small red pointing above ui label')); ?>
					</div>
				</div>
			</div>
			<div class="four wirde field">
				        <?php echo $form->labelEx($model,'Centro Medico'); ?>
						<?php echo $form->dropDownList($model,'id_centro_medico', CHtml::listData(CentroMedico::model()->findAll(),'id', 'nombre'), array('empty' => 'Seleccione C.Medico', 'class'=>'ui selection dropdown')); ?>
			</div>
		</div>   
	    <br>
		<div class="ui blue submit button" id="ModalFunction"> <!-- Main.PHP -->
							Registrar
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

