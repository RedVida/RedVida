<script type="text/javascript">
   $(document).ready(function() {
			$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
  		});

    function successModal(){                                                      // Button - Modal Success 
        $("#donacion-organo-form").submit();
    }
    
</script>




<div class="ui grid">
	<div class="one wide column">
		
	</div>

	<div class="twelve wide column">





<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'donacion-organo-form',
	'enableAjaxValidation'=>false,
)); ?>

<?php Yii::app()->clientScript->registerScript(
    'myHideEffect',
    '$(".errors").animate({opacity: 1.0}, 5000).fadeOut("slow");',
    CClientScript::POS_READY
); ?>
        
	<?php echo $form->errorSummary($model, NULL, NULL, array("class" => "ui warning message"));?>
<?php if(isset($_GET['id_d']))$donante=Donantes::model()->find('id='.$_GET['id_d']); 
	       else $donante=Donantes::model()->find('id='.$model->id_donante); ?>

<div class="ui form">
	<div class="fields">
	 	<div class="four wide field">
	 	<?php echo $form->labelEx($model,'Nombre Donante'); ?>
		<?php echo Chtml::textField('DonacionORgano[nombre_donante]',$donante->nombres.' '.$donante->apellidos, array('readonly'=>true, 'maxLength'=>12)); ?>
		</div>
	</div>
    <div class="fields">
	 	<div class="four wide field">
	 	<?php echo $form->labelEx($model,'Rut Donante'); ?>
		<?php echo Chtml::textField('DonacionOrgano[rut_de_donante]',$donante->rut, array('readonly'=>true, 'maxLength'=>12)); ?>
	
		</div>
	</div>
	
    <div class="fields">
		<?php echo $form->hiddenField($model,'id_donante', array('value'=>$donante->id,'readonly'=>true)); ?>
	</div>


 	<div class="fields">
	 	<div class="four wide field">
		<?php echo $form->labelEx($model,'Organo En Donacion'); ?>

		<?php 
			  $donacion_relizada=DonacionOrgano::model()->findAll(array('select'=>'nombre','condition'=>'id_donante='.$donante->id));
			  $where_array= array();
			  foreach ($donacion_relizada as $dona) {
			  	$where_array[]='nombreOrgano != '."'$dona->nombre'";
			  }
			  if($donante->estado_vital)$where='nombreOrgano='."'Riñon'";
			  else $where = implode(" AND ",$where_array);

		?>
		<?php echo $form->dropDownList($model,'nombre', CHtml::listData(Organo::model()->findAll(array('condition'=> $where)),'nombreOrgano','nombreOrgano'), array('class'=>'ui selection dropdown','empty' => 'Seleccione Organo')); ?>
		<div class="errors">
			<?php echo $form->error($model,'nombre',array('class' => 'ui small red pointing above ui label')); ?>
		</div>
		</div>
	</div>

	
</div>


	<br><br>
	<div class="ui blue submit button" id="ModalFunction"> <!-- Main.PHP -->
	Registrar
</div>

</div>
<?php $this->endWidget(); ?>
</div><!-- grid -->
</div><!-- form -->