<script type="text/javascript">

	$(document).ready(function() {
			$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
  		});

    function successModal(){                                                      // Button - Modal Success 
        $("#centro-medico-form").submit();
    }
</script>
<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">
	

	<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'centro-medico-form',
		'enableAjaxValidation'=>false,
	)); ?>

	<?php Yii::app()->clientScript->registerScript(
	    'myHideEffect',
	    '$(".errors").animate({opacity: 1.0}, 5000).fadeOut("slow");',
	    CClientScript::POS_READY
	); ?>
        
	<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "ui warning message"));?>

<!--CENTRO-->
	<?php
	$id='';
	$rut='';
	$val=false;
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	$model_donante = Paciente::model()->find("id=$id");
	$rut= $model_donante['rut'];
	$val=true;


	?>



	<?php	}	?>


<!--CENTRO-->

<div class="ui form">

	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'nombre'); ?>
			<?php echo $form->textField($model,'nombre', array('size'=>60,'maxlength'=>128)); ?>
			<div class="errors">
			<?php echo $form->error($model,'nombre',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'direccion'); ?>
			<?php echo $form->textField($model,'direccion', array('size'=>60,'maxlength'=>128)); ?>
			<div class="errors">
			<?php echo $form->error($model,'direccion',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'contacto'); ?>
			<?php echo $form->textField($model,'contacto', array('size'=>60,'maxlength'=>128)); ?>
			<div class="errors">
			<?php echo $form->error($model,'contacto',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

    <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'director'); ?>
			<?php echo $form->textField($model,'director', array('size'=>60,'maxlength'=>128)); ?>
			<div class="errors">
			<?php echo $form->error($model,'director',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>
	
	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'especialidad'); ?>
			<?php echo $form->textField($model,'especialidad', array('size'=>60,'maxlength'=>128)); ?>
			<div class="errors">
			<?php echo $form->error($model,'especialidad',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>
	
	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'gubernamental'); ?>
			<?php echo $form->dropDownList($model,'gubernamental',array('Si'=>'Si','No'=>'No'), array('empty' => 'Seleccione opcion', 'class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'gubernamental',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>



</div>   
  
	<br><br>
	<div class="ui blue submit button" id="ModalFunction"> <!-- Main.PHP -->
							Registrar
						</div>


	</div>

</div>




<?php $this->endWidget(); ?>

</div><!-- form -->
