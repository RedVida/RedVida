<?php
/* @var $this CentroMedicoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Centro Medicos',
);

$this->menu=array(
	array('label'=>'Administrar C.Medico', 'url'=>array('admin')),
	array('label'=>'Generar Informe', 'url'=>array('informe')),
	array('label'=>'Registrar C.Medico', 'url'=>array('create')),
);
?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Centros Medicos </h1>
</div>
<hr class="style-two ">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
