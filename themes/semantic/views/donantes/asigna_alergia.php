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
    $(document).ready(function() {
			$('.ui.small.modal').modal('attach events','#ModalFunction','show');  //LLamada a Modal UI
  		});
    function successModal(){                     // Button - Modal Success 
        $("#tiene-Alergia-asigna_alergia-form").submit();
    }
</script>

<?php $donante=Donantes::model()->find('id='.$_GET["id"]);?>

<br><br>
<div class="ui black ribbon label">
	<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Registrar Alergia - <?php echo $donante->nombres." ".$donante->apellidos?> </h1>
</div>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'tiene-Alergia-asigna_alergia-form',
		'enableAjaxValidation'=>false,
	)); ?>
	<?php echo $form->errorSummary($model); ?>
	<div class="ui grid">
		<div class="one wide column"></div>
			<div class="twelve wide column">
				  <div class="ui form">
					 	<div class="fields">
						 	<div class="four wide field">
								<?php echo $form->labelEx($model,'nombre:'); ?>
								<?php echo $form->textField($model,'id',array('id'=>'busquedaAlergia','placeholder'=>'Ingrese la Alergia a buscar...')); ?>
								<div class="errors">
									<?php echo $form->error($model,'id_alergia',array('class' => 'ui small red pointing above ui label')); ?>
								</div>
							</div>
						</div><br>
				     	<div class="row buttons">
					      	<div class="ui blue submit button" id="ModalFunction"> Registrar </div>
					 	</div>
					</div>
			</div>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->