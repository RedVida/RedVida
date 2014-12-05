<?php
/* @var $this EnfermedadesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Enfermedadeses',
);
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Administrar Enfermedades', 'url'=>array('admin')),
	array('label'=>'Generar Informe', 'url'=>array('informe')),
	array('label'=>'Registrar Enfermedades', 'url'=>array('create')),
);
}
?>

<br>
<div class="ui black ribbon label">
	<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Lista De Enfermedades </h1>
</div>
<hr class="style-two ">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
