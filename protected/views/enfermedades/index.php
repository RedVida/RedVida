<?php
/* @var $this EnfermedadesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Enfermedades',
);

$this->menu=array(
	array('label'=>'Create Enfermedades', 'url'=>array('create')),
	array('label'=>'Manage Enfermedades', 'url'=>array('admin')),
);
?>

<h1>Enfermedades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
