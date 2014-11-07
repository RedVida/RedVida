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
	'id'=>'donantes-form',

	'enableAjaxValidation'=>false,
)); ?>
        
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombres'); ?>
		<?php echo $form->textField($model,'nombres',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'nombres'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellidos'); ?>
		<?php echo $form->textField($model,'apellidos',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'apellidos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rut'); ?>
		<?php echo $form->textField($model,'rut',array('size'=>30,'maxlength'=>12,'id'=>'rut')); ?>
		<?php echo $form->error($model,'rut'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'num_contacto'); ?>
		<?php echo $form->textField($model,'num_contacto',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'num_contacto'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>30,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>
        
        <div class="row">
        <?php
        echo $form->labelEx($model,'Tipo De Sangre');
        echo $form->radioButtonList($model,'tipo_sangre',
                array('A' => 'A',
                      'B' => 'B',
                      'AB' => 'AB',
                      'O' => 'O'),
                array(
                    'labelOptions'=> array('style' => 'display:inline'),
                      'separator' => '',
                      'template' => ' {label}:  {input} ',
                    )
         );
        ?>
    </div>
        
    <div class="row">
		<?php 
        echo $form->labelEx($model,'Centro Medico');
		echo $form->dropDownList($model,'id_centro_medico', 
		CHtml::listData(CentroMedico::model()->findAll(), 'id', 'nombre')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->