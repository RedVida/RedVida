<?php
/* @var $this DonantesController */
/* @var $model Donantes */
$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Menu',
);

$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('/trasplante/index')),
	array('label'=>'Administrar Trasplante', 'url'=>array('/trasplante/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#paciente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Registrar Trasplante </h1>
</div>
<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

		<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div>

	</div>

</div>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

<div class="ui icon purple message">
  <i class="close icon"></i>
  <div class="header">
  Registrar un Trasplante
  </div>
  <p>Para registrar un trasplante, debes seleccionar un paciente de la tabla y presionar el boton Continuar, para continuar con el Registro</p>
</div>



<?php echo CHtml::beginForm(); ?>

<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'paciente-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'selectableRows' => 1,
    'columns'=>array(
        array( 
        	  'id'=>'id',
              'class'=>'CCheckBoxColumn',            
        ),
        'nombre',
        'rut',
        'grado_urgencia',
        ),
        'selectionChanged'=>'userClicks',
		'afterAjaxUpdate'=>'userClicks',
)); ?>

	<div>
	<?php echo ' '.CHtml::submitButton('Continuar', array('id'=>'btn_submit','name' => 'Asignar', 'class' => 'ui blue submit button disabled blockear')); ?>
	</div>

	<?php echo CHtml::endForm(); ?>

	</div>
</div>

<style type="text/css">

.blockear{ pointer-events: none; }

</style>

<script>

	if (typeof target_id === 'undefined') {
	$('input:checkbox').removeAttr('checked');
	}

	function userClicks(target_id){

		var id_select = $('#paciente-grid').yiiGridView.getSelection(target_id);

		if(id_select>0)
		{
		    $('#btn_submit').removeClass('disabled blockear');
		}
		else
		{
	        $('#btn_submit').addClass('disabled blockear');
		}

	}

	$('.message .close').on('click', function() {
	  $(this).closest('.message').fadeOut();
	});

</script>

<hr class="style-two ">