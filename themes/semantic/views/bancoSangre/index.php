<?php
/* @var $this BancoSangreController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Banco Sangres',
);

$this->menu=array(
	array('label'=>'Create BancoSangre', 'url'=>array('create')),
	array('label'=>'Manage BancoSangre', 'url'=>array('admin')),
);
?>

<h1>Banco Sangres</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
