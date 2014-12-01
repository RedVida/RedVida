
<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

	<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'donacion-sangre-form',
		'enableAjaxValidation'=>false,
	)); ?>


	<?php Yii::app()->clientScript->registerScript(
	    'myHideEffect',
	    '$(".errors").animate({opacity: 1.0}, 5000).fadeOut("slow");',
	    CClientScript::POS_READY
	); ?>
        
	<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "ui warning message"));?>

	<?php
	$rut='';
	$val=false;
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	$model_donante = Donantes::model()->find("id=$id");
	$rut= $model_donante['rut'];
	$id_donante= $model_donante['id'];
	$tipo_sangre= $model_donante['tipo_sangre'];
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
		<?php echo $form->labelEx($model,'tipo_sangre'); ?>
        <?php echo $form->textField($model,'tipo_sangre',array('value'=>$tipo_sangre, 'readonly'=>$val)); ?>
		<div class="errors">
			<?php echo $form->error($model,'tipo_sangre',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

	 <div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->numberField($model,'cantidad', array('integerOnly'=>true, 'min'=>1,'max'=>100, 'allowNegative'=>false, 'allowBlank'=>false, 'placeholder'=>0)); ?>
		<div class="errors">
			<?php echo $form->error($model,'cantidad',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>
</div>

<br><br>

	<div class="row buttons">
	    <?php echo CHtml::submitButton(CrugeTranslator::t("Registrar"),array("class"=>"ui blue submit button")); ?>
	</div>


	</div>
</div>
<?php $this->endWidget(); ?>
</div>