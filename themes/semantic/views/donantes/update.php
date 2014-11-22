<?php
/* @var $this DonantesController */
/* @var $model Donantes */

$this->breadcrumbs=array(
	'Donantes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Donantes', 'url'=>array('index')),
	array('label'=>'Registrar Donantes', 'url'=>array('create')),
	array('label'=>'Ver Donantes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Administrar Donantes', 'url'=>array('admin')),
);
?>

<br>
<?php $donante=Donantes::model()->find('id='.$_GET["id"]);?>
<div class="ui black ribbon label">
	<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; Actualizar Donante - <?php echo $donante->nombres." ".$donante->apellidos?> </h1>
</div>
<hr class="style-two "></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>