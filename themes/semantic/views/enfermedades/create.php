<?php
/* @var $this EnfemedadesController */
/* @var $model Enfemedades */

$this->breadcrumbs=array(
	'Enfemedades'=>array('index'),
	'Create',
);
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Administrar Enfemedades', 'url'=>array('admin')),
	array('label'=>'Listar Enfemedades', 'url'=>array('index')),
);
}
?>

<br>
<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Registrar Enfermedades </h1>
</div>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>