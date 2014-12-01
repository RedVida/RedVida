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



	<?php
	$val=false;
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	$model_donante = Donantes::model()->find("id=$id");
	$id_donante= $model_donante['id'];
	$rut= $model_donante['rut'];
	$val=true;
	}


	?>

<div class="ui form">
    <div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'rut_donante'); ?>
		<?php echo $form->textField($model,'rut_donante', array('value'=>$rut, 'readonly'=>$val, 'id'=>'rut', 'maxLength'=>12)); ?>
		<div class="errors">
			<?php echo $form->error($model,'rut_donante',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>
	
    <div class="fields">
		<?php echo $form->hiddenField($model,'id_donante', array('value'=>$id_donante, 'readonly'=>$val)); ?>
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

</div>








	<br><br>
	<div class="row buttons">
	    <?php echo CHtml::submitButton(CrugeTranslator::t("Registrar"),array("class"=>"ui blue submit button")); ?>
	</div>

</div>

<?php $this->endWidget(); ?>
</div><!-- grid -->
</div><!-- form -->