<?php
$this->menu=array(
	array('label'=>'Listar Órganos', 'url'=>array('index')),
	array('label'=>'Administrar Órganos', 'url'=>array('admin')),
);
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Registrar Órgano </h1>
</div>

<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<hr class="style-two ">
