<script type="text/javascript">

	$(document).ready(function() {
			$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
  		});

    function successModal(){                                                      // Button - Modal Success 
        $("#alergias-form").submit();
    }
</script>

<div class="ui grid">
	<div class="one wide column"></div>
		<div class="twelve wide column">
	 		<div class="form">
				<?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'alergias-form',
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
							<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>128)); ?>
							<div class="errors">
							<?php echo $form->error($model,'nombre',array('class' => 'ui small red pointing above ui label')); ?>
							</div>
						</div>
					</div>
					<div class="fields">
					 	<div class="four wide field">
							<?php echo $form->labelEx($model,'descripcion'); ?>
							<?php echo $form->textArea($model,'descripcion', array('maxlength' => 300)); ?>
							<div class="errors">
							<?php echo $form->error($model,'descripcion',array('class' => 'ui small red pointing above ui label')); ?>
							</div>
						</div>
					</div>
					<br>
						<div class="ui blue submit button" id="ModalFunction"> <!-- Main.PHP -->
							Registrar
						</div>

				</div>
			</div>
		</div>

<?php $this->endWidget(); ?>

</div><!-- form -->