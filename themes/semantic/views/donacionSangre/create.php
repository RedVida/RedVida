<?php
/* @var $this DonacionSangreController */
/* @var $model DonacionSangre */
$this->menu=array(
	array('label'=>'Listar Donación de Sangre', 'url'=>array('index')),
	array('label'=>'Administrar Donación de Sangre', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Registrar Donación de Sangre </h1>
</div>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<hr class="style-two ">


