<?php
/* @var $this DonacionOrganoController */
/* @var $model DonacionOrgano */

$this->breadcrumbs=array(
	'Donacion Organos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DonacionOrgano', 'url'=>array('index')),
	array('label'=>'Create DonacionOrgano', 'url'=>array('create')),
	array('label'=>'View DonacionOrgano', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DonacionOrgano', 'url'=>array('admin')),
);
?>

<h1>Update DonacionOrgano <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>