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
	<?php	}	?>




<div class="ui form">
<?php
if(isset($_GET['id'])){
?>
<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'Rut Paciente'); ?>
			<?php echo $form->textField($model,'id_paciente', array('value'=>$rut, 'disabled'=>true, 'id'=>'rut', 'maxLength'=>12)); ?>
			<div class="errors">
			<?php echo $form->error($model,'id_paciente',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>
<?php } ?>

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
			<?php echo $form->labelEx($model,'tipo_donacion'); ?>
			<?php echo $form->dropDownList($model,'tipo_donacion',array('Sangre'=>'Donación de Sangre','Medula'=>'Donación de Medula','Organo'=>'Donación de Organo'), array('empty'=>'Seleccione Tipo de Donación','class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'tipo_donacion',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

<script type="text/javascript">
$('.ui.selection.dropdown')
  .dropdown()
;
</script>

<?php

?>

<!--DONACION 1-->
   <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'id_donacion'); ?>
        	<?php echo $form->dropDownList($model,'id_donacion',CHtml::listData(BancoSangre::model()->findAll(),'tipo', 'tipo'), array('empty' => 'Selecciona Tipo Sangre', 'class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'id_donacion',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>


<!--DONACION 2-->
	 <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'id_donacion'); ?>
			<?php echo $form->dropDownList($model,'id_donacion',array('Osea'=>'Osea'),array('empty'=>'Seleccione Tipo de Medula','class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'id_donacion',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>


<!--DONACION 3-->

	 <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'id_donacion'); ?>
        	<?php echo $form->dropDownList($model,'id_donacion',CHtml::listData(Organo::model()->findAll(),'nombreOrgano', 'nombreOrgano'), array('empty' => 'Selecciona Tipo Organo', 'class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'id_donacion',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>



    <div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'compatibilidad'); ?>
			<?php echo $form->dropDownList($model,'compatibilidad',array('Compatible'=>'Compatible','No Compatible'=>'No Compatible'), array('empty'=>'Seleccione Compatibilidad','class'=>'ui selection dropdown')); ?>
			<div class="errors">
			<?php echo $form->error($model,'compatibilidad',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>

   <div class="fields">
	 	<div class="field">
			<?php echo $form->labelEx($model,'detalle'); ?>
			<?php echo $form->textArea($model,'detalle',array('maxlength'=>150,'rows'=>50,'cols'=>100, 'style'=>'resize:none; width: 300px')); ?>
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
	    <?php echo CHtml::submitButton(CrugeTranslator::t('Registrar'),array("class"=>"ui blue submit button")); ?>
	</div>


	</div>

</div>




<?php $this->endWidget(); ?>

</div><!-- form -->