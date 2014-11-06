<?php
/* @var $this DonacionSangreController */
/* @var $model DonacionSangre */

$this->breadcrumbs=array(
	'Donacion Sangres'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DonacionSangre', 'url'=>array('index')),
	array('label'=>'Create DonacionSangre', 'url'=>array('create')),
	array('label'=>'View DonacionSangre', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DonacionSangre', 'url'=>array('admin')),
);
?>

<h1>Update DonacionSangre <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>