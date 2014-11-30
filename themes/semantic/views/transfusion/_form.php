<div class="ui grid">

	<div class="one wide column">

	</div>

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

	<?php
	$id='';
	$rut='';
	$val=false;
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	$model_paciente = Paciente::model()->find("id=$id");
	$rut= $model_paciente['rut'];
	$val=true;
	?>
		<div class="ui orange ribbon label">
		<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
		Paciente: <?php echo $model_paciente['nombre'].' '.$model_paciente['apellido']; ?></h1>
		</div>
		<hr class="style-two ">
	<?php }	?>

	<div class="ui form">
	<?php
	if(isset($_GET['id'])){
	?>
	<div class="fields">
		 	<div class="four wide field">
				<?php echo $form->labelEx($model,'rut_paciente'); ?>
				<?php echo $form->textField($model,'rut_paciente', array('value'=>$rut, 'readonly'=>$val, 'id'=>'rut', 'maxLength'=>12)); ?>
				<div class="errors">
				<?php echo $form->error($model,'rut_paciente',array('class' => 'ui small red pointing above ui label')); ?>
				</div>
			</div>
		</div>
	<?php } ?>



    <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'tipo_sangre'); ?>
			<?php echo $form->dropDownList($model,'tipo_sangre',CHtml::listData(BancoSangre::model()->findAll(),'tipo', 'tipo'), array('empty' => 'Selecciona Tipo Sangre', 'class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'tipo_sangre',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

   <div class="fields">
	 	<div class="field">
			<?php echo $form->labelEx($model,'cantidad'); ?>
			<?php echo $form->numberField($model,'cantidad', array('integerOnly'=>true,'min'=>1,'max'=>100, 'allowNegative'=>false, 'allowBlank'=>false,'placeholder'=>'0')); ?>
			<div class="errors">
			<?php echo $form->error($model,'cantidad',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>


   </div>   
  
	<br><br>
	<div class="row buttons">
	    <?php 




	    echo CHtml::submitButton(CrugeTranslator::t('Registrar'),array("class"=>"ui blue submit button")); ?>
	</div>


	</div>

</div>




<?php $this->endWidget(); ?>

</div><!-- form -->


