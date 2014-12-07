<?php
if(Yii::app()->user->checkAccess('tester')){ 
$this->menu=array(
	array('label'=>'Administrar Banco de Sangre', 'url'=>array('admin')),
);
}
?>

<div class="ui black ribbon label">
<h1 class="ui huge header add icon"> &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
Ver Banco de Sangre #<?php echo $model->id; ?></h1>
</div>

<hr class="style-two ">

<div class="ui grid">

	<div class="one wide column">

	</div>

	<div class="twelve wide column">

	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'tipo',
			'cantidad',
		),
	)); ?>
	
	</div>
	
</div>

<hr class="style-two ">
