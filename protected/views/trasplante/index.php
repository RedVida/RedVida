<?php
/* @var $this TrasplanteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Trasplantes',
);

$this->menu=array(
	array('label'=>'Create Trasplante', 'url'=>array('create')),
	array('label'=>'Manage Trasplante', 'url'=>array('admin')),
);
?>

<h1>Trasplantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
