<?php
/* @var $this DonacionSangreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Donacion Sangres',
);

$this->menu=array(
	array('label'=>'Create DonacionSangre', 'url'=>array('create')),
	array('label'=>'Manage DonacionSangre', 'url'=>array('admin')),
);
?>

<h1>Donacion Sangres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
