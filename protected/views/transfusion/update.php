<?php
/* @var $this TransfusionController */
/* @var $model Transfusion */

$this->breadcrumbs=array(
	'Transfusions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Transfusion', 'url'=>array('index')),
	array('label'=>'Create Transfusion', 'url'=>array('create')),
	array('label'=>'View Transfusion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Transfusion', 'url'=>array('admin')),
);
?>

<h1>Update Transfusion <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>