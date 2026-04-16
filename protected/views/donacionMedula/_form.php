<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/rut/jquery.Rut.js" type="text/javascript"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $('#rut').Rut({
            format_on: 'keyup',
            on_error: function() {
                alert('El valor ingresado no corresponde a un R.U.T válido.');
            }
        });
    })
    
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'donacion-medula-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php
	$rut='';
	$val=false;
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	$model_donante = Donantes::model()->find("id=$id");
	$rut= $model_donante['rut'];
	$tipo_sangre = $model_donante['tipo_sangre'];
	$val=true;
	}


	?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'rut_donante'); ?>
		<?php echo $form->textField($model,'rut_donante', array('value'=>$rut, 'readonly'=>$val, 'id'=>'rut', 'maxLength'=>12)); ?>
		<?php echo $form->error($model,'rut_donante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_sangre'); ?>
		<?php echo $form->textField($model,'tipo_sangre', array('value'=>$tipo_sangre, 'readonly'=>$val, 'id'=>'rut', 'maxLength'=>12)); ?>
		<?php echo $form->error($model,'tipo_sangre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_medula'); ?>
		<?php echo $form->dropDownList($model,'tipo_medula', array('Osea'=>'Osea','NULL'=>'NULL'),array('empty' => 'Selecciona Tipo') ); ?>
		<?php echo $form->error($model,'tipo_medula'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->