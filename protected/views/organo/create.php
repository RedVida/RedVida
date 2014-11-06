<?php
/* @var $this OrganoController */
/* @var $model Organo */

$this->breadcrumbs=array(
	'Organos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Organo', 'url'=>array('index')),
	array('label'=>'Manage Organo', 'url'=>array('admin')),
);
?>

<h1>Create Organo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>