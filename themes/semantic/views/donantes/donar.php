<?php
/* @var $this DonantesController */
/* @var $model Donantes */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	'Menu',
);

$this->menu=array(
	array('label'=>'Lista Donantes', 'url'=>array('index')),
	array('label'=>'Crear Donantes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#donantes-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Menu Donar</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'donantes-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',,
		'nombres',
		'apellidos',
		'rut',
		/*
		'tipo_sangre',
		'email',
		'centro_medico',
		'direccion',
		'enfermedades',
		'alergias',
		'num_contacto',
		*/
		'link'=>array(
            'header'=>'',
            'type'=>'raw',
            'value'=> 'CHtml::button("Sangre",array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("donacionSangre/create",array("id"=>$data->id))."\'"))',
        ),   
	
		'link-2'=>array(
            'header'=>'',
            'type'=>'raw',
            'value'=> 'CHtml::button("Medula",array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("donacionMedula/create",array("id"=>$data->id))."\'"))',
        ),   
	
		'link-3'=>array(
            'header'=>'',
            'type'=>'raw',
            'value'=> 'CHtml::button("Organo",array("onclick"=>"document.location.href=\'".Yii::app()->controller->createUrl("donacionOrgano/create",array("id"=>$data->id))."\'"))',
        ),   
	

	),

)); 


?>





<table class="ui table segment">
  <thead>
    <tr><th>ALO</th>
    <th>Status</th>
    <th>Notes</th>
  </tr></thead>
  <tbody>
    <tr>
      <td>John</td>
      <td>Approved</td>
      <td>None</td>
    </tr>
    <tr>
      <td>Jamie</td>
      <td>Approved</td>
      <td>Requires call</td>
    </tr>
    <tr>
      <td>Jill</td>
      <td>Denied</td>
      <td>None</td>
    </tr>
  </tbody>
  <tfoot>
    <tr><th colspan="3">
      <div class="ui blue labeled icon button"><i class="user icon"></i> Add User</div>
      <div class="ui blue labeled icon button"><i class="user icon"></i> Add User</div>
      <div class="ui blue labeled icon button"><i class="user icon"></i> Add User</div>
    </th>
  </tr></tfoot>
</table>

