<?php
/* @var $this AlergiasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alergiases',
);

$this->menu=array(
	array('label'=>'Create Alergias', 'url'=>array('create')),
	array('label'=>'Manage Alergias', 'url'=>array('admin')),
);
?>

<h1>Alergiases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
