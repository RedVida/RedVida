<?php
/* @var $this AlergiasController */
/* @var $model Alergias */

$this->breadcrumbs=array(
	'Alergiases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alergias', 'url'=>array('index')),
	array('label'=>'Create Alergias', 'url'=>array('create')),
	array('label'=>'View Alergias', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Alergias', 'url'=>array('admin')),
);
?>

<h1>Update Alergias <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>