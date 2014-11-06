<?php
/* @var $this OrganoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Organos',
);

$this->menu=array(
	array('label'=>'Create Organo', 'url'=>array('create')),
	array('label'=>'Manage Organo', 'url'=>array('admin')),
);
?>

<h1>Organos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
