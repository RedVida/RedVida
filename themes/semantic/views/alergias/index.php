<?php
/* @var $this AlergiasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alergiases',
);

$this->menu=array(
	array('label'=>'Administrar Alergias', 'url'=>array('admin')),
	array('label'=>'Generar Informe', 'url'=>array('informe')),
	array('label'=>'Registrar Alergias', 'url'=>array('create')),
);
?>

<br>
<div class="ui black ribbon label">
	<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Lista De Alergias </h1>
</div>
<hr class="style-two ">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
