
<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

	<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'banco-sangre-form',
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
				<?php echo $form->labelEx($model,'tipo'); ?>
				<?php echo $form->textField($model,'tipo',array('size'=>3,'maxlength'=>3)); ?>
				<div class="errors">
				<?php echo $form->error($model,'tipo',array('class' => 'ui small red pointing above ui label')); ?>
				</div>
			</div>
		</div>

		<div class="fields">
		 	<div class="four wide field">
				<?php echo $form->labelEx($model,'cantidad'); ?>
				<?php echo $form->textField($model,'cantidad',array('size'=>20,'maxlength'=>20)); ?>
				<div class="errors">
				<?php echo $form->error($model,'cantidad',array('class' => 'ui small red pointing above ui label')); ?>
				</div>
			</div>
		</div>

    </div>
			
			<br>
			<div class="row buttons">
			    <?php echo CHtml::submitButton(CrugeTranslator::t('Registrar'),array("class"=>"ui blue submit button")); ?>
			</div>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div>
