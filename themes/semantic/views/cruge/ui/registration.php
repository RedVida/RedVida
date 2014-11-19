<br/>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Registrarse </h1>
</div>
<hr class="style-two ">
<div class="form">
<?php
	/*
		$model:  es una instancia que implementa a ICrugeStoredUser
	*/
?>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'registration-form',
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
)); ?>
<div class="ui form">
	<h6><?php echo ucfirst(CrugeTranslator::t("datos de la cuenta"));?></h6>
	<div class="fields">
	 	<div class="five wide field">
			<?php echo $form->labelEx($model,CrugeUtil::config()->availableAuthModes[0]) ?>
			<?php echo $form->textField($model,CrugeUtil::config()->availableAuthModes[0],array('class'=>'ui field')); ?>
			<div class="errors">
			<?php echo $form->error($model,CrugeUtil::config()->availableAuthModes[0],array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>
	<div class="fields">
	 	<div class="five wide field">
			<?php echo $form->labelEx($model,CrugeUtil::config()->availableAuthModes[1]) ?>
			<?php echo $form->textField($model,CrugeUtil::config()->availableAuthModes[1],array('class'=>'ui field')); ?>
			<div class="errors">
			<?php echo $form->error($model,CrugeUtil::config()->availableAuthModes[1],array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>
	
	<div class="fields">
		<?php echo $form->labelEx($model,'newPassword'); ?>
		<br/>
		<div class='five wide field'>
			<?php echo $form->textField($model,'newPassword'); ?>
		</div>
		<br/>
		<?php echo $form->error($model,'newPassword'); ?>
		<script>
			function fnSuccess(data){
				$('#CrugeStoredUser_newPassword').val(data);
			}
			function fnError(e){
				alert("error: "+e.responseText);
			}
		</script>
		
	</div>
</div>


<!-- inicio de campos extra definidos por el administrador del sistema -->
<?php 
	if(count($model->getFields()) > 0){
		echo "<div class='row form-group-vert'>";
		echo "<h6>".ucfirst(CrugeTranslator::t("perfil"))."</h6>";
		foreach($model->getFields() as $f){
			// aqui $f es una instancia que implementa a: ICrugeField
			echo "<div class='col'>";
			echo Yii::app()->user->um->getLabelField($f);
			echo Yii::app()->user->um->getInputField($model,$f);
			echo $form->error($model,$f->fieldname);
			echo "</div>";
		}
		echo "</div>";
	}
?>
<!-- fin de campos extra definidos por el administrador del sistema -->


<!-- inicio - terminos y condiciones -->
<?php
	if(Yii::app()->user->um->getDefaultSystem()->getn('registerusingterms') == 1)
	{
?>
<div class='form-group-vert'>
	<h6><?php echo ucfirst(CrugeTranslator::t("terminos y condiciones"));?></h6>
	<?php echo CHtml::textArea('terms'
		,Yii::app()->user->um->getDefaultSystem()->get('terms')
		,array('readonly'=>'readonly','rows'=>5,'cols'=>'80%')
		); ?>
	<div><span class='required'>*</span><?php echo CrugeTranslator::t(Yii::app()->user->um->getDefaultSystem()->get('registerusingtermslabel')); ?></div>
	<?php echo $form->checkBox($model,'terminosYCondiciones'); ?>
	<?php echo $form->error($model,'terminosYCondiciones'); ?>
</div>
<!-- fin - terminos y condiciones -->
<?php } ?>



<!-- inicio pide captcha -->
<?php if(Yii::app()->user->um->getDefaultSystem()->getn('registerusingcaptcha') == 1) { ?>
<div class='form-group-vert'>
	<h6><?php echo ucfirst(CrugeTranslator::t("codigo de seguridad"));?></h6>
	<div class="row">
		<div>
			<?php $this->widget('CCaptcha'); ?>
			<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint"><?php echo CrugeTranslator::t("por favor ingrese los caracteres o digitos que vea en la imagen");?></div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
</div>
<?php } ?>
<!-- fin pide captcha-->



<div class="row buttons">
	<?php echo CHtml::submitButton(CrugeTranslator::t('Registrarse'),array("class"=>"ui blue submit button")); ?>
</div>
<?php echo $form->errorSummary($model); ?>
<?php $this->endWidget(); ?>
</div>
