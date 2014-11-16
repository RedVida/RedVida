
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/ui-autocomplete.min.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/typeahead.js" type="text/javascript"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
  <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript">

	$(function(){
        $('#busquedaEnfermedad').autocomplete({
       		 source : function( request, response ) {
       		 $.ajax({
                    url: '<?php echo $this->createUrl('Enfermedades/EnfermedadList'); ?>',
                    dataType: "json",
                    data: { term: request.term },
                    success: function(data) {
		                    response($.map(data, function(item) {
				                    return {
					                    label: item.nombre,
					                    }
					                }))
                    		    }
        					})
    		},
    });
    });
$('.ui.modal')
  .modal()
;
</script>
 <?php $donante=Donantes::model()->find('id='.$_GET["id"]);?>

<h2 class="ui header">Registrar enfermedad - <?php echo $donante->nombres." ".$donante->apellidos?> </h2>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tiene-enfermedad-asignaenfermedad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

  <div class="ui form">
 	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'nombre:'); ?>
			<?php echo $form->textField($model,'id',array('id'=>'busquedaEnfermedad','placeholder'=>'Ingrese la enfermedad a buscar...')); ?>
			<div class="errors">
			<?php echo $form->error($model,'id',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>
</div>

	<br>
	<div class="row buttons">
	    <?php echo CHtml::submitButton(CrugeTranslator::t('Registrar'),array("class"=>"ui blue submit button")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->