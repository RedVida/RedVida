<?php
/* @var $this DonacionMedulaController */
/* @var $model DonacionMedula */

$this->breadcrumbs=array(
	'Donacion Medulas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DonacionMedula', 'url'=>array('index')),
	array('label'=>'Create DonacionMedula', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#donacion-medula-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Donacion Medulas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'donacion-medula-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'rut_donante',
		'created',
		'modified',
		'tipo_medula',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
