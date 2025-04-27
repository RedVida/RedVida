<?php
$this->menu=array(
	array('label'=>'Create DonacionMedula', 'url'=>array('create')),
	array('label'=>'Manage DonacionMedula', 'url'=>array('admin')),
);
?>

<h1>Donacion Medulas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
