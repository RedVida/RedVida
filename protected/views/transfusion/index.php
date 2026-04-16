<?php
/* @var $this TransfusionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Transfusions',
);

$this->menu=array(
	array('label'=>'Create Transfusion', 'url'=>array('create')),
	array('label'=>'Manage Transfusion', 'url'=>array('admin')),
);
?>

<h1>Transfusions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
