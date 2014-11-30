<?php
/* @var $this CentroMedicoController */
/* @var $model CentroMedico */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="ui grid">
	<div class="one wide column"></div>
		<div class="twelve wide column">
		    <div class="ui form">
				<div class="fields">     
		        	<div class="four wide field">
						<?php echo $form->label($model,'nombre'); ?>
						<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>128)); ?>
					</div>
				</div>
				<div class="fields">     
		        	<div class="four wide field">
						<?php echo $form->label($model,'direccion'); ?>
						<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>128)); ?>
					</div>
				</div>
				<div class="fields">     
		        	<div class="four wide field">
						<?php echo $form->label($model,'contacto'); ?>
						<?php echo $form->textField($model,'contacto',array('size'=>60,'maxlength'=>128)); ?>
					</div>
				</div>
				<div class="fields">     
		        	<div class="four wide field">
						<?php echo $form->label($model,'director'); ?>
						<?php echo $form->textField($model,'director',array('size'=>60,'maxlength'=>128)); ?>
					</div>
				</div>
				<div class="fields">     
		        	<div class="four wide field">
						<?php echo $form->label($model,'especialidad'); ?>
						<?php echo $form->textField($model,'especialidad',array('size'=>60,'maxlength'=>128)); ?>
					</div>
				</div>
				<div class="fields">     
		        	<div class="four wide field">
						<?php echo $form->label($model,'gubernamental'); ?>
						<?php echo $form->textField($model,'gubernamental',array('size'=>60,'maxlength'=>128)); ?>
					</div>
				</div>
					<div class="row buttons">
					    <?php echo CHtml::submitButton(CrugeTranslator::t('login', "Buscar"),array("class"=>"ui blue submit button")); ?>
					</div>
			</div>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->