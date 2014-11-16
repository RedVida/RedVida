<?php
/* @var $this OrganoController */
/* @var $model Organo */

$this->breadcrumbs=array(
	'Organos'=>array('index'),
	$model->idOrgano=>array('view','id'=>$model->idOrgano),
	'Update',
);

$this->menu=array(
	array('label'=>'List Organo', 'url'=>array('index')),
	array('label'=>'Create Organo', 'url'=>array('create')),
	array('label'=>'View Organo', 'url'=>array('view', 'id'=>$model->idOrgano)),
	array('label'=>'Manage Organo', 'url'=>array('admin')),
);
?>

<h1>Update Organo <?php echo $model->idOrgano; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>