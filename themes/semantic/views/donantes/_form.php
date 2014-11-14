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
			<?php echo $form->labelEx($model,'nombres'); ?>
			<?php echo $form->textField($model,'nombres',array('size'=>30,'maxlength'=>128)); ?>
			<div class="errors">
			<?php echo $form->error($model,'nombres',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>
	<div class="fields">
		<div class="four wide field">
			<?php echo $form->labelEx($model,'apellidos'); ?>
			<?php echo $form->textField($model,'apellidos',array('size'=>30,'maxlength'=>128)); ?>
			<div class="errors">
			<?php echo $form->error($model,'apellidos',array('class' => 'ui small red pointing above ui label')); ?>
		    </div>
		</div>
	</div>
	<div class="fields">
		<div class="four wide field">
			<?php echo $form->labelEx($model,'rut'); ?>
			<?php echo $form->textField($model,'rut',array('size'=>30,'maxlength'=>12,'id'=>'rut')); ?>
			<div class="errors">
			<?php echo $form->error($model,'rut',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
    </div>
    <div class="fields">    
        <div class="four wide field">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>128)); ?>
			<div class="errors">
			<?php echo $form->error($model,'email',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
    </div>
    <div class="fields">     
        <div class="four wide field">
			<?php echo $form->labelEx($model,'num_contacto'); ?>
			<?php echo $form->textField($model,'num_contacto',array('size'=>30,'maxlength'=>128)); ?>
			<div class="errors">
			<?php echo $form->error($model,'num_contacto',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
    </div> 
    <div class="fields">    
        <div class="four wide field">
			<?php echo $form->labelEx($model,'direccion'); ?>
			<?php echo $form->textField($model,'direccion',array('size'=>30,'maxlength'=>128)); ?>
			<div class="errors">
			<?php echo $form->error($model,'direccion',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

	<div class="four wide field">
	       <?php echo $form->labelEx($model,'Tipo De Sangre'); ?>
	       <?php echo $form->dropDownList($model,'tipo_sangre',CHtml::listData(BancoSangre::model()->findAll(),'tipo', 'tipo'), array('empty' => 'Selecciona Tipo Sangre', 'class'=>'ui selection dropdown')); ?>
	</div>



   	<div class="four wirde field">
        <?php echo $form->labelEx($model,'Centro Medico'); ?>
		<?php echo $form->dropDownList($model,'id_centro_medico', CHtml::listData(CentroMedico::model()->findAll(),'id', 'nombre'), array('empty' => 'Selecciona Centro Medico', 'class'=>'ui selection dropdown')); ?>
	</div>
	
   </div>   


	<br><br>
	<div class="row buttons">
	    <?php echo CHtml::submitButton(CrugeTranslator::t('Registrar'),array("class"=>"ui blue submit button")); ?>
	</div>


	</div>

</div>




<?php $this->endWidget(); ?>

</div><!-- form -->