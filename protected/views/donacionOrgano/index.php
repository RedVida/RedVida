<?php
/* @var $this DonacionOrganoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Donacion Organos',
);

$this->menu=array(
	array('label'=>'Create DonacionOrgano', 'url'=>array('create')),
	array('label'=>'Manage DonacionOrgano', 'url'=>array('admin')),
);
?>

<h1>Donacion Organos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
