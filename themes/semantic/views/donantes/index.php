<?php
/* @var $this DonantesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Donantes',
);

$this->menu=array(
	array('label'=>'Registrar Donantes', 'url'=>array('create')),
	array('label'=>'Administrar Donantes', 'url'=>array('admin')),
	array('label'=>'Informe Donantes', 'url'=>array('donantes/index/pdf')),
);
?>

<?php if(!isset($_GET['pdf'])){ ?> <h1>Donantes</h1> <?php } 
 else{ ?> <h1><u>Informe Donantes:</u> </h1>
 <?php } ?> 

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
