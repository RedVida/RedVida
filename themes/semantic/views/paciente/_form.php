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
<div class="ui form">

	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'nombre'); ?>
			<?php echo $form->textField($model,'nombre',array('size'=>20,'maxlength'=>20)); ?>
			<div class="errors">
			<?php echo $form->error($model,'nombre',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'apellido'); ?>
			<?php echo $form->textField($model,'apellido',array('size'=>20,'maxlength'=>20)); ?>
			<div class="errors">
			<?php echo $form->error($model,'apellido',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'rut'); ?>
			<?php echo $form->textField($model,'rut',array('size'=>12,'maxlength'=>12)); ?>
			<div class="errors">
			<?php echo $form->error($model,'rut',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

	<div class="four wide field">
	       <?php echo $form->labelEx($model,'Afiliacion Paciente'); ?>
	       <?php echo $form->dropDownList($model,'afiliacion', array('Fonasa'=>'Fonasa','Isapre'=>'Isapre'),array('empty' => 'Selecciona Afiliacion', 'class'=>'ui selection dropdown')); ?>
	</div>

	<div class="four wide field">
	       <?php echo $form->labelEx($model,'Grado de Urgencia'); ?>
	       <?php echo $form->dropDownList($model,'grado_urgencia', array('Urgente'=>'Urgente'),array('empty' => 'Selecciona Grado Urgencia', 'class'=>'ui selection dropdown')); ?>
	</div>

	<div class="four wide field">
	       <?php echo $form->labelEx($model,'Necesidad Transplante'); ?>
	       <?php echo $form->dropDownList($model,'necesidad_transplante',CHtml::listData(Organo::model()->findAll(),'idOrgano', 'nombreOrgano'), array('empty' => 'Selecciona Necesidad', 'class'=>'ui selection dropdown')); ?>
	</div>

	<div class="four wide field">
	       <?php echo $form->labelEx($model,'Tipo De Sangre'); ?>
	       <?php echo $form->dropDownList($model,'tipo_sangre',CHtml::listData(BancoSangre::model()->findAll(),'tipo', 'tipo'), array('empty' => 'Selecciona Tipo Sangre', 'class'=>'ui selection dropdown')); ?>
	</div>

   	<div class="four wirde field">
        <?php echo $form->labelEx($model,'Centro Medico'); ?>
		<?php echo $form->dropDownList($model,'id_centro_medico', CHtml::listData(CentroMedico::model()->findAll(),'id', 'nombre'), array('empty' => 'Selecciona Centro Medico', 'class'=>'ui selection dropdown')); ?>
	</div>

<br><br>
	<div class="row buttons">
	    <?php echo CHtml::submitButton(CrugeTranslator::t('Registrar'),array("class"=>"ui blue submit button")); ?>
	</div>


</div>
</div>
</div>




<?php $this->endWidget(); ?>

</div><!-- form -->