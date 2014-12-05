<script>
$(document).ready(function() {
			$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
  		});

    function successModal(){                                                      // Button - Modal Success 
        $("#transfusion-form").submit();
    }
</script>
<br>
<div class="ui black ribbon label">
				<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Registrar Transfusion de sangre</h1>
				</div>
				<hr class="style-two ">
<div class="ui grid">
	<div class="one wide column"></div>
	<div class="twelve wide column">
	 	<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'transfusion-form',
				'enableAjaxValidation'=>false,
			)); ?>
			<?php Yii::app()->clientScript->registerScript(
			    'myHideEffect',
			    '$(".errors").animate({opacity: 1.0}, 5000).fadeOut("slow");',
			    CClientScript::POS_READY
			); ?>
		        
			<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "ui warning message"));?>
			<?php $paciente=Paciente::model()->find('id='.$_GET['id_p']); ?>

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
        
			<div class="ui form">
			<?php echo $form->hiddenField($model,'rut_paciente',array('type'=>"hidden",'value'=> $paciente->rut)); ?>
			<?php echo $form->hiddenField($model,'tipo_sangre',array('type'=>"hidden",'value'=> $paciente->tipo_sangre)); ?>
			<?php echo $form->hiddenField($model,'created', array('type'=>"hidden",'value'=> date("Y-m-d H:i:s"))); ?>
			<?php echo $form->hiddenField($model,'modified', array('type'=>"hidden",'value'=> date("Y-m-d H:i:s"))); ?>
       		<br>
       		<?php $bancoSangre=BancoSangre::model()->find('id='.$_GET['id']); ?>
		    <div class="fields">
			 	<div class="two wirde field">
					<?php echo $form->labelEx($model,'Cantidad a transferir:'); ?>
					<?php echo $form->dropDownList($model,'cantidad',array('(Unidad)'=> range(1,$bancoSangre->cantidad)),array('class'=>'ui selection dropdown'));?>
					&nbsp;Sangre / (Unidad)
					<div class="errors">
					<?php echo $form->error($model,'cantidad',array('class' => 'ui small red pointing above ui label')); ?>
					</div>
				</div>
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

