<?php
/* @var $this TrasplanteController */
/* @var $model Trasplante */

$this->menu=array(
	array('label'=>'Listar Trasfusiones', 'url'=>array('index')),
	array('label'=>'Administrar Trasfusiones', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Registrar Trasfusión </h1>
</div>
<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
<hr class="style-two ">
