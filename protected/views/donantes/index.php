<?php
/* @var $this DonantesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Donantes',
);

$this->menu=array(
	array('label'=>'Registrar Donantes', 'url'=>array('create')),
	array('label'=>'Administrar Donantes', 'url'=>array('admin')),
);
?>

<h1>Donantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
