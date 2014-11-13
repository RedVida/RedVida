<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/rut/jquery.Rut.js" type="text/javascript"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#rut').Rut({
            format_on: 'keyup',
            on_error: function() {
                alert('El valor ingresado no corresponde a un R.U.T válido.');
            }
        });
    })
    
</script>

<div class="ui grid">
	<div class="one wide column">
		
	</div>

	<div class="twelve wide column">
	

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
        
	<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "ui warning message"));?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


<div class="ui form">

	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'nombrePaciente'); ?>
		<?php echo $form->textField($model,'nombrePaciente',array('size'=>20,'maxlength'=>20)); ?>
		<div class="errors">
			<?php echo $form->error($model,'nombres',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'apellidoPaciente'); ?>
		<?php echo $form->textField($model,'apellidoPaciente',array('size'=>20,'maxlength'=>20)); ?>
		<div class="errors">
			<?php echo $form->error($model,'nombres',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'rutPaciente'); ?>
		<?php echo $form->textField($model,'rutPaciente',array('size'=>12,'maxlength'=>12)); ?>
		<div class="errors">
			<?php echo $form->error($model,'nombres',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'afiliacionPaciente'); ?>
		<?php echo $form->textField($model,'afiliacionPaciente',array('size'=>20,'maxlength'=>20)); ?>
		<div class="errors">
			<?php echo $form->error($model,'nombres',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'enfermedadPaciente'); ?>
		<?php echo $form->textField($model,'enfermedadPaciente',array('size'=>60,'maxlength'=>255)); ?>
		<div class="errors">
			<?php echo $form->error($model,'nombres',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'gradoUrgenciaPaciente'); ?>
		<?php echo $form->textField($model,'gradoUrgenciaPaciente',array('size'=>20,'maxlength'=>20)); ?>
		<div class="errors">
			<?php echo $form->error($model,'nombres',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

	<div class="four wide field">
	       <?php echo $form->labelEx($model,'Necesidad Transplante'); ?>
	       <?php echo $form->dropDownList($model,'necesidadTrasplantePaciente',CHtml::listData(Organo::model()->findAll(),'idOrgano', 'nombreOrgano'), array('empty' => 'Selecciona Transplante', 'class'=>'ui selection dropdown')); ?>
	</div>

	<div class="four wide field">
	       <?php echo $form->labelEx($model,'Tipo De Sangre'); ?>
	       <?php echo $form->dropDownList($model,'tipo_sangre',CHtml::listData(BancoSangre::model()->findAll(),'tipo', 'tipo'), array('empty' => 'Selecciona Tipo Sangre', 'class'=>'ui selection dropdown')); ?>
	</div>

   	<div class="four wirde field">
        <?php echo $form->labelEx($model,'Centro Medico'); ?>
		<?php echo $form->dropDownList($model,'id_centro_medico', CHtml::listData(CentroMedico::model()->findAll(),'id', 'nombre'), array('empty' => 'Selecciona Centro Medico', 'class'=>'ui selection dropdown')); ?>
	</div>

	<div class="row buttons">
	    <?php echo CHtml::submitButton(CrugeTranslator::t('Registrar'),array("class"=>"ui blue submit button")); ?>
	</div>
</div>
</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->