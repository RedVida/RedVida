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

<?php if(!isset($_GET['pdf'])){ ?> 

<br>
<div class="ui black ribbon label">
	<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Lista De Donantes </h1>
</div> <?php } 
 else{ ?> <h1><u>Informe Donantes:</u> </h1>
 <?php } ?> 

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
