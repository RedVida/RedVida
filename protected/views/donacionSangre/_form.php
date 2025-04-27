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
	'id'=>'donacion-sangre-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>


	<?php
	$rut='';
	$val=false;
	if(isset($_GET['id']))
	{
	$id = $_GET['id'];
	$model_donante = Donantes::model()->find("id=$id");
	$rut= $model_donante['rut'];
	$val=true;
	}


	?>
	<div class="row">
		<?php echo $form->labelEx($model,'rut_donante'); ?>	
		<?php echo $form->textField($model,'rut_donante', array('value'=>$rut, 'readonly'=>$val, 'id'=>'rut', 'maxLength'=>12)); ?>
		<?php echo $form->error($model,'rut_donante'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'tipo_sangre'); ?>
		<?php echo $form->dropDownList($model,'tipo_sangre',CHtml::listData(BancoSangre::model()->findAll(),'tipo', 'tipo'),array('empty' => 'Selecciona Tipo Sangre')); ?>
		<?php echo $form->error($model,'tipo_sangre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->numberField($model,'cantidad', array('integerOnly'=>true,'min'=>1,'max'=>100, 'value'=>0, 'allowNegative'=>false, 'allowBlank'=>false)); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div>