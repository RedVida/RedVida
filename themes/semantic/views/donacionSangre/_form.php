<script>
$(document).ready(function() {
			$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
  		});

    function successModal(){                                                      // Button - Modal Success 
        $("#donacion-sangre-form").submit();
    }
</script>
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
	<?php  if(isset($_GET['id_d'])){$donante=Donantes::model()->find('id='.$_GET['id_d']); }
	       else $donante=Donantes::model()->find('id='.$model->id_donante); ?>

<div class="ui form">
	<div class="fields">
	 	<div class="four wide field">
	 	<?php echo $form->labelEx($model,'rut_donante'); ?>
		<?php echo Chtml::textField('DonacionSangre[nombre_donante]',$donante->nombres.' '.$donante->apellidos, array('readonly'=>true, 'maxLength'=>12)); ?>
		<div class="errors">
			<?php echo $form->error($model,'rut_donante',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>
    <div class="fields">
	 	<div class="four wide field">
	 	<?php echo $form->labelEx($model,'rut_donante'); ?>
		<?php echo Chtml::textField('DonacionSangre[rut_donante]',$donante->rut, array('readonly'=>true, 'maxLength'=>12)); ?>
		<div class="errors">
			<?php echo $form->error($model,'rut_donante',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

    <div class="fields">
		<?php echo $form->hiddenField($model,'id_donante', array('value'=>$donante->id)); ?>
	</div>

 	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'tipo_sangre'); ?>
        <?php echo $form->textField($model,'tipo_sangre',array('value'=>$donante->tipo_sangre, 'readonly'=>true)); ?>
		<div class="errors">
			<?php echo $form->error($model,'tipo_sangre',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

	 <div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'cantidad / (unidad)'); ?>
		<?php echo $form->numberField($model,'cantidad', array('integerOnly'=>true, 'min'=>1,'max'=>100, 'allowNegative'=>false, 'allowBlank'=>false, 'placeholder'=>0)); ?>
		<div class="errors">
			<?php echo $form->error($model,'cantidad',array('class' => 'ui small red pointing above ui label')); ?>
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
</div>