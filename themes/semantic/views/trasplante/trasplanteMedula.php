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
				<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Registrar Trasplante De Medula</h1>
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
		         <div class="ui green message">
				
					 Paciente:<b> <?php $paciente=Paciente::model()->find('id='.$_GET['id_p']);
					 echo ucfirst($paciente->nombre).' '.ucfirst($paciente->apellido); ?></b>
			     </div>
			     <div class="ui blue message">
					 Donador:<b> <?php $donante=Donantes::model()->find('id='.$_GET['id_d']);
					 echo ucfirst($donante->nombres).' '.ucfirst($donante->apellidos); ?></b>
			     </div>
			     <div class="ui orange message">
					 Cantidad de Medula Donada: <b> <?php echo ucfirst($_GET['me']);?> (ml) </b>
			     </div>
        
			<div class="ui form">
			<?php echo $form->hiddenField($model,'id_tipo_trasplante',array('type'=>"hidden",'value'=>'2')); ?>
			<?php echo $form->hiddenField($model,'id_paciente',array('type'=>"hidden",'value'=> $_GET['id_p'])); ?>
			<?php
			$length = (string)($_GET['me']);
			$donacion=DonacionMedula::model()->findAll(array('select'=>'id','condition'=>'rut_donante='."'$donante->rut'"));
		    echo $form->hiddenField($model,'id_donacion',array('type'=>"hidden",'value'=>$donacion[0]->id)); ?>
       		<br>
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

