<?php
/* @var $this TrasplantesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trasplantes',
);

$this->menu=array(
	array('label'=>'Crear Trasplantes', 'url'=>array('create')),
	array('label'=>'Menu Trasplantes', 'url'=>array('admin')),
);
?>

<h1>Trasplantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
