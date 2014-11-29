<?php
/* @var $this DonantesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Donantes',
);

$this->menu=array(
	array('label'=>'Registrar Donantes', 'url'=>array('create')),
	array('label'=>'Administrar Donantes', 'url'=>array('admin')),
	array('label'=>'Generar Informe', 'url'=>array('informe')),
);
?>

<br>
<div class="ui black ribbon label">
	<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Lista De Donantes </h1>
</div> 

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
