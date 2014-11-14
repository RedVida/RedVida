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
	$val=false;
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	$model_donante = Paciente::model()->find("id=$id");
	$rut= $model_donante['rut'];
	$val=true;
	}

	?>


<div class="ui form">


 <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'id_donante'); ?>
			<?php echo $form->textField($model,'id_donante',array('size'=>30,'maxlength'=>12)); ?>
			<div class="errors">
			<?php echo $form->error($model,'id_donante',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>


   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'id_paciente'); ?>
			<?php echo $form->textField($model,'id_paciente', array('value'=>$id, 'readonly'=>$val, 'id'=>'rut', 'maxLength'=>12)); ?>
			<div class="errors">
			<?php echo $form->error($model,'id_paciente',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

 <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'Rut Paciente'); ?>
			<?php echo $form->textField($model,'id_paciente', array('value'=>$rut, 'disabled'=>true, 'id'=>'rut', 'maxLength'=>12)); ?>
			<div class="errors">
			<?php echo $form->error($model,'id_paciente',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>



  

   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'tipo_donacion'); ?>
			<?php echo $form->dropDownList($model,'tipo_donacion',array('Sangre'=>'Donación de Sangre','Medula'=>'Donación de Medula','Organo'=>'Donación de Organo'), array('empty'=>'Seleccione Tipo de Donación','class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'tipo_donacion',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>




   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'id_donacion'); ?>
			<?php echo $form->textField($model,'id_donacion',array('size'=>60,'maxlength'=>255)); ?>
			<div class="errors">
			<?php echo $form->error($model,'id_donacion',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>


    <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'compatibilidad'); ?>
			<?php echo $form->textField($model,'compatibilidad',array('size'=>60,'maxlength'=>255)); ?>
			<div class="errors">
			<?php echo $form->error($model,'compatibilidad',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'detalle'); ?>
			<?php echo $form->textField($model,'detalle',array('rows'=>6,'cols'=>50)); ?>
			<div class="errors">
			<?php echo $form->error($model,'detalle',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'grado_urgencia'); ?>
			<?php echo $form->textField($model,'grado_urgencia',array('size'=>60,'maxlength'=>255)); ?>
			<div class="errors">
			<?php echo $form->error($model,'grado_urgencia',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'centro_medico'); ?>
			<?php echo $form->textField($model,'centro_medico',array('size'=>60,'maxlength'=>255)); ?>
			<div class="errors">
			<?php echo $form->error($model,'centro_medico',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
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