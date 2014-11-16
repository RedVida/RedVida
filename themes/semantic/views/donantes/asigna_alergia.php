<?php  $this->layout="//layouts/index";?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/jquery-ui.js" type="text/javascript"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/themes/semantic/packaged/javascript/ui-autocomplete.min.js" type="text/javascript"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

<?php $this->menu=array(
	array('label'=>'Listar Donante', 'url'=>array('index')),
	array('label'=>'Registrar Donante', 'url'=>array('create')),
); ?>

<script type="text/javascript">


	$(function(){
        $('#busquedaAlergia').autocomplete({
       		 source : function( request, response ) {
       		 $.ajax({
                    url: '<?php echo $this->createUrl('Alergias/AlergiaList'); ?>',
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

</script>
 <?php $donante=Donantes::model()->find('id='.$_GET["id"]);?>

<h2 class="ui header">Registrar Alergias - <?php echo $donante->nombres." ".$donante->apellidos?> </h2>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tiene-Alergia-asigna_alergia-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

  <div class="ui form">
 	<div class="fields">
	 	<div class="four wide field">
			<?php echo $form->labelEx($model,'nombre:'); ?>
			<?php echo $form->textField($model,'id',array('id'=>'busquedaAlergia','placeholder'=>'Ingrese la enfermedad a buscar...')); ?>
			<div class="errors">
			<?php echo $form->error($model,'nombre',array('class' => 'ui small red pointing above ui label')); ?>
			</div>
		</div>
	</div>
</div>
 <div class="ui small modal">
  <i class="close icon"></i>
  <div class="header">
    Header
  </div>
  <div class="content">
    <p>Esta Seguro y que pasa?</p>
  </div>
  <div class="actions">
    <div class="ui negative button">
      Cancel
    </div>
    <div class="ui positive right labeled icon button">
      Okay
      <i class="checkmark icon">
      </i>
    </div>
  </div>
</div>

	<br>
	<div class="row buttons">
	    <?php echo CHtml::submitButton(CrugeTranslator::t('Registrar'),array("class"=>"ui blue submit button","id"=>"terms")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->