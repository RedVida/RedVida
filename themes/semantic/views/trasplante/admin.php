<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */
$this->breadcrumbs=array(
	'Trasplantes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Trasplantes', 'url'=>array('index')),
	array('label'=>'Registrar Trasplante', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#trasplante-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Administrar Trasplantes </h1>
</div>
<hr class="style-two ">




<!--MODAL-->
<div class="ui modal">
  <i class="close icon"></i>
  <div class="header">
    Modal Title
  </div>
  <div class="content">
    <div class="left">
      Content can appear on left
    </div>
    <div class="right">
      Content can appear on right
    </div>
  </div>
  <div class="actions">
    <div class="ui button">Cancel</div>
    <div class="ui button">OK</div>
  </div>
</div>
<!--MODAL-->



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



<style>

.grid-view
{
	border: 1px;
	border-color: gray;
	padding: 15px 0;
}

.grid-view table.items
{
	background: white;
	border-collapse: collapse;
	width: 100%;
	border: 1px #D0E3EF solid;
}

.grid-view table.items th, .grid-view table.items td
{
	font-size: 0.9em;
	margin: 1em 0;
	padding: 1em;
	border-radius: 7px;
	padding: 0.4em;
}


.grid-view table.items th
{
	color: white;
	background: #404040;
	text-align: center;

}

.grid-view table.items th a
{
	color: #EEE;
	font-weight: bold;
	text-decoration: none;
}

.grid-view table.items th a:hover
{
	color: #FFF;
}

.grid-view table.items th a.asc
{
	padding-right: 10px;
}

.grid-view table.items th a.desc
{
	padding-right: 10px;
}

.grid-view table.items tr.even
{
	background: white;
}

.grid-view table.items tr.odd
{
	background: #E0E0E0;
}

.grid-view table.items tr.selected
{
	background: #6ECFF5!important;
	color: white;
}

.grid-view table.items tbody tr:hover
{

	background: #404040;
	color: white;
	font-weight: bold;

}

.grid-view .link-column img
{
	border: 0;
}

.grid-view .button-column
{
	text-align: center;
	width: 100px;
}

.grid-view .button-column img
{
	border: 0;
}

.grid-view .checkbox-column
{
	width: 15px;
}

.grid-view .summary
{
	margin: 0 0 5px 0;
	text-align: right;
}

.grid-view .pager
{
	margin: 5px 0 0 0;
	text-align: right;
}

.grid-view .empty
{
	font-style: italic;
}

.grid-view .filters input,
.grid-view .filters select
{
	width: 100%;
	border: 1px solid #ccc;
}

.grid-view-loading
{
    background-position: center top;
   
}

</style>


<div class="ui grid">

	<div class="one wide column">

	</div>
	<div class="twelve wide column">
	








		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'trasplante-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'id',
				'id_donante',
				'id_paciente',
				'tipo_donacion',
				'id_donacion',
				'compatibilidad',
				/*
				'detalle',
				'grado_urgencia',
				'centro_medico',
				'created',
				'modified',
				*/
				
				array(
					'class'=>'CButtonColumn',
					'template'=>'{Ver}{Actualizar}{Eliminar}',

					'buttons'=>array
					 (
					        'Ver' => array
					        (
					            'label'=>'Ver',
					            'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/24px/eye.png",
					            'url'=>'Yii::app()->createUrl("trasplante/view", array("id"=>$data->id))',
					        ),
					        'Actualizar' => array
					        (
					            'label'=>'Actualizar',
					    		'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/24px/edit.png",
					            'url'=>'Yii::app()->createUrl("trasplante/update", array("id"=>$data->id))', 
					        ),
					         'Eliminar' => array
					        (
					       		'label'=>'Eliminar',
					    		'imageUrl'=>Yii::app()->request->baseUrl."/images/icons/24px/delete.png",
  								'url'=>'Yii::app()->createUrl("trasplante/delete", array("id"=>$data->id))',



                			),

					 ),

				),


			), 




		
		)); ?>
</div>
</div>

<hr class="style-two ">