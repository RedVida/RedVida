<?php
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Listar Banco de Sangre', 'url'=>array('index')),
	array('label'=>'Administrar Banco de Sangre', 'url'=>array('admin')),
);
}
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Registrar Banco de Sangre </h1>
</div>

<hr class="style-two ">

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<hr class="style-two ">
