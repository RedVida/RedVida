<?php
/* @var $this DonacionMedulaController */
/* @var $model DonacionMedula */

$this->breadcrumbs=array(
	'Donacion Medulas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DonacionMedula', 'url'=>array('index')),
	array('label'=>'Create DonacionMedula', 'url'=>array('create')),
	array('label'=>'View DonacionMedula', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DonacionMedula', 'url'=>array('admin')),
);
?>

<h1>Update DonacionMedula <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>