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
Asignar Trasplante </h1>
</div>
<hr class="style-two ">


<div class="ui grid"><!--start grid-->

	<div class="one wide column">
	</div>

	<div class="twelve wide column">
		<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
		<div class="search-form" style="display:none">
		<?php $this->renderPartial('_search',array(
			'model'=>$model,
		)); ?>
		</div><!-- search-form -->
	</div>
</div>
<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>
	<div class="twelve wide column">


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
)); ?>





<div>
<?php echo ' '.CHtml::submitButton('Asignar', array('id'=>'btn_submit','name' => 'ApproveButton', 'class' => 'ui red submit button disabled')); ?>
</div>

<?php echo CHtml::endForm(); ?>

<script>

function userClicks(target_id){

var id_select = $('#paciente-grid').yiiGridView.getSelection(target_id);
//alert(id_select);

if(id_select>0){
            $('#btn_submit').removeClass('disabled');
}else{
            $('#btn_submit').addClass('disabled');
}

}



</script>


	</div>	
</div>

	
<hr class="style-two ">