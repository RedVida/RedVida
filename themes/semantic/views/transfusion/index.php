<?php
/* @var $this TrasplanteController */
/* @var $dataProvider CActiveDataProvider */
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Registrar Trasfusión', 'url'=>array('/paciente/asignar')),
	array('label'=>'Administrar Transfusiones', 'url'=>array('admin')),
);
}
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Transfusiones </h1>
</div>
<hr class="style-two ">

<div class="ui grid"><!--start grid-->

	<div class="one wide column">
	</div>

	<div class="twelve wide column">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>

	</div>
</div>
<hr class="style-two ">
