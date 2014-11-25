<?php
/* @var $this DonantesController */
/* @var $model Donantes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<br>
<div class="ui grid">
	<div class="one wide column"></div>
		<div class="twelve wide column">
		    <div class="ui form">
			<div class="fields">     
		        <div class="four wide field">
				<?php echo $form->label($model,'nombres'); ?>
				<?php echo $form->textField($model,'nombres',array('size'=>60,'maxlength'=>128)); ?>
			</div>
				</div>
			<div class="fields">     
		        <div class="four wide field">
				<?php echo $form->label($model,'apellidos'); ?>
				<?php echo $form->textField($model,'apellidos',array('size'=>60,'maxlength'=>128)); ?>
			</div>
				</div>
			<div class="fields">     
		        <div class="four wide field">
				<?php echo $form->label($model,'rut'); ?>
				<?php echo $form->textField($model,'rut',array('size'=>12,'maxlength'=>12)); ?>
			</div>
				</div>
			<div class="fields">     
		        <div class="four wide field">
				<?php echo $form->label($model,'tipo_sangre'); ?>
				<?php echo $form->textField($model,'tipo_sangre',array('size'=>60,'maxlength'=>128)); ?>
			</div>
				</div>
			<div class="fields">     
		        <div class="four wide field">
				<?php echo $form->label($model,'email'); ?>
				<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
			</div>
				</div>
			<div class="fields">     
		        <div class="four wide field">
				<?php echo $form->label($model,'direccion'); ?>
				<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>128)); ?>
			</div>
				</div>
			<!--div class="fields">     
		        <div class="four wide field">
				<?php echo $form->label($model,'num_contacto'); ?>
				<?php echo $form->textField($model,'num_contacto'); ?>
				</div>
			</div-->
		       </div>
			<div class="row buttons">
			    <?php echo CHtml::submitButton(CrugeTranslator::t('login', "Buscar"),array("class"=>"ui blue submit button")); ?>
			</div>
		</div>
	</div>
  	<?php $this->endWidget(); ?>
</div><!-- search-form -->