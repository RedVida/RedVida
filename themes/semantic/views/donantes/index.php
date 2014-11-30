<?php
/* @var $this DonantesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Donantes',
);

$this->menu=array(
	array('label'=>'Administrar Donantes', 'url'=>array('admin')),
	array('label'=>'Generar Informe', 'url'=>array('informe')),
	array('label'=>'Registrar Donantes', 'url'=>array('create')),
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
