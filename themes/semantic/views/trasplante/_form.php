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

	<div class="fields">
		 	<div class="four wide field">
				<?php echo $form->labelEx($model,'rut_paciente'); ?>
				<?php echo $form->textField($model,'rut_paciente', array('value'=>$rut, 'readonly'=>$val, 'id'=>'rut', 'maxLength'=>12)); ?>
				<div class="errors">
				<?php echo $form->error($model,'rut_paciente',array('class' => 'ui small red pointing above ui label')); ?>
				</div>
			</div>
		</div>


	<?php
	if(isset($_GET['name']))
	{
		if($_GET['name']=='medula'){


	?>


	<div class="fields">
		 	<div class="four wide field">
				<?php echo $form->labelEx($model,'tipo_donacion'); ?>
				<?php echo $form->textField($model,'tipo_donacion', array('value'=>'Médula', 'readonly'=>true)); ?>
				<div class="errors">
				<?php echo $form->error($model,'tipo_donacion',array('class' => 'ui small red pointing above ui label')); ?>
				</div>
			</div>
		</div>
			<?php $donacion_medula=donacionMedula::model()->find('estado=true'); ?>
			<?php echo $form->hiddenField($model,'id_donacion',array('type'=>"hidden",'value'=> $donacion_medula['id'])); ?>

	<?php }	?>

	<?php
		if($_GET['name']=='organo'){
	?>

	<div class="fields">
		 	<div class="four wide field">
				<?php echo $form->labelEx($model,'tipo_donacion'); ?>
				<?php echo $form->textField($model,'tipo_donacion', array('value'=>'Órgano', 'readonly'=>true)); ?>
				<div class="errors">
				<?php echo $form->error($model,'tipo_donacion',array('class' => 'ui small red pointing above ui label')); ?>
				</div>
			</div>
		</div>


	   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'id_donacion'); ?>
			<?php echo $form->dropDownList($model,'id_donacion',CHtml::listData(DonacionOrgano::model()->findAll(),'id', 'id'),array('empty'=>'Seleccione Tipo de Donación','class'=>'ui selection dropdown'   )); ?>
			
			<div class="errors">
			<?php echo $form->error($model,'id_donacion',array('class' => 'ui small red pointing above ui label')); ?>
	
			</div>
		</div>
	</div>



	<?php 	}
			} ?>

    <div class="fields">
	 	<div class="three wide field">
			<?php echo $form->labelEx($model,'compatible (%)'); ?>
			<?php echo $form->dropDownList($model,'compatible',range(1,100),array('empty'=>'% Compatibilidad','class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'compatible',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

   <div class="fields">
	 	<div class="field">
			<?php echo $form->labelEx($model,'detalle'); ?>
			<?php echo $form->textArea($model,'detalle',array('maxlength'=>150,'rows'=>50,'cols'=>100, 'style'=>'resize:none; width: 300px; line-height: 10pt;' )); ?>
			<div class="errors">
			<?php echo $form->error($model,'detalle',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>


    <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'grado_urgencia'); ?>
			<?php echo $form->dropDownList($model,'grado_urgencia',array('Bajo'=>'Bajo','Medio'=>'Medio','ALto'=>'Alto'), array('empty'=>'Seleccione Grado de Urgencia','class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'grado_urgencia',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'centro_medico'); ?>
			<?php echo $form->dropDownList($model,'centro_medico', CHtml::listData(CentroMedico::model()->findAll(),'nombre', 'nombre'), array('empty' => 'Selecciona Centro Medico', 'class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'centro_medico',array('class' => 'ui small red pointing above ui label')); ?>
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



